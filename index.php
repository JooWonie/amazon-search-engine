<?php
require('include/config.php');
require('include/functions/main.php');

$popKeywords = get_keywords();
$dvd_file = make_file('DVD', 1, 'salesrank'); // offset by one hour, sort by salesrank
$elc_file = make_file('Electronics', 2, 'salesrank'); // offset by 2 hours

// MP3ダウンロード
$searchIndex = 'DVD';
$keyword = urlencode('MP3ダウンロード');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2129039051; // mp3 download
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$mp3_file = make_file('mp3', 3, "salesrank", $request); // offset by 3 hours

$books_file = make_file('Books', 4, 'salesrank'); // offset by 4 hours

// Videogames
$searchIndex = 'DVD'; // main category
$keyword = urlencode('ゲームダウンロード'); // the subcategory name
$browseNode = 2510863051; // video games
$fileSuffix = 'videogames'; // will be attached to the filename, ie, 1392145200videogames.php
$videogames_file = make_file_pickup($keyword, $fileSuffix, 5, $searchIndex, $browseNode); // offset by 5 hours

//Apparel
$searchIndex = 'Apparel';
$keyword = urlencode('メンズ+ファッション');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2230005051; // mens clothing
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$apparel_file = make_file('apparel', 6, "salesrank", $request);

// Electronics appliance
$searchIndex = 'Electronics';
$keyword = urlencode('生活家電');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 124048011; // home appliance
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$appliance_file = make_file('appliance', 7, "salesrank", $request);

// automotive parts
$searchIndex = 'Automotive';
$keyword = urlencode('カー用品');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2017304051; // parts
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$auto_file = make_file('automotive', 8, "salesrank", $request);

// baby
$searchIndex = 'Baby';
$keyword = urlencode('ベビー＆マタニティ');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 344845011; // baby & maternity
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$baby_file = make_file('baby', 9, "salesrank", $request);

// beauty
$searchIndex = 'Appliances';
$keyword = urlencode('フィットネス・トレーニング');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 14315501; //"Exercise & Fitness"
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$beauty_file = make_file('beauty', 10, "salesrank", $request);

// grocery
$searchIndex = 'Grocery';
$keyword = urlencode('スイーツ・お菓子');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 71314051; //"Sweets & Snack Food"
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$grocery_file = make_file('grocery', 11, "salesrank", $request);

// hobby
$searchIndex = 'Baby';
$keyword = urlencode('ホビー');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2277721051; // hobby
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$hobby_file = make_file('hobby', 12, "salesrank", $request);

// jewelry
$searchIndex = 'Apparel';
$keyword = urlencode('ジュエリー"');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 85895051; // jewelry
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$jewelry_file = make_file('jewelry', 13, "salesrank", $request);

// kindle
$searchIndex = 'Books';
$keyword = urlencode('Kindle本');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2250738051; // kindle ebooks
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$kindle_file = make_file('kindle', 14, "salesrank", $request);

// musical instruments
$searchIndex = 'DVD';
$keyword = urlencode('楽器');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2123630051; // instrument
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$instrument_file = make_file('instrument', 15, "salesrank", $request);

// shoes
$searchIndex = 'Apparel';
$keyword = urlencode('シューズ');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2016926051; // shoes
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$shoes_file = make_file('shoes', 16, "salesrank", $request);

// software
$searchIndex = 'Software';
$keyword = urlencode('PCソフト');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 637630; // pc software
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$software_file = make_file('software', 17, "salesrank", $request);

// sporting goods
$searchIndex = 'SportingGoods';
$keyword = urlencode('スポーツウェア＆シューズ');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 2188968051; // sports, clothing & shoes
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$sporting_file = make_file('sporting', 18, "salesrank", $request);

// toys
$searchIndex = 'Baby';
$keyword = urlencode('おもちゃ');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 13299531; // toys
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$toys_file = make_file('toys', 19, "salesrank", $request);

// watches
$searchIndex = 'Apparel';
$keyword = urlencode('腕時計');
$operation = 'ItemSearch';
$service = 'AWSECommerceService';
$version = '2011-08-01';
$responseGroup = 'ItemAttributes,Images';
$browseNode = 324025011; // watches
$string_to_sign = build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, 0, $browseNode);
$signature = get_signature($string_to_sign);
$request = $cg['amazonUrl'] . '?' . $string_to_sign;
$request .= "&Signature=".$signature;
$watches_file = make_file('watches', 20, "salesrank", $request);

include $cg['viewdir'] . '/index_v.php';
?>