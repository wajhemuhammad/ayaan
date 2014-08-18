<?  
  $id = request('id'); 
  $getprofile = mysql_query("select * from tld_user_acc where u_id='$id'");
  $prow = mysql_fetch_array($getprofile);
   if ($_REQUEST['ERROR_STR']!="") {
     $prow['first_name'] = $_REQUEST['firstName'];
	 $prow['last_name'] = $_REQUEST['lastName'];
	 $prow['email'] = $_REQUEST['email'];
	 $prow['tld_country_id'] = $_REQUEST['country'];
	 $prow['age'] = $_REQUEST['age'];
  } ?>
<style type="text/css">
<!--
.style4 {font-size: 12px}
.style5 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<form name="RegForm" action="employee/process.php" method="post" onsubmit="return(show_regedit_admin_errors());">
<input type="hidden" name="id" value="<?=$id ?>" />
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
    <td width="99%"><div style="padding-top: 14px;"> <span style="color: #c10000"> <font style="font-size: 16pt">EDIT USER</font> </span></div></td>
  </tr>
</table>
</td>
    </tr>
    <tr>
      <td height="461" valign="top"><table border="0" cellpadding="0" cellspacing="0"
 height="459" width="104%">
        <!--Tabelle_mitte-->
        <tbody>
          
          <tr>
            <td class="schrift_ueberschrift"
 height="22" valign="middle"><img border="0" src="bilder/IMG_butt_find_MEMBERS.gif" width="232" height="63" /></td>
          </tr>
          <tr>
            <td class="schrift_mitte" height="419"
 valign="top"><div style="padding-left: 5px;">
              <table width="95%" border="0" align="center">
                <tr>
                  <td align="left" valign="top" ><? include "message.php"; ?>
                      <label id="ErrorLable1" class="error"></label>
                      <table width="100%" border="0" cellpadding="4" cellspacing="0">
                        <tbody>
                          <tr>
                            <td width="31%" ><font color="#ff0080">* </font>Email (Login Id) </td>
                            <td width="69%"><strong>
                              <?=$prow['email'] ?>
                              </strong>
                                <input type="hidden" name="email" value="<?=$prow['email'] ?>" /></td>
                          </tr>
                          
                          <tr>
                            <td ><font color="#ff0080">* </font>First Name:</td>
                            <td><input name="firstName" id="firstName" value="<?=$prow['first_name']?>" />                            </td>
                          </tr>
                          <tr>
                            <td >&nbsp;&nbsp;&nbsp;Last Name:</td>
                            <td><input name="lastName" id="lastName" value="<?=$prow['last_name']?>" />                            </td>
                          </tr>
                          <tr>
                            <td ><font color="#ff0080">* </font>Age:</td>
                            <td><input name="age" id="age" value="<?=$prow['age']?>" /></td>
                          </tr>
                          <tr>
                            <td ><font color="#ff0080">* </font>Country:</td>
                            <td><? CreateCombo ("country","Select country_id,country from tld_country order by country","SELECT",$prow['tld_country_id']); ?></td>
                          </tr>
                          <tr>
                            <td ><font color="#ff0080"> &nbsp; &nbsp;</font>Status</td>
                            <td><? CreateComboArray ('status',$UserStatus,NULL,$prow['status']) ?></td>
                          </tr>
                          <tr>
                            <td colspan="2" class="text_11normblack style4 style5"><span class="heading"><strong>Change Password </strong><br />
                                  <span class="small"><strong>Note:</strong> leave remain empty for unchanged password.</span></span></td>
                          </tr>
                          <tr>
                            <td >&nbsp;&nbsp;&nbsp;New Password</td>
                            <td><input name="password1" type="password" id="password1" /></td>
                          </tr>
                          <tr>
                            <td >&nbsp;&nbsp;&nbsp;Retype New Password</td>
                            <td><input name="password2" type="password" id="password2" />                            </td>
                          </tr>
                          <tr>
                            <td height="82">&nbsp;</td>
                            <td><input type="submit" value="Save" name="Submit" />
                                <input type="reset" value="Reset" name="Submit2" />
                                <br />
                                <br />
                                <font face="Arial" color="#ff0080" 
                              size="1">* = required field</font> </td>
                          </tr>
                        </tbody>
                    </table></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
   
  </tbody>
</table>
</form>