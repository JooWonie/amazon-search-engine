<?php
require ('include/config.php');
require ('include/functions/main.php');

$keyword = $_REQUEST['query'];
$keyword = str_replace("　", " ", $keyword);
$page = $_REQUEST['page'];
$hash = $_REQUEST['hash'];
$searchIndex = (isset($_REQUEST['index'])) ? $_REQUEST['index'] : 'All';

if ($keyword) {
	$keyword = rawurlencode($keyword);
}

$myHash = md5($keyword . $cg['private_key']);
if ($hash != $myHash) { exit ;
}

$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, $page);
$signature = get_signature($string_to_sign);

$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=" . $signature;

//$response = file_get_contents($request);
$response = curl_string($request);

if ($response) {
	$xml = array();
	$res = simplexml_load_string($response);

	$obj = arrify($res->Items);
	echo json_encode($obj);
} else {
	echo '';
}
exit ;
?>