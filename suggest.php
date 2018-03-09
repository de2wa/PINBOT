<?php
error_reporting(0);
$key = str_replace('+',' ',$kw_image);
$key = $key;
$url_keyword = "http://www.google.com/complete/search?output=toolbar&hl=en&q=".urlencode($key);

  if (!function_exists('curl_init')){
    die('Sorry cURL is not installed!');
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url_keyword);
  curl_setopt($ch, CURLOPT_USERAGENT, random_user_agent());
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $output = curl_exec($ch);
  curl_close($ch);
	$datas = simplexml_load_string($output);
	foreach($datas as $sug){
    $kwd = $sug->suggestion['data']; 
	$keywords .= $sug->suggestion['data'].', ';
      
        
  }    
 if($keywords=="," || $keywords==null){
	 $keywords = $key;
 }
            
             ?>
           