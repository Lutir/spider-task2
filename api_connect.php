<?php

echo "hello";
$username="Lutir";
/* gets url */
function get_content_from_github($url) {
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Hello Git!');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$content = curl_exec($ch);
	
 if($content == false) die(curl_error($ch));
	
	curl_close($ch);
	//$content=json_encode($content);
	return $content;
}

$left="https://api.github.com/users/";
$right="/repos";
$url=$left.$username.$right;
$abc = get_content_from_github($url);
$i=0;
for($i=0;$i<strlen($abc);$i++){
	if($abc[$i]==','){
		echo nl2br(".\n");	  
		
	}
	echo $abc[$i];	
}




?>
