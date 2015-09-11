<?php
function build_request($keyword, $searchIndex, $operation, $service, $version, $responseGroup, $page=false, $browseNode=false) {
	global $cg;
	// build the query string
	$request = 'AWSAccessKeyId=' . $cg['AWSAccessKeyId'] . '&AssociateTag=' .$cg['AssociateTag']. '&Keywords=' . $keyword . '&Operation=' . $operation . '&SearchIndex=' . $searchIndex . '&Service=' . $service . '&ResponseGroup=' . $responseGroup . '&Timestamp=' . urlencode(date("c", time())) . '&version=' . $version;
	
	$request .= '&Condition=All';
	if ($page) {
		$request .= '&ItemPage=' . $page;
	}
	
	if ($browseNode) {
		$request .= '&BrowseNode=' . $browseNode;
	}
	
	// url encode the comma and colon
	$request = str_replace(',','%2C', $request);
    $request = str_replace(':','%3A', $request);
	
	// explode the query string
	$x = explode("&", $request);
	
	// requirement when building a signature is to sort by byte value
	sort($x); // sort on byte value;
	
	// reconstruct the query string, should now be sorted
	$string_to_sign = implode("&", $x);
	
	return $string_to_sign;	
}

function browse_node($service, $operation, $nodeId) {
	global $cg;
	$obj = new stdClass;
	$request 	= 	'AWSAccessKeyId=' . $cg['AWSAccessKeyId'];
	$request 	.=	'&AssociateTag=' .$cg['AssociateTag'];
	$request	.=	'&Service=' . $service;
	$request	.=	'&Operation=' . $operation;
	$request	.=	'&BrowseNodeId=' . $nodeId;
	$request	.=	'&Timestamp=' . urlencode(date("c", time()));
	
	// url encode the comma and colon
	$request = str_replace(',','%2C', $request);
    $request = str_replace(':','%3A', $request);
	
	// explode the query string
	$x = explode("&", $request);
	
	// requirement when building a signature is to sort by byte value
	sort($x); // sort on byte value;
	
	// reconstruct the query string, should now be sorted
	$string_to_sign = implode("&", $x);
	
	return $string_to_sign;	
}

function recommended($keyword, $pages=1, $sort=false) {
	global $cg;
	$dem = new stdClass;
	
	$searchIndex = $keyword;
	$operation = 'ItemSearch';
	$service = 'AWSECommerceService';
	$version = '2011-08-01';
	$responseGroup = 'ItemAttributes,Images';
	//$sort = 'salesrank';
	
	if ($pages > 0) {
	$page = 0;
	for ($i = 0; $i < $pages; $i++) {
		$page++;

		// build the query string
		$request = 'AWSAccessKeyId=' . $cg['AWSAccessKeyId'] . '&AssociateTag=' .$cg['AssociateTag']. '&Keywords=' . $keyword . '&Operation=' . $operation . '&SearchIndex=' . $searchIndex . '&Service=' . $service . '&ResponseGroup=' . $responseGroup . '&Timestamp=' . urlencode(date("c", time())) . '&version=' . $version;
		
		if ($page > 1) {
			$request .= '&ItemPage=' . $page;
		}
		if ($sort) {
			$request .= '&Sort=' . $sort;
		}
			
		// url encode the comma and colon
		$request = str_replace(',','%2C', $request);
	    $request = str_replace(':','%3A', $request);
		
		// explode the query string
		$x = explode("&", $request);
		
		// requirement when building a signature is to sort by byte value
		sort($x); // sort on byte value;
		
		// reconstruct the query string, should now be sorted
		$string_to_sign = implode("&", $x);
		
		$signature = get_signature($string_to_sign);
		
		$request = $cg['amazonUrl'] . '?' . $string_to_sign;
		$request .= "&Signature=".$signature;
		$response = curl_string($request);
		
		$obj = false;	
		if ($response) {
			$res = simplexml_load_string($response);
			if ($res->Items->TotalResults <> 0) {
				$obj = arrify($res->Items);
				
				foreach ($obj->Items->Item as $item) {
					$dem->Items->Item[] = $item;
				}
			}
		}
	} // for $i
	} // if pages	
	
	//echo '<meta charset="utf-8">';
	//echo '<pre>';
	//print_r($dem);
	//exit;
	return $dem;
}


function recommended_pickup($keyword, $index, $pages=1, $browseNode) {
	global $cg;
	$dem = new stdClass;
	
	$searchIndex = $index;
	$operation = 'ItemSearch';
	$service = 'AWSECommerceService';
	$version = '2011-08-01';
	$responseGroup = 'ItemAttributes,Images';
	//$sort = 'salesrank';
	
	if ($pages > 0) {
	$page = 0;
	for ($i = 0; $i < $pages; $i++) {
		$page++;

		// build the query string
		$request = 'AWSAccessKeyId=' . $cg['AWSAccessKeyId'] . '&AssociateTag=' .$cg['AssociateTag']. '&Keywords=' . $keyword . '&Operation=' . $operation . '&SearchIndex=' . $searchIndex . '&Service=' . $service . '&ResponseGroup=' . $responseGroup . '&Timestamp=' . urlencode(date("c", time())) . '&version=' . $version;
		
		if ($page > 1) {
			$request .= '&ItemPage=' . $page;
		}
		if ($sort) {
			$request .= '&Sort=' . $sort;
		}
		if ($browseNode) {
			$request .= '&BrowseNode=' . $browseNode;
		}
		
		// url encode the comma and colon
		$request = str_replace(',','%2C', $request);
	    $request = str_replace(':','%3A', $request);
		
		// explode the query string
		$x = explode("&", $request);
		
		// requirement when building a signature is to sort by byte value
		sort($x); // sort on byte value;
		
		// reconstruct the query string, should now be sorted
		$string_to_sign = implode("&", $x);
		
		$signature = get_signature($string_to_sign);
		
		$request = $cg['amazonUrl'] . '?' . $string_to_sign;
		$request .= "&Signature=".$signature;
		$response = curl_string($request);
		
		$obj = false;	
		if ($response) {
			$res = simplexml_load_string($response);
			if ($res->Items->TotalResults <> 0) {
				$obj = arrify($res->Items);
				
				foreach ($obj->Items->Item as $item) {
					$dem->Items->Item[] = $item;
				}
			}
		}
	} // for $i
	} // if pages	
	
	//echo '<meta charset="utf-8">';
	//echo '<pre>';
	//print_r($dem);
	//exit;
	return $dem;
}

function arrify($items) {
	$obj = new stdClass;
	$i = 0;
	foreach ($items->Item as $item) {
		$obj->Items->Item[$i]->ASIN = (string) $item->ASIN;
		if (isset($item->SmallImage)) {
			$obj->Items->Item[$i]->SmallImage = $item->SmallImage;
		}
		if (isset($item->MediumImage)) {
			$obj->Items->Item[$i]->MediumImage = $item->MediumImage;
		}
		if (isset($item->LargeImage)) {
			$obj->Items->Item[$i]->LargeImage = $item->LargeImage;
		}
		if (isset($item->ItemAttributes->ListPrice)) {
			$obj->Items->Item[$i]->ItemAttributes->ListPrice = $item->ItemAttributes->ListPrice;
		} else {
			$bool = lookupItem((string) $item->ASIN);
			if ($bool) {
				$obj->Items->Item[$i]->ItemAttributes->ListPrice = $bool;
			}
		}
		$obj->Items->Item[$i]->ItemAttributes->ProductGroup = (string) $item->ItemAttributes->ProductGroup;
		$obj->Items->Item[$i]->ItemAttributes->Title = (string) $item->ItemAttributes->Title;
		$obj->Items->Item[$i]->DetailPageURL = (string) $item->DetailPageURL;
		$i++;
	};
	return $obj;
}

function lookupItem($asin) {
	global $cg;
	$service='AWSECommerceService';
	$operation='ItemLookup';
	$responseGroup = 'OfferSummary';
	$version = '2011-08-01';
	$request = 'AWSAccessKeyId=' . $cg['AWSAccessKeyId'] . '&AssociateTag=' .$cg['AssociateTag']. '&Operation=' . $operation . '&Service=' . $service . '&ResponseGroup=' . $responseGroup . '&Timestamp=' . urlencode(date("c", time())) . '&version=' . $version;
	
	$request .= '&ItemId='.$asin;
	
	// url encode the comma and colon
	$request = str_replace(',','%2C', $request);
    $request = str_replace(':','%3A', $request);
	
	// explode the query string
	$x = explode("&", $request);
	
	// requirement when building a signature is to sort by byte value
	sort($x); // sort on byte value;
	
	// reconstruct the query string, should now be sorted
	$string_to_sign = implode("&", $x);
	
	$signature = get_signature($string_to_sign);
	
	$request = $cg['amazonUrl'] . '?' . $string_to_sign;
	$request .= "&Signature=".$signature;
	
	//echo $request; exit;
	$response = curl_string($request);
	
	if ($response) {
		$xml = array();
		$res = simplexml_load_string($response);
		
		if (isset($res->Items->Item->OfferSummary->LowestNewPrice)) {
			return $res->Items->Item->OfferSummary->LowestNewPrice;
		} elseif (isset($res->Items->Item->OfferSummary->LowestUsedPrice)) {
			return $res->Items->Item->OfferSummary->LowestUsedPrice;
		} else {
			return false;
		}
	}
}

function topTen($nodeId, $rGroup) {
	global $cg;
	$request 	= 	'AWSAccessKeyId=' . $cg['AWSAccessKeyId'];
	$request 	.=	'&AssociateTag=' .$cg['AssociateTag'];
	$request	.=	'&Version=2011-08-01';
	$request	.=	'&Operation=BrowseNodeLookup';
	$request 	.=	'&ResponseGroup=' . $rGroup;
	$request	.=	'&BrowseNodeId=' . $nodeId;
	
	// url encode the comma and colon
	$request = str_replace(',','%2C', $request);
    $request = str_replace(':','%3A', $request);
	
	// explode the query string
	$x = explode("&", $request);
	
	// requirement when building a signature is to sort by byte value
	sort($x); // sort on byte value;
	
	// reconstruct the query string, should now be sorted
	$string_to_sign = implode("&", $x);
	
	$signature = get_signature($string_to_sign);
	
	$request = $cg['amazonUrl'] . '?' . $string_to_sign;
	$request .= "&Signature=".$signature;
	$response = curl_string($request);
	
	if ($response) {
		$xml = array();
		$res = simplexml_load_string($response);
		
		echo '<pre>';
		print_r($res);
		exit;	
	}
}


function get_signature($string_to_sign) {
	global $cg;
	$string_to_sign = "GET\n".$cg['amazonNoHttp']."\n".$cg['amazonUri']."\n".$string_to_sign;
	
	// create the signature
	$signature = urlencode(base64_encode(hash_hmac("sha256", $string_to_sign, $cg['secretKey'], True)));
	return $signature;
}

function curl_string($url, $post=false, $header=false) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, FALSE); // use GET
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	if ($header != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	ob_start();
	$result = curl_exec($ch);
	ob_end_clean();
	curl_close($ch);
	return $result; 
}

// translate from jp to en and vice versa
function translate_lang($translateFrom, $translateTo, $string) {
	global $cg;
	include $cg['basedir'] . '/include/lang/'.$translateFrom.'.php';
	for ($i = 0; $i < 500; $i++) {
		if (isset($lang[$i])) {
			if (trim($lang[$i]) == trim($string)) {
				include $cg['basedir'] . '/include/lang/'.$translateTo.'.php';
				return $lang[$i];
			}
		} else {
			break;
		}
	}
	return $string;
}

function search_keyword($kw) {
	global $cg;
	global $conn;
	
	$q = "SELECT keyword FROM searches WHERE keyword = '$kw'";
	$eq = $conn->execute($q);
	$numRows = $eq->getrows();
	if (count($numRows) > 0) {
		$q = "UPDATE searches SET hits = hits + 1 WHERE keyword = '$kw'";
		$executequery=$conn->execute($q);
	} else {
		$q = "INSERT INTO searches SET hits = 1, keyword = '$kw'";
		$executequery=$conn->execute($q);
	}
	
	return true;
}

function get_keywords($limit = false) {
	global $cg;
	global $conn;
	
	if (!$limit) {
		$limit = 30;
	}
	
	$q = "SELECT * FROM searches ORDER BY hits DESC LIMIT 0, $limit";
	$eq = $conn->execute($q);
	$rows = $eq->getrows();
	if (count($rows) > 0) {
		return $rows;
	} else {
		return false;
	}

}

function make_file($suffix, $offset = 1, $sort=false, $curlReq = 0) {
	global $cg;
	global $lang;
	$yesterday = strtotime("yesterday") + (60 * 60 * $offset); // yesterday + offset hours
	$today = strtotime("today") + (60 * 60 * $offset); // today + offset hours
	
	$fileY = $yesterday . $suffix;
	$fileY = $cg['basedir'] . '/cache/' . $fileY . '.php';
	$fileT = $today . $suffix;
	$fileT = $cg['basedir'] . '/cache/' . $fileT . '.php';
	$lastWrite = $cg['basedir'] . '/cache/lastwrite.txt';
	
	$canWrite = _check_last_time(3); // interval of 3 mins
	
	if (!$canWrite) {
		// prevent amazon api call for less than 3 minutes
		// if last file write is less than 3 minutes, return and use current file to display.
		if (file_exists($fileT)) {
			return $fileT;
		} else {
			return $fileY;
		}
		exit;
	}
	
	
	// if no file exists, means 1 day has elapsed.
	// need to create a new file based on today.
	// will also make an API call to amazon to pull new content
	if (!file_exists($fileT)) {
		if ($curlReq) {
			$response = curl_string($curlReq);
			$res = simplexml_load_string($response);
			$data = arrify($res->Items);
		} else {
			$data = recommended($suffix, 1, $sort); // 2 pages or loops
		}
		if (!$data) { return false; }
		$str = '';
		foreach ($data->Items->Item as $item) {
			if (isset($item->ItemAttributes->ListPrice)) {
				$price = trim($item->ItemAttributes->ListPrice->FormattedPrice);
			} else {
				$price = '';
			};
			
			if(isset($item->LargeImage)) {
				$image = $item->LargeImage->URL;
			} else {
				if(isset($item->MediumImage)) {
					$image = $item->MediumImage->URL;
				} else if(isset($item->SmallImage)) {
					$image = $item->SmallImage->URL;
				} else {
					$image = $cg['imageurl'] . '/no-image.png';
				}
			};
			if(isset($item->ItemAttributes->ProductGroup)) {
				$pg = (string) $item->ItemAttributes->ProductGroup[0];
				$categ[$pg] = $pg;
			};
			$str .= <<<EOF
				<li><a href="{$item->DetailPageURL}" target="_blank">
					<div class="prbox"><span class="hovmask"></span>
						<img src="{$image}" class="" alt="{$item->ItemAttributes->Title}" title="">
					</div>
					<div class="prbottom simptip" data-tooltip="{$item->ItemAttributes->Title}">
						<h3 class="title">{$item->ItemAttributes->Title}</h3>
						<span class="price">{$price}</span>
					</div>
				</a></li>
EOF;
			//<span class="price">{htmlspecialchars($price, ENT_HTML5,'UTF-8', true)}</span>
		} // foreach
		unlink($fileY); // delete yesterday's file
		unlink($lastWrite);
		file_put_contents($fileT, $str);
		file_put_contents($lastWrite, time()); // write to file last time();
	} // !file_exists
	
	return $fileT;
	
}

function make_file_pickup($keyword, $suffix, $offset = 1, $index, $browseNode, $curlReq = 0) {
	global $cg;
	global $lang;
	$yesterday = strtotime("yesterday") + (60 * 60 * $offset); // yesterday + offset hours
	$today = strtotime("today") + (60 * 60 * $offset); // today + offset hours
	
	$fileY = $yesterday . $suffix;
	$fileY = $cg['basedir'] . '/cache/' . $fileY . '.php';
	$fileT = $today . $suffix;
	$fileT = $cg['basedir'] . '/cache/' . $fileT . '.php';
	$lastWrite = $cg['basedir'] . '/cache/lastwrite.txt';
	
	$canWrite = _check_last_time(3); // interval of 3 mins
	
	if (!$canWrite) {
		// prevent amazon api call for less than 3 minutes
		// if last file write is less than 3 minutes, return and use current file to display.
		if (file_exists($fileT)) {
			return $fileT;
		} else {
			return $fileY;
		}
		exit;
	}
	
	
	// if no file exists, means 1 day has elapsed.
	// need to create a new file based on today.
	// will also make an API call to amazon to pull new content
	if (!file_exists($fileT)) {
		if ($curlReq) {
			$response = curl_string($curlReq);
			$res = simplexml_load_string($response);
			$data = arrify($res->Items);
		} else {
			$data = recommended_pickup($keyword, $index, 3, $browseNode); // 3 pages or loops
		}
		if (!$data) { return false; }
		
		$str = '<ol>';
		$i = 0;
		foreach ($data->Items->Item as $item) {
			if ($i == 15) {
				$str .= '</ol>';
				break; 
			}
			if (isset($item->ItemAttributes->ListPrice)) {
				$price = trim($item->ItemAttributes->ListPrice->FormattedPrice);
			} else {
				$price = $lang[119];
			};
			
			if(isset($item->LargeImage)) {
				$image = $item->LargeImage->URL;
			} else {
				if(isset($item->MediumImage)) {
					$image = $item->MediumImage->URL;
				} else if(isset($item->SmallImage)) {
					$image = $item->SmallImage->URL;
				} else {
					$image = $cg['imageurl'] . '/no-image.png';
				}
			};
			if(isset($item->ItemAttributes->ProductGroup)) {
				$pg = (string) $item->ItemAttributes->ProductGroup[0];
				$categ[$pg] = $pg;
			};
			if ($i <> 0 AND $i % 5 == 0 ) {
				$str .= '</ol>';
				$str .= '<ol>';
			}
			$str .= <<<EOF
					<li><a href="{$item->DetailPageURL}" target="_blank">
					<div class="prbox"><span class="hovmask"></span>
						<img src="{$image}" class="" alt="{$item->ItemAttributes->Title}" title="">
					</div>
					<div class="prbottom simptip" data-tooltip="{$item->ItemAttributes->Title}">
						<h3 class="title">{$item->ItemAttributes->Title}</h3>
						<span class="price">{$price}</span>
					</div>
				</a></li>
EOF;
			$i++;
			//<span class="price">{htmlspecialchars($price, ENT_HTML5,'UTF-8', true)}</span>
		} // foreach
		unlink($fileY); // delete yesterday's file
		unlink($lastWrite);
		file_put_contents($fileT, $str);
		file_put_contents($lastWrite, time()); // write to file last time();
	} // !file_exists
	
	return $fileT;
}


function _check_last_time($intervalMins=10) {
	global $cg;
	$diff = 60 * $intervalMins;
	$lastWrite = $cg['basedir'] . '/cache/lastwrite.txt';
	if (file_exists($lastWrite)) {
		$lastWritten = file_get_contents($lastWrite);
	} else {
		return true;
	}
	$now = time();
	if ($now - $lastWritten <= $diff) {
		return false;
	} else {
		return true; 
	}
}
?>