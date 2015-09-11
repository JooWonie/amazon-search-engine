<?php
require ('include/config.php');
require ('include/functions/main.php');

$allRecsShown = 0;
$keyword = $_REQUEST['query'];

if ($keyword) {
	search_keyword($keyword);
	// update hits
	$displayKeyword = urldecode($keyword);
	$searchIndex = (isset($_REQUEST['index'])) ? $_REQUEST['index'] : 'All';
	$displaySI = $searchIndex;

	if (!in_array($searchIndex, $categories)) {
		$keyword .= ' ' . $searchIndex;
		$searchIndex = 'All';
		// reassign All
	}
	$keyword = str_replace("　", " ", $keyword);
	$keyword = rawurlencode($keyword);
	$operation = 'ItemSearch';
	//$searchIndex = 'Speakers';
	$service = 'AWSECommerceService';
	$version = '2011-08-01';
	$responseGroup = 'ItemAttributes,Images';
	$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup);
	$signature = get_signature($string_to_sign);

	$request = $cg['amazonUrl'] . '?' . $string_to_sign;
	$request .= "&Signature=" . $signature;

	$maxPage = ($searchIndex == 'All') ? 5 : 10;

	//$response = file_get_contents($request);
	$response = curl_string($request);
} else {
	header('Location: ' . $cg['baseurl']);
}

if ($response) {
	$xml = array();
	$res = simplexml_load_string($response);

	if ($res -> Items -> Request -> IsValid) {
		/*
		 if ($res->Items->TotalResults == 0) {
		 $xkw = explode("+", urldecode($keyword));
		 foreach($xkw as $z) {
		 if (mb_strlen($z, 'UTF-8') != strlen($z)) {
		 $altKey = urlencode($z);
		 $string_to_sign = build_request($altKey, $searchIndex, $operation, $service, $version, $responseGroup);
		 $signature = get_signature($string_to_sign);

		 $request = $cg['amazonUrl'] . '?' . $string_to_sign;
		 $request .= "&Signature=".$signature;
		 $response = curl_string($request);

		 if ($response) {
		 $xml = array();
		 $res = simplexml_load_string($response);
		 if ($res->Items->TotalResults <> 0) {
		 break;
		 }
		 }
		 }
		 }
		 } else {
		 $altKey = $keyword;
		 }*/
		$altKey = $keyword;

		//echo '<meta charset="utf-8">';
		//echo '<pre>';
		//print_r($res);
		//exit;

		$xml['isValid'] = $res -> Items -> Request -> IsValid;
		$xml['TotalResults'] = $res -> Items -> TotalResults;
		$xml['TotalPages'] = (string)$res -> Items -> TotalPages;
		$xml['MoreSearchResultsUrl'] = $res -> Items -> MoreSearchResultsUrl;
		//$xml['items'] = $res->Items;
		$objItems = arrify($res -> Items);

		if ((string)$xml['TotalPages'] <= $maxPage) {
			$maxPage = (string)$xml['TotalPages'];
			$allRecsShown = 1;
		}
	} else {
		$xml = false;
	}
} else {
	$maxPage = 0;
}

$totalCount = isset($res -> Items -> TotalResults) ? (string)$res -> Items -> TotalResults : 0;
$hash = md5($altKey . $cg['private_key']);
$nextPage = 2;
$moreUrl = '/page_more.php?query=' . $altKey . '&index=' . $searchIndex . '&hash=' . $hash;

include $cg['viewdir'] . '/search_v.php';
?>