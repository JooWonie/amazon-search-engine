<?php
//error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED); 

//ini_set('display_errors', 1);
//error_reporting(~0);
$cg = array();

// Begin Configuration
$cg['basedir']     	=  	'/www/minnano-shopping';
$cg['baseurl']     	=  	'http://www.minnano-shopping.com';
$cg['AWSAccessKeyId'] = "AKIAJU5PQF5E7BBZLN5Q";
$cg['AssociateTag']	=	'nnml-22';
$cg['secretKey']	=	"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";
$cg['amazonUrl']	=	"http://webservices.amazon.co.jp/onca/xml";
//$cg['amazonUrl'] 	= 	'http://ecs.amazonaws.jp/onca/xml';
$cg['amazonNoHttp']	=	"webservices.amazon.co.jp";
//$cg['amazonNoHttp']	=	"ecs.amazonaws.jp";
$cg['amazonUri']	=	"/onca/xml";
$cg['private_key'] = 'delicious';

$DBTYPE = 'mysql';
$DBHOST = 'db.minnano-av.com';
$DBUSER = 'dbmanager';
$DBPASSWORD = 'smarttech';
$DBNAME = 'minshopping';

session_start();
date_default_timezone_set('Asia/Tokyo');

$cg['cssdir']	=	$cg['basedir'].'/css';
$cg['cssurl']      =  $cg['baseurl'].'/css';
$cg['imagedir']      =  $cg['basedir'].'/images';
$cg['imageurl']      =  $cg['baseurl'].'/images';
$cg['viewdir']	=	$cg['basedir'].'/views';
$cg['default_language'] = 'jp';

include $cg['basedir'] . '/include/lang/'.$cg['default_language'].'.php';
include $cg['basedir'] . '/include/nodes.php';
require_once($cg['basedir'].'/libraries/adodb/adodb.inc.php');

$conn = &ADONewConnection($DBTYPE);
$conn->Connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
@mysql_query("SET NAMES 'UTF8'");

$categories[] = 'All';
$categories[] = 'Apparel';
$categories[] = 'Appliances';
$categories[] = 'Automotive';
$categories[] = 'Baby';
$categories[] = 'Beauty';
$categories[] = 'Blended';
$categories[] = 'Books';
$categories[] = 'Classical';
$categories[] = 'DVD';
$categories[] = 'Electronics';
$categories[] = 'ForeignBooks';
$categories[] = 'Grocery';
$categories[] = 'HealthPersonalCare';
$categories[] = 'Hobbies';
$categories[] = 'HomeImprovement';
$categories[] = 'Jewelry';
$categories[] = 'KindleStore';
$categories[] = 'Kitchen';
$categories[] = 'Marketplace';
$categories[] = 'MobileApps';
$categories[] = 'MP3Downloads';
$categories[] = 'Music';
$categories[] = 'MusicalInstruments';
$categories[] = 'MusicTracks';
$categories[] = 'OfficeProducts';
$categories[] = 'Shoes';
$categories[] = 'Software';
$categories[] = 'SportingGoods';
$categories[] = 'Toys';
$categories[] = 'VHS';
$categories[] = 'Video';
$categories[] = 'VideoGames';
$categories[] = 'Watches';
?>
