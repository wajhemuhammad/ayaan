<?php
require 'src/facebook.php';
include "admin/lib/front.inc.php";	
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '144538905714459',
  'secret' => '34f4537a455d23c345581f370e210548',
));
$app_id = '144538905714459';
$app_secret = '34f4537a455d23c345581f370e210548';
$appname = 'helloayaan';
$result = mysql_query("select id,notification_msg from tld_article WHERE send_notification = '1' and notification_sent != '1' order by created_date DESC");
while ($row = mysql_fetch_array($result)) {
	 $success = 0;
	 $fail = 0;
	 $usersRS = mysql_query("select fb_user_id from tld_user_acc where fb_user_id = 806284297 order by u_id ASC");
	 while ($userRow = mysql_fetch_array($usersRS)) {
		 //echo $userRow['fb_user_id'];
		 //echo $row['notification_msg']; 
	   
	   try {
    		$response = @$facebook->api( '/'.$userRow['fb_user_id'].'/notifications', 'POST', array(
		  'template' => $row['notification_msg'],
		  'href' => 'index.php?main=article&sub=detail&id='.$row['id'],
		  'access_token' => $app_id.'|'.$app_secret
	  		) );
		} catch (Exception $e) {
    		//echo 'Caught exception: ',  $e->getMessage(), "\n";
			 $fail++; 
		}
	  if ($response['success']==1) $success++;
	   unset($response);
	 }
	 if ($success>0) {
		 mysql_query("update tld_article set notification_sent = '1', success = ".number_format($success).", failed = ".number_format($fail)." WHERE id = '".$row['id']."'");
	 }
}
?>
 