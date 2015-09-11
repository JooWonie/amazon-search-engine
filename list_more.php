<?php
require('include/config.php');
require('include/functions/main.php');

$keyword = $_REQUEST['query'];
$nodeID = $_REQUEST['node'];
$idx = (isset($_GET['index'])) ? $_GET['index'] : $keyword;

$page = $_REQUEST['page'];
$hash = $_REQUEST['hash'];

$keyword = str_replace(" ", "+", $keyword);
$keyword = urlencode($keyword);
$myHash = md5($keyword . $cg['private_key']);

if ($hash != $myHash) { echo ''; exit; }

$searchIndex = $idx;

if (!in_array($searchIndex, $categories)) {
	$keyword .= ' ' . $searchIndex;
	$searchIndex = 'All'; // reassign All
}
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = $nodeID;
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, $page, $browseNode);
$signature = get_signature($string_to_sign);

$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;

$maxPage = ($searchIndex == 'All') ? 5 : 10;

//$response = file_get_contents($request);
$response = curl_string($request);

if ($response) {
	$xml = array();
	$res = simplexml_load_string($response);
	//echo json_encode($res);
	$obj = arrify($res->Items);
	echo json_encode($obj);
} else {
	echo '';
}
exit;
?>