<?php
require('include/config.php');
require('include/functions/main.php');

$allRecsShown = 0;
$keyword = urldecode($_REQUEST['query']);
$nodeID = $_REQUEST['node'];
$mainLang = (isset($_GET['main'])) ? $_GET['main'] : 4 ; // 4 = Books, Comics & Magazines
$subCat = (isset($_GET['sub'])) ? $_GET['sub'] : 0;
$idx = (isset($_GET['index'])) ? urldecode($_GET['index']) : $keyword;

$displayKeyword = $keyword;

$displayIdx = $idx;

$idx = translate_lang('jp', 'en', $idx); // needs to be english
$keyword = translate_lang('en', 'jp', $keyword); // needs to be japanese;

if ($subCat) {
	$x = explode(' » ', $_COOKIE['breadcrumbs']);
	
	if (count($x) - 1 > $subCat) {
		// user pressed the back button
		$breadcrumbs = '';
		unset($x[count($x) - 1]);
		$breadcrumbs = stripslashes(implode(' » ', $x));
		$subc = $_COOKIE['subc'];
	} else {
		$xhref = $cg['baseurl'].'/list.php?index='.urlencode($_COOKIE['old_index']).'&query='.urlencode($_COOKIE['old_keyword']).'&node='.$_COOKIE['old_node'].'&main='.$mainLang.'&sub='.($_COOKIE['subc']-1);
		
		$breadcrumbs = stripslashes($_COOKIE['breadcrumbs']) . ' » ' . '<a href="'.$xhref.'">' . $_COOKIE['old_keyword'] . '</a>';
		$subc = $_COOKIE['subc'] + 1;
	}
} else {
	$breadcrumbs = $lang[$mainLang];
	$subc = 1;
}

setcookie('subc', $subc);
setcookie('breadcrumbs', $breadcrumbs);
setcookie('old_keyword', $displayKeyword);
setcookie('old_index', $displayIdx);
setcookie('old_node', $nodeID);

if ($keyword AND $nodeID AND $mainLang) {
	$category = $displayKeyword;
	//$mainCat = $lang[$mainLang];
	//$keyword = str_replace(" ", "+", $keyword);
	//$keyword = urlencode($keyword);
	$operation = 'BrowseNodeLookup';
	$service = 'AWSECommerceService';
	$version = '2011-08-01';
	$string_to_sign = browse_node($service, $operation, $nodeID);
	$signature = get_signature($string_to_sign);
	
	$request = $cg['amazonUrl'] . '?' . $string_to_sign;
	$request .= "&Signature=".$signature;
	$response = curl_string($request);
	
	if ($response) {
		$xml = array();
		$res = simplexml_load_string($response);
		
		if (isset($res->BrowseNodes->BrowseNode->Children)) {
			$children = $res->BrowseNodes->BrowseNode->Children;
		} else {
			$children = false;
		}
	}
	
	// searchIndex
	//$displayKeyword = urldecode($keyword);
	$searchIndex = $idx;
	//$displaySI = $searchIndex;
	
	if (!in_array($searchIndex, $categories)) {
		$keyword .= ' ' . $searchIndex;
		$searchIndex = 'All'; // reassign All
	}
	$keyword = str_replace(" ", "+", $keyword);
	$keyword = urlencode($keyword);
	$operation = 'ItemSearch';
	//$searchIndex = 'All';
	$service = 'AWSECommerceService';
	$version = '2011-08-01';
	$responseGroup = 'ItemAttributes,Images';
	$browseNode = $nodeID;
	$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
	$signature = get_signature($string_to_sign);
	
	$request = $cg['amazonUrl'] . '?' . $string_to_sign;
	$request .= "&Signature=".$signature;
	
	$maxPage = ($searchIndex == 'All') ? 5 : 10;
	
	//$response = file_get_contents($request);
	$response = curl_string($request);
} else {
	$response = false;
}

if ($response) {
	$xml = array();
	$res = simplexml_load_string($response);
	
	//echo '<meta charset="utf-8">';
	//echo $string_to_sign . '<br/>';
	//echo '<pre>';
	//print_r($res);
	//exit;
	
	if ($res->Items->Request->IsValid) {
		$xml['isValid'] = $res->Items->Request->IsValid;
		$xml['TotalResults'] = $res->Items->TotalResults;
		$xml['TotalPages'] = (string) $res->Items->TotalPages;
		$xml['MoreSearchResultsUrl'] = $res->Items->MoreSearchResultsUrl;
		//$xml['items'] = $res->Items;
		$objItems = arrify($res->Items);
		
		if ((string) $xml['TotalPages'] <= $maxPage) { 
			$maxPage = (string) $xml['TotalPages'];
			$allRecsShown = 1;
		}
	} else {
		$xml = false;
	}
} else {
	$maxPage = 0;
}

$totalCount = isset($res->Items->TotalResults) ? (string) $res->Items->TotalResults : 0;
$hash = md5($keyword . $cg['private_key']);
$nextPage = 2;
$moreUrl = '/list_more.php?index='.$idx.'&query='.$keyword.'&node='.$nodeID.'&hash='.$hash;

include $cg['viewdir'] . '/list_v.php';
?>