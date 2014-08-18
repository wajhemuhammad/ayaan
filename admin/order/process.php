<?
$path="../";
require_once($path."lib/global.inc.php");

	$cid = trim($_REQUEST["cid"]);
   	$pid = trim($_REQUEST["pid"]);
	$price = trim($_REQUEST["Total_Price"]);
	
	$shippingAdd = trim($_REQUEST["shippingAdd"]);
	$billingAdd = trim($_REQUEST["billingAdd"]);
	
	$RandVal = rand(111111,9999999).strtotime(date(DB_DT_FORMAT));
			$orderId = mysql_result(mysql_query("select (max(id)) from tld_order"),0,0)+1; 
			$orderQuery = "insert into 
			tld_order(id,token_number,status,shipping_add, billing_add, amount ,created_on,modified_on)
			values('$orderId','$RandVal','A', '$shippingAdd','$billingAdd','$price' ,now(),now())";
   			@mysql_query($orderQuery);
			
		    $obtopics=@mysql_fetch_object(@mysql_query("select * from tld_product where id='$pid'"));
			$proId = mysql_result(mysql_query("select (max(id)) from tld_order_product"),0,0)+1;
			$proCat = mysql_fetch_array(mysql_query("select id, cat_name from tld_category a, tld_product_cat b where a.id = b.tld_category_id and b.tld_product_id = '$pid'"));
			$proInsert = "insert into tld_order_product 
			(id, tld_order_id, tld_product_id, tld_product_cat_id, cat_name, title, description, image, price, created_on, modified_on)
			values
			('$proId', '$orderId', '$pid', '".$proCat['id']."','".addslashes($proCat['cat_name'])."', '".addslashes($obtopics->title)."', '".addslashes($obtopics->description)."', '".$obtopics->image."', '".$price."', now(), now())";
	        @mysql_query($proInsert);
   
            
			while (list($k,$v)= each($_REQUEST)) {
			     
			     if (eregi("_Option",$k)) {
				     	$data = split("~@~",stripslashes($v)); 
				     	$proInsertSub = "insert into tld_order_product_sub 
						(tld_order_product_id, type, value, price, created_on, modified_on)
						values ('$proId', '".addslashes(str_replace("_Option","",$k))."', '".addslashes($data[1])."', '".$data[0]."', now(), now())";
				 		@mysql_query($proInsertSub);
					}
           }
		  
        header("location:../index.php?main=order&sub=msg");

?>