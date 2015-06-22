<?php
	session_start();
	include("api.php");
	
	
	if(isset($_SESSION["TagPage"])){
		$addURL = "sample/tag/". $_SESSION["TagPage"];
	}else{
		$addURL = "sample/thejournal/";
	}
	$return = executeAPI($addURL);

	foreach($return->response->articles as $article){

		if(isset($article->title)){
			$dataReturn[] = array(
				"title"=> utf8_encode($article->title),
				"image"=>$article->images->thumbnail->image,
				"excerpt"=> utf8_encode($article->excerpt)
			);
		}
		
	}

	$jsonReturn = json_encode( $dataReturn , JSON_UNESCAPED_UNICODE);

	echo utf8_decode($jsonReturn);
?>