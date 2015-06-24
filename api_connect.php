<!doctype html>
<html>
<head>
<style>
body{
	font-size:20px;
}
</style>
</head>
<body>
<?php
//designing part remaining.

echo "<div style ='font:23px Arial,tahoma,sans-serif;color:brown'>"."Repo-List ="."</div>";
echo nl2br("\n");
//$username=$_POST['username1'];
$username="Lutir";
/* gets url */
function get_content_from_github($url) {
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,100);
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
$out=json_decode($abc,true);


$i=0;
for($i=0;$i<100;$i++){
	echo nl2br("\n");
echo @"<div style ='font:19px Arial,tahoma,sans-serif;color:blue'>".@$out[$i]['name']."</div>";

}
?>
</body>
</html>
