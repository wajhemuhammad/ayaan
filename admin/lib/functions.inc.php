<?
function att_calc($op1,$op2,$opt) {
  switch($opt) {
    case '+':
	  return $op1+$op2;
	break;
	case '-':
	  return $op1-$op2;
	break;
	case '*':
	  return $op1*$op2;
	break;
	case '/':
	  return $op1/$op2;
	break;
  }
}
function product_display($productRow) { 
   global $p_cat,$c_cat,$main,$sub,$page;
   
?>
 <ul class="template clearfix">
                                    <li class="with"><? echo $productRow['title'] ?></li>
                                    <li class="item">item <? echo $productRow['item_number'] ?></li>
                                    <li class="no-bg">from <? echo (!empty($productRow['price1'])?_DefaultCurrency1.number_format($productRow['price1'],0):'').(!empty($productRow['price2'])?' / '._DefaultCurrency2.number_format($productRow['price2'],0):'').(!empty($productRow['price3'])?' / '._DefaultCurrency3.number_format($productRow['price3'],0):'').(!empty($productRow['price4'])?' / '._DefaultCurrency4.number_format($productRow['price4'],0):''); ?></li>
                                 </ul>
                                 <div class="software-photo2-out clearfix">
                                     <a href="?main=product&sub=index&pid=<? echo $productRow['id'] ?>&c_cat=<?=$c_cat ?>&p_cat=<?=$p_cat ?>" title="<? echo $productRow['title'] ?>"><img class="software-photo2" src="admin/lib/thumbnail.php?img=<?=urlencode("../images/product/".($productRow['image']?$productRow['image']:'no_image.jpg'));?>&size=329&sq=2"></a>
                                     <div class="software-photo2-right">
                                         <p><? //echo nl2br($productRow['description'])  
										      $str1=str_word_count($productRow['description'],1);
								   				if (count($str1)>22) {
								   				for($i=0; $i<=22; $i++) echo $str1[$i]." ";
								   				echo "... ".'<strong><a href="?main=product&sub=index&pid='.$productRow['id'].'&c_cat='.$c_cat.'&p_cat='.$p_cat.'">more</a></strong>';
								   				} else {
								      				echo $productRow['description'];
								   				}
										 ?></p>
                                         <ul class=" demo clearfix">
                                            <li class="see"><a href="?main=product&sub=index&pid=<? echo $productRow['id'] ?>&c_cat=<?=$c_cat ?>&p_cat=<?=$p_cat ?>">Buy Now!</a><? /* <a href="process.php?main=<?=$main ?>&sub=<?=$sub?>&pid=<?=$productRow['id']?>&c_cat=<?=$c_cat ?>&p_cat=<?=$p_cat ?>&qnt=1&act=add&page=<?=$page?>">Add to Cart!</a> */?></li>
                                             <li class="see2"><a href="?main=product&sub=index&pid=<? echo $productRow['id'] ?>&c_cat=<?=$c_cat ?>&p_cat=<?=$p_cat ?>">Product Details</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <img class="line" src="images/line.jpg" alt="" /><? 							
 }
  function disp_error($e_str=NULL){
 if ($e_str) {
    
	} else {
 }
 }
 
 function update_other_user_search($searchId) {
    $getSearchResult = mysql_query("Select id,match_found_search_ids from tld_search where match_found_search_ids like '%i:".$searchId.";%' "); 
		 while ($getSearchRow = mysql_fetch_array($getSearchResult)){
		     $searches = unserialize($getSearchRow['match_found_search_ids']);
			 unset($searches[$searchId]);
			 if (count($searches)>0) {
		     mysql_query("UPDATE tld_search set match_found = (match_found-1), match_found_search_ids = '".serialize($searches)."' WHERE id = '".$getSearchRow['id']."'");
			 } else {
			 mysql_query("UPDATE tld_search set match_found = (match_found-1), match_found_search_ids = '' WHERE id = '".$getSearchRow['id']."'");  
			 }
		 }
 }
 function delete_employee($empID) {
    
      $del_message = mysql_query("DELETE FROM tld_user_acc where u_id = '$empID'");
	  
	  
   if ($del_message){
      $_REQUEST['MSG_STR']="Message : User is deleted successfully";
   } else {
      $_REQUEST['ERROR_STR'] = mysql_error();
   }
  
}

 function remove_special($str) {
  return strtolower(ereg_replace("[^[:alnum:]]","",preg_replace('/\s\s+/', '',$str)));
 }
 function sub_status($status){
 
    switch ($status) {
	  case 'N': 
	    return "NEW";
	  break;
	  case 'D': 
	    return "DELINED";
	  break;
	  case 'A': 
	    return "ACCEPTED";
	  break;
	  case 'S': 
	    return "SUBMITTED";
	  break;
	}
 }
 function request($variable,$method=NULL) {
    switch ($method) {
	case 'G':
	if (isset($_GET[$variable]))
	  return trim($_GET[$variable]);
	break;
	case 'P':
	if (isset($_POST[$variable]))
	  return trim($_POST[$variable]);
	break;
	case 'S':
	  if (isset($_SESSION[$variable]))
	  return trim($_SESSION[$variable]);
	break;
	default:
	if (isset($_REQUEST[$variable]))
	  return trim($_REQUEST[$variable]);   
	}
 }
 function standard_data ($InputData) { 
 return eregi_replace("'","\'",eregi_replace("\\\\","",trim($InputData)));
 } 
 function check_login(){
    GLOBAL $main,$sub,$ER_STR;
    $USER_NAME = request("USER_NAME","S");
	$sub = request("sub");
	$uname = request("uname");
	$pwd = request("pwd");
	
	if (!isset($USER_NAME) && empty($sub)) {
	  $main = "account";
	  $sub = "login";
      return 1;
	} else if ($sub==1 && !empty($uname) && !empty($pwd)){
	    $chk_login = mysql_fetch_array(mysql_query("SELECT * FROM tld_ad_acc as ad ,tld_admin_cat as cat WHERE ad.ad_cat_id = cat.ad_cat_id and uname = '$uname' and pwd = md5('$pwd')"));
		
		if ($chk_login!="") {
		 
		   $_SESSION['USER_ID'] = $chk_login['ad_id'];
		   $_SESSION['USER_NAME'] = $chk_login['uname'];
		   $_SESSION['FIRST_NAME'] = $chk_login['fname'];
		   $_SESSION['LAST_NAME'] = $chk_login['lname'];
		   $_SESSION['FULL_NAME'] = $chk_login['fname']." ".$chk_login['lname'];
		   $_SESSION['EMAIL'] = $chk_login['email'];
		   $_SESSION['PHONE'] = $chk_login['phone'];
		   $_SESSION['AD_CAT_ID'] = $chk_login['ad_cat_id'];
		   $_SESSION['AD_CAT_NAME'] = $chk_login['name'];
		   $_SESSION['AD_CAT_LEVEL'] = $chk_login['level'];
		   
		} else {
		   $ER_STR = "ERROR : Your Login Name or Password is in correct";
		   $main = "account";
           $sub = "login";
		}
	}else {
	  $ER_STR = "ERROR : Both User Name and Password Fields are Mandatory!";
	    $main = "account";
	    $sub = "login";
	}
 }
 
 	function FillCombo($id, $query)
	{
		//include("db.php");
		$rs = mysql_query($query) or die("Query Failed ".mysql_error());
		while($row = mysql_fetch_array($rs))
		{
			if($row[0]==$id)
				print "<option value='$row[0]' selected>$row[1]</option>";
			else
				print "<option value='$row[0]' >$row[1]</option>";
		}
		//mysql_close();
	}
	function CreateCombo ($name,$query,$opt0=NULL,$selected=NULL,$param=NULL) {
	?> 
	  <select name="<?=$name?>" id="<?=str_replace("[]","",$name)?>" <? echo $param ?> >
	    <? if ($opt0!="") { ?>
		 <option value=""><?=$opt0; ?></option>
		<? } ?>
	  <? $rs = mysql_query($query);
		while($row = mysql_fetch_array($rs))
		{
			if($row[0]==$selected)
				echo '<option value="'.$row[0].'" selected="selected">'.$row[1].'</option>';
			else
				echo  '<option value="'.$row[0].'" >'.$row[1].'</option>';
		}
	   ?>
	    </select>
	   <? 
	}
	function CreateComboArray ($name,$array,$opt0=NULL,$selected=NULL,$param=NULL) {
	?> 
	  <select name="<?=$name?>" id="<?=str_replace("[]","",$name)?>" <? echo $param ?> >
	    <? if ($opt0!="") { ?>
		 <option value=""><?=$opt0; ?></option>
		<? } ?>
	  <? 
		while(list($key,$val) = each($array))
		{
			if($key==$selected)
				echo '<option value="'.$key.'" selected="selected">'.$val.'</option>';
			else
				echo  '<option value="'.$key.'" >'.$val.'</option>';
		}
	   ?>
	    </select>
	   <? 
	}
	function FillSelectedList($lstQry, $idQry, $Column)
	{
		//include("db.php");
		$rs = mysql_query($lstQry) or die("Query Failed ".mysql_error());
		while($row = mysql_fetch_array($rs))
		{
			$currIdQry = $idQry . " AND " . $Column . " = '$row[0]'";
			$rs1 = mysql_query($currIdQry) or die("Query Failed ".mysql_error());
			if(mysql_num_rows($rs1)>0)
				print "<option value='$row[0]' selected>$row[1]</option>";
			else
				print "<option value='$row[0]' >$row[1]</option>";
		}
//		mysql_close();
	}
function strip($fval) {
    return eregi_replace("\\\\","",$fval);
}
function get_time_difference( $start, $end )
{
	
    $uts['start']      =    strtotime( $start );
    $uts['end']        =    strtotime( $end );
	//echo $uts['end'] ."==". $uts['start'];
	//echo "<br>". strtotime(date('H:i:s'));
    if( $uts['start']!==-1 && $uts['end']!==-1 )
    {
		
        if( $uts['end'] >= $uts['start'] )
        {
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
        else
        {
			
            $uts['start']      =    strtotime( $start );
   			$uts['end']        =    strtotime( $end );
			$abc = $uts['end']+86400;
			$diff    =    ($abc - $uts['start']);
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
    }
    else
    {
        trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    }
    return( false );
}

// Add two time and return the total hour and min

function add_two_time( $start, $end )
{
  		$pieces = explode(":", $start);
		$chour= $pieces[0]; // piece1
		$cminute = $pieces[1]; // 
		$csecond =  $pieces[2];
 
  		$chour = $chour * 3600;
		$cminute =$cminute * 60;
		$csecond = $csecond + $cminute+ $chour;
		//Second Time to split
 		$pieces1 = explode(":", $end);
		$chour1 = $pieces1[0]; // piece1
		$cminute1 = $pieces1[1]; // 
		$csecond1 =  $pieces1[2];
  
 		 $chour1 = $chour1 * 3600;
		$cminute1 =$cminute1 * 60;
		$csecond1 = $csecond1 + $cminute1+ $chour1;
   		$csecond = $csecond + $csecond1 ;
		$hour = intval($csecond / 3600);
		$min = $csecond % 3600;
		$sec = $min % 60;
		$min = intval($min / 60);
		//echo $hour."=".$min."=".$sec;
		//echo $sec;
            return( array('days'=>$days, 'hours'=>$hour, 'minutes'=>$min, 'seconds'=>$sec) );
 }

function convertTime($vtime){
   if ($vtime!="") {
   $ptr = ":";
   $v1 = split($ptr,$vtime);
   $vtime = $v1[0]+($v1[1]/60);
   }
   return round($vtime,2);
 }
 function DOB($name=NULL,$day=NULL,$mon=NULL,$year=NULL) { ?>
    <table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><select name="<? echo $name ?>_dob_day" size="1">
	  <option value="">day</option>
	  <? for ($i=1; $i<=31; $i++) { ?>
	    <option value="<?=$i?>" <? echo ($day!="" && $day!=0?($day==$i?"selected=\"selected\"":""):""); ?> ><?=$i?></option>
	  <? } ?>
	</select>&nbsp;/<br />
    <font size="1" color="#999999">DD</font>
	</td>
    <td>&nbsp;<select name="<? echo $name ?>_dob_mon" size="1">
	  <option value="">mon</option>
	  <? for ($i=1; $i<=12; $i++) { ?>
	    <option value="<?=$i?>" <? echo ($mon!="" && $mon!=0 ?($mon==$i?"selected=\"selected\"":""):""); ?> ><?=$i?></option>
	  <? } ?>
	</select>&nbsp;/<br />
    &nbsp;<font size="1" color="#999999">MM</font>
	</td>
    <td>&nbsp;<select name="<? echo $name ?>_dob_year" size="1">
	  <option value="">year</option>
	  <? for ($i=1940; $i<=2006; $i++) { ?>
	    <option value="<?=$i?>" <? echo ($year!="" && $year!=0 ?($year==$i?"selected=\"selected\"":""):""); ?>><?=$i?></option>
	  <? } ?>
	</select>&nbsp;<br />
    &nbsp;<font size="1" color="#999999">YYYY</font>
	</td>
  </tr>
</table>
<? }

function return_char($int) {
	  $div = $int/25;
	  
	  if ($div>1) return chr(64+floor($div)).chr(65+($int-26));
	  else return chr(65+$int);
	}
function search_form() { ?>
<form action="index.php" method="get"><table width="96%" border="0" cellspacing="8" cellpadding="0">
 <input type="hidden" name="main" value="search" />
 <input type="hidden" name="sub" value="index" />
      <tr>
        <td width="15%" align="right" nowrap="nowrap">Keyword : </td>
        <td align="left" nowrap="nowrap"><label>
          <input name="keywords" type="text" id="keywords" size="20" value="<?=request('keywords');?>" />
        </label></td>
        <td align="right" nowrap="nowrap">Agent Name : </td>
        <td width="23%" align="left" nowrap="nowrap"><label>
          <input name="agentName" type="text" id="agentName" size="15" value="<?=request('agentName');?>" />
        </label></td>
      </tr>
      <tr>
        <td align="right" nowrap="nowrap">Country : </td>
        <td align="left" nowrap="nowrap"><label></label>
              <label>
              <?  CreateCombo ("country","select country_id as id,country as name from tld_country order by name","Select Country",request('country')) ?> 
        </label></td>
        <td width="21%" align="right" nowrap="nowrap">Select Month : </td>
        <td align="left" nowrap="nowrap"><select name="month" size="1" id="month">
		  <option value="">----Select----</option>
		 <? for ($i=1; $i<=12; $i++) { ?>
		    <option <? echo (request('month')==$i?'selected="selected"':''); ?> value="<?=($i<10?"0".$i:$i)?>"><? echo date("F",strtotime("$i/1/1970")); ?></option> 
		 <? } ?>
        </select></td>
      </tr>
      <tr>
        <td align="right" nowrap="nowrap">City : </td>
        <td align="left" nowrap="nowrap"><input name="city" type="text" id="city" size="15" value="<?=request('city');?>" /></td>
        <td align="right" nowrap="nowrap">Select Year : </td>
        <td align="left" nowrap="nowrap"><select name="year" size="1" id="year">
		  <option value="">----Select----</option>
		 <? for ($i=date("Y")-1; $i<=date("Y")+1; $i++) { ?>
		    <option <? echo (request('year')==$i?'selected="selected"':''); ?> value="<?=$i?>"><? echo $i; ?></option> 
		 <? } ?>
        </select></td>
      </tr>
      <tr>
        <td align="right" nowrap="nowrap">Budget : </td>
        <td width="41%" align="left" nowrap="nowrap"><label>
          <input name="priceFrom" type="text" onkeydown="return(isNumeric(event));" id="priceFrom" value="<?=request('priceFrom');?>" size="7" />
          to
          <input name="priceTo" type="text" onkeydown="return(isNumeric(event));" id="priceTo" size="7" value="<?=request('priceTo');?>" />
        (US$)</label></td>
        <td nowrap="nowrap">&nbsp;</td>
        <td align="left" nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" nowrap="nowrap">&nbsp;</td>
        <td align="left" nowrap="nowrap"><label>
          <input type="submit" name="Submit" value="Submit" />
          <input type="reset" name="Submit2" value="Clear" />
        </label></td>
        <td nowrap="nowrap">&nbsp;</td>
        <td align="left" nowrap="nowrap">&nbsp;</td>
      </tr>
    </table></form>
<? }	
?>