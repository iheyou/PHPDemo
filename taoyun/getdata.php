<?php 
require 'DataInterface.php';
require 'demo.php';

function addItem {
	$itemArr = array(
		'title' =>"'".parent::POST("item_title")."'" ,
		'content' => "'".parent::POST("item_content")."'"
	 );

	$mode=parent::sqlInsert("taoyunzhushou_question",$itemArr);	
}


function checkword($info){
	return array(
    "goodname"=>"asfsfsf"
	);
	$mode=parent::sqlInsert("taoyun",$itemArr);
		
}

$getdata=checkword($getword);

function operdis($data){
   for($i=0){
     return "<opton></otpn>";
   }
}



?>
