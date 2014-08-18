<?
	$path="../";
	
	require_once($path."lib/global.inc.php");
	
	$id = request("id");
	
	if (request("ERROR_STR")=="") {
	
     $urow = mysql_fetch_array(mysql_query("select * from tld_user_acc where u_id = '$id'"));
	if ($urow!="") {
	  $full_name=$urow['first_name'].' '.$urow['last_name'];
	} else {
	   $_REQUEST['ERROR_STR'] = "Error : No Page to display, Parameters are incorrect";
	   include $path."error.php";
	   die();
	} 
	
} ?>
<title>::VIEW USER::</title>
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../lib/js/functions.js">
</script>
<? include $path."lib/editor.inc.php"; ?><input type="hidden" name="id" value="<? echo $id; ?>" >

<? include "../error.php" ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellspacing="1" >
      <tbody>
        <tr valign="top">
          <td height="30" colspan="2" bgcolor="#F5F5F5" class="schrift_ueberschrift"  ><span style="color: #c10000"><font style="font-size: 16pt">VIEW USER</font></span> <span style="color: #57A6C7"><font style="font-size: 16pt">(<? echo ($full_name==""?$urow['name']:$full_name); ?>)</font> </span> </td>
        </tr>
        <tr >
          <td height="20" align="right" bgcolor="#FFFFFF" >User Id :</td>
          <td bgcolor="#FFFFFF"><strong> &nbsp;<? echo $urow['u_id']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >FaceBook User Id :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['fb_user_id']; ?></strong></td>
        </tr>
        <tr >
          <td width="29%" height="20" align="right" bgcolor="#FFFFFF" >Full Name :</td>
          <td width="26%" bgcolor="#FFFFFF"><strong> &nbsp;<? echo $urow['name']; ?></strong></td>
          </tr>
        
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >First Name :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['first_name']; ?></strong></td>
        </tr>
       
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >Last Name  :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['last_name']; ?></strong></td>
        </tr>
        
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >FaceBook Profile Link :</td>
          <td bgcolor="#FFFFFF"><strong>&nbsp;<? echo $urow['link']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >UserName  :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['username']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >Home Town Id :</td>
          <td bgcolor="#FFFFFF"><strong>&nbsp;<? echo $urow['hometown_id']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >Home Town Name :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['hometown_name']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >Gender :</td>
          <td bgcolor="#FFFFFF"><strong>&nbsp;<? echo $urow['gender']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >Time Zone  :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['timezone']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >Locale :</td>
          <td bgcolor="#FFFFFF"><strong>&nbsp;<? echo $urow['locale']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >Verified  :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo $urow['verified']; ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#F5F5F5" >FaceBook Account Last Updated :</td>
          <td bgcolor="#FFFFFF"><strong>&nbsp;<? echo date(_DateFormat,strtotime($urow['login_last_updated'])); ?></strong></td>
        </tr>
        <tr>
          <td height="20" align="right" bgcolor="#FFFFFF" >Join PTI Date  :</td>
          <td bgcolor="#F5F5F5"><strong>&nbsp;<? echo date(_DateFormat,strtotime($urow['created_date'])); ?></strong></td>
        </tr>
        <!--<tr>
      <td align="right" >&nbsp;Points (For Use) :</td>
      <td><? echo $urow['points'] ?></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF" >Points (Redeemed) :</td>
      <td bgcolor="#FFFFFF"><? echo $urow['redeem_points'] ?></td>
    </tr>
    <tr>
      <td align="right" >Member's Language : </td>
      <td><? echo $Language[$urow['language']]; ?></td>
    </tr>-->
      </tbody>
    </table></td>
  </tr>
</table>
<div align="center">
  <input name="Close Window" type="submit" id="Close Window" value="Close This Window" onclick="javascript:window.close();" />
</div>
