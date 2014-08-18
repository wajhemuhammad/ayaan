<?
	$path="../";
	require_once($path."lib/global.inc.php");
	$action = request("action");
	$id = request("id");	
	
	if ($action=="addarticle") {
		
		$createddate = date("Y-m-d H:i:s");
		
		$query = "insert into tld_article(send_notification,title,notification_msg,article_text,notification_sent,success,failed,created_date) values ('".$_POST['send_notification']."','".$_POST['title']."','".$_POST['notification_msg']."','".$_POST['rte1']."','0',0,0,now())";
		//echo $query."<br>";
		 if (mysql_query($query)){
			 header ("location:../index.php?main=article&sub=aview&success=1&action=new_article");
		}else{	
		  	header ("location:../index.php?main=article&sub=aview&success=0&action=new_article");
		}
	}

 if($action=="editarticle"){
	
	$query = "update tld_article set title='".$_POST['title']."',notification_msg='".$_POST['notification_msg']."',article_text='".$_POST['rte1']."',send_notification='".$_POST['send_notification']."' where id=".$_POST['id'];
	
		if (mysql_query($query)) {
				 		
		  header ("location:../index.php?main=article&sub=aview&success=1&action=editarticle");
		  }
		else
		  header ("location:../index.php?main=article&sub=aview&success=0&action=editarticle");
 }

 
?>