<?php
include_once 'class/database.php';
date_default_timezone_set('Asia/Calcutta');
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

$ajax=isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
$ajax=true;
if($ajax){
	extract($_POST);
	if(!isset($name)||$name==""||sizeof($name)>40){
		$r->success=false;
		$r->error="Name can't be empty or larger than 40 characters.";
		echo json_encode($r);
		die();
	}
	if(!isset($email)||$email==""||sizeof($email)>50){
		$r->success=false;
		$r->error="Email can't be empty or larger than 50 characters.";
		echo json_encode($r);
		die();
	}
	if(!isset($number)||$number==""||sizeof($number)>20){
		$r->success=false;
		$r->error="Enter a valid number.";
		echo json_encode($r);
		die();
	}
	if(!isset($institute)||$institute==""||sizeof($institute)>20){
		$r->success=false;
		$r->error="Institute can't be empty or larger than 200 characters.";
		echo json_encode($r);
		die();
	}
	if(!isset($muncount)||$muncount==""||!is_numeric($muncount)){
		$r->success=false;
		$r->error="Please enter a valid number of MUN attended.";
		echo json_encode($r);
		die();
	}
	if(sizeof($exp)>600){
		$r->success=false;
		$r->error="Experience can't be larger than 600 characters.";
		echo json_encode($r);
		die();
	}
	$db=new DATABASE();
	$res=$db->find("applications", array("where"=>array("email"=>trim($email))),"id");
	if($res){
		$r->success=false;
		$r->error="Email address already registered.";
		$r->array=json_encode($res);
		echo json_encode($r);
		die();
	}
	$data["name"]=$db->escape($name);
	$data["gender"]=$db->escape($gender);
	$data["institute"]=$db->escape($institute);
	$data["number"]=$db->escape($number);
	$data["email"]=$db->escape($email);
	$data["muncount"]=$db->escape($muncount);
	$data["exp"]=$db->escape($exp);
	$data["type"]=$db->escape($type);
	$data["date"]=date("Y-m-d h:i:s");
	if($type=="eb"||$type=="delegate"){
		$data["committee"]=$committee;
	}
	if($type=="delegate"){
		$data["double_delegate"]=$double;
		if($double==1) {
			$data["partner_name"]=$partner_name;
			$data["partner_number"]=$partner_number;
		}
		$data["country"]=$country;
	}
	if($db->insert($data, "applications")){
		$r->success=true;
		$r->id=$db->insertid()."";
		while(strlen($r->id)<4){
			$r->id="0".$r->id;
		}
		$r->id="BM".$r->id;
		echo json_encode($r);
		try{
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= "From: no-reply@bitmun.co" . "\r\n";
			$str="Thank you for applying for BIT MUN 2014.<br/>";
			$str.= "This is your unique id : ".$r->id."<br/>";
			$str.= "Please keep this id for future reference.<br/>";
			$str.= "This is an auto generated email. Please don't reply to this email.<br/>";
			$str.= "Regards";
			mail($email,"Thanks for applying.",$str,$headers);
		}catch(Exception $e){
			try{
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers .= "From: no-reply@bitmun.co" . "\r\n";
				$str="Email not sent to $email id : ".$r->id."<br/>";
				mail("sorbhb@gmail.com","Error bitmun.",$str,$headers);
			}catch(Exception $e1){
				
			}
		}
		die();
	}else{
		$r->success=false;
		$r->error="Error occurred. : \n".$db->error();
		echo json_encode($r);
		die();
	}
}
?>