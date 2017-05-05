<?php 
function check_for_email_existance($email){
	$con = $GLOBALS['con'];
	$data=$con->query("SELECT email FROM users WHERE email='$email'");
	if($data->num_rows==0){
		return false;
	}else{
		return true;
	}
}