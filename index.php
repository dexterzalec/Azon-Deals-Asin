<?php
$url = 'https://rssfeeds.s3.amazonaws.com/goldbox'; 
$xml = simplexml_load_file($url); 

//declare itorator for looping 
$iterator = 1; 
$longstring ='';
//find all items in the xml document 

foreach ($xml->channel->item as $item) {
	$azonlink = $item->link;
	//echo $azonlink;
	//Start to find ASIN for each featured Item
	$dp = "/dp/";
	$findasin = strpos($azonlink, $dp);
	//if /dp/ is found, rip out asin
	if ($findasin) {
		$asin2 = $findasin + 4;
		$asin = substr($azonlink, $asin2, 10);

		// echo $asin . "<br /><br />";

		//echo '[amazon box="'. $asin . '"]' ."<br /><br />" ;
		//echo $asin;
		$longstring = $longstring . $asin .', ';
                
		
		
		//echo $azonlink . "  " . $findasin . "<br /><br />";
		$iterator = $iterator + 1;
	}

	else {
		continue;
	}

	If ($iterator >= 11) {
$longstring = rtrim($longstring,',');
 $longstring = $longstring .  '';
echo $longstring;
return null;
		//die();
	}

}
?>