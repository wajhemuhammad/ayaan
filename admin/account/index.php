<? 
if (request("del")==1) {
   $ad_id = request('id');
   $del_message = mysql_query("DELETE FROM tld_ad_acc where ad_id = '$ad_id'");
}


$page = (request("page"))?request("page"):1;
$limit = _ItemsPerPageAdmin; 
$start = ($page-1) * $limit;
 $t_rec = @mysql_result(mysql_query("select count(ad_id) from tld_ad_acc"),0,0);
$t_pages = @ceil($t_rec/$limit);
$link = "index.php?main=account&sub=index&";

$members = mysql_query("select * from tld_ad_acc limit $start,$limit"); 


?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 17px;
	font-weight: bold;
	color: #57A6C7;
}
-->
</style>

<table border="0" cellpadding="0" cellspacing="0" height="535"
 width="100%">
  <!--Tabelle_mitte-->
  <tbody>
    <tr>
      <td
 style="background-image: url('images/curve_02.jpg');"
 height="60"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%"><img src="images/curve_01.jpg" border="0"/></td>
    <td width="99%"><div style="padding-top: 14px;"> <span style="color: #c10000"> <font style="font-size: 16pt">Admin Account</font> </span></div></td>
  </tr>
</table>
</td>
    </tr>
    <tr>
      <td height="461" valign="top"><table border="0" cellpadding="0" cellspacing="0"
 height="441" width="100%">
        <!--Tabelle_mitte-->
        <tbody>
          <tr>
            <td width="5%"
 height="22" valign="middle" class="schrift_ueberschrift"><img border="0" src="bilder/IMG_butt_find_STUFF.gif" /></td>
            <td width="95%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td height="419" colspan="2"
 valign="top" class="schrift_mitte">
              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="97%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#999999"><table bordercolor="#cccccc" cellspacing="1" width="100%" border="0">
          <tbody>
            <tr>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>#</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Full Name</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Email</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Country</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Login</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Admin Type</strong></div></td>
              <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>Action</strong></div></td>
            </tr>
            <? while ($row = mysql_fetch_array($members)) { ?>
            <tr>
              <td height="30" bgcolor="#FFFFFF"><? echo $row['ad_id'] ?></td>
              <td bgcolor="#FFFFFF"><? echo $row['fname']." ".$row['lname'] ?></td>
              <td bgcolor="#FFFFFF"><? echo $row['email'] ?></td>
              <td bgcolor="#FFFFFF"><? echo @mysql_result(mysql_query("select country from tld_country where country_id='".$row['country_id']."'"),0,0); ?></td>
              <td bgcolor="#FFFFFF"><? echo $row['uname'] ?></td>
              <td bgcolor="#FFFFFF"><strong><? echo @mysql_result(mysql_query("select name from tld_admin_cat where ad_cat_id='".$row['ad_cat_id']."'"),0,0); ?></strong></td>
              <td align="center" nowrap="nowrap" bgcolor="#FFFFFF"><a href="#" onclick="popup('account/edit_upass.php?id=<? echo $row['ad_id'] ?>',400,200);">Pwd</a><strong>/</strong><a href="index.php?main=account&amp;sub=edit&amp;id=<? echo $row['ad_id']; ?>">Edit</a>
                  <? if ($row['ad_id']!=1) { ?>
                <strong>/</strong><a href="index.php?main=account&amp;sub=index&amp;id=<? echo $row['ad_id']; ?>&amp;del=1" onclick="javascript:return(confirm('Are you source, you want to DELETE this account?'))">Delete</a>
                <? } ?></td>
            </tr>
            <? } ?>
          </tbody>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<? 
 include "paging.php";
 ?></td>
                </tr>
              </table>            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    
  </tbody>
</table>


