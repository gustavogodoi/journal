<?php

$_SESSION["username"] = "sample";
$_SESSION["password"] = "eferw5wr335£65";

function executeAPI( $url = false){

	if(!testAPI()){
		throw new Exception('Error: There a rate limits on the Sample resource, if you receive a 429 response, wait 3 to 5 seconds before re­requesting data.');
	}

	if($url){		
		$objReturn = conectAPI($url);
		return $objReturn;
	}else{
		throw new Exception('Error: URL API Null');
	}

}

function testAPI(){
	
	$return = conectAPI();

	if($return->response == "429" || $return->status == "429"){
		return false;
	}else{
		return true;
	}
	
}

function conectAPI($url = false){
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, $_SESSION["username"] . ":" . $_SESSION["password"]);

	curl_setopt($curl, CURLOPT_URL, "http://api.thejournal.ie/v3/".$url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$jsonReturn = curl_exec($curl);

	curl_close($curl);

	$objReturn = json_decode($jsonReturn);

	return $objReturn;
}

?>