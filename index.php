<?php
	session_start();
	
	$q = ( isset($_REQUEST["q"]) ) ? $_REQUEST["q"] : "";
	if(isset($q)){
		$_SESSION["TagPage"] = $q;
	}else{
		$_SESSION["TagPage"] = false;
		unset($_SESSION["TagPage"]);
	}
	require("journal.html");
?>