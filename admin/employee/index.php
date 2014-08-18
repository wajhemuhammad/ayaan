<? 
if (request("del")==1) {
	$id = request('id');
   delete_employee($id);
}

$SDate = request("SDate");
$EDate = request("EDate");
$Filter = stripslashes(request("Filter"));
$FVal = request("FVal");

$gender = request("gender");
$DSQL = "";
$DQ2 = " order by created_date desc ";
if ($SDate!="" || $EDate!="") {
  
    if ($SDate!="" && $EDate =="") {
	  $DSQL.= " AND DATE_FORMAT(created_date,'%Y-%m-%d') = '".date(DB_DATE_FORMAT,strtotime($SDate))."'" ;    
	} elseif ($SDate == "" && $EDate != "") {
	  $DSQL.= " AND created_date <= '".date(DB_DATE_FORMAT." 23:59:59",strtotime($EDate))."'" ;
	} elseif ($SDate != "" && $EDate != "") {
	  $DSQL.= " AND (created_date >= '".date(DB_DATE_FORMAT." 00:00:00",strtotime($SDate))."' 
	            AND created_date <= '".date(DB_DATE_FORMAT." 23:59:59",strtotime($EDate))."')" ; 
	}
}
if ($Filter!="" && ($FVal!="" || $gender!="")) {
   
   if ($Filter !="gender") 
   $DSQL.= " AND $Filter like '%$FVal%'"; 
   elseif ($Filter =="gender") $DSQL.= " AND $Filter = '$gender'"; 
    
       $DQ2= " order by created_date desc ";
	
  
}
$page = (request("page"))?request("page"):1;
$limit = _ItemsPerPageAdmin; 
$start = ($page-1) * $limit;
$t_rec = @mysql_result(mysql_query("select count(u_id) from tld_user_acc WHERE 1 $DSQL"),0,0);
$t_pages = @ceil($t_rec/$limit);
$link = "index.php?main=employee&sub=index&SDate=$SDate&EDate=$EDate&Filter=$Filter&FVal=$FVal&status=$status&";

$result = mysql_query("select * from tld_user_acc WHERE 1 $DSQL $DQ2 limit $start,$limit"); 

?>
<script language="javascript">
  function set_option(selval){
       
       document.getElementById('FVal').value='';
	   document.getElementById('FVal').style.display='none';
	   document.getElementById('gender').style.display='none';
	   document.getElementById('gender').selectedIndex=0;
      if (selval.value=='gender') {
	    document.getElementById('gender').style.display='block';
	  }
	 else {
	    document.getElementById('FVal').style.display='block';
	 }
	 
	 
  }
</script><table border="0" cellpadding="0" cellspacing="0" height="535"
 width="100%">
  <!--Tabelle_mitte-->
  <tbody>
    <tr>
      <td
 style="background-image: url('images/curve_02.jpg');"
 height="60"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%"><img src="images/curve_01.jpg" border="0"/></td>
    <td width="99%"><div style="padding-top: 14px;"> <span style="color: #c10000"> <font style="font-size: 16pt"> USER MANAGEMENT</font> </span></div></td>
  </tr>
</table></td>
    </tr>
    
    <tr>
      <td height="461" valign="top"><table border="0" cellpadding="0" cellspacing="0"
 height="459" width="104%">
        <!--Tabelle_mitte-->
        <tbody>
          <tr>
            <td class="schrift_ueberschrift"
 height="22" valign="middle"><img border="0" src="bilder/IMG_butt_find_SETTINGS.gif" /></td>
          </tr>
          <tr>
            <td class="schrift_mitte" height="419"
 valign="top"><div style="padding-left: 5px;">
              <table border="0" width="93%" cellspacing="0" cellpadding="0">
                <tr>
                  <td><hr size="1" color="#C0C0C0" />
				      <? include "message.php"; ?>
                          <table cellspacing="0" cellpadding="0" width="100%" border="0">
                            <tr>
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td bgcolor="#999999"><table cellspacing="0" cellpadding="0" width="100%" border="0">
                                    <form>
                                      <input type="hidden" name="main" value="employee" />
                                      <input type="hidden" name="sub" value="index" />
                                      <tr>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td height="30" bgcolor="#EEEEEE"><strong>&nbsp;SEARCH by: User Join Date / Name Filter</strong></td>
                                      </tr>
                                      <tr>
                                        <td><table cellspacing="1" width="100%" border="0">
                                            <tbody>
                                              <tr>
                                                <td width="28%" bgcolor="#FFFFFF"><strong>Start Date:</strong><br />
                                                    <input name="SDate" id="SDate" value="<? echo ($SDate!=""?date(DATE_FORMAT,strtotime($SDate)):''); ?>" size="12" readonly="readonly" onclick="if(self.gfPop)gfPop.fStartPop(document.getElementById('SDate'),document.getElementById('EDate'));return false;" />
                                                  <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.getElementById('SDate'),document.getElementById('EDate'));return false;" hidefocus="HIDEFOCUS"><img class="PopcalTrigger" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt="" /></a> <a href="#" onclick="javascript:document.getElementById('SDate').value=''">clear</a></td>
                                                <td width="28%" bgcolor="#FFFFFF"><strong>End Date:</strong><br />
                                                    <input name="EDate" id="EDate" value="<? echo ($EDate!=""?date(DATE_FORMAT,strtotime($EDate)):''); ?>" size="12" onclick="if(self.gfPop)gfPop.fEndPop(document.getElementById('SDate'),document.getElementById('EDate'));return false;" readonly="readonly" />
                                                  <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.getElementById('SDate'),document.getElementById('EDate'));return false;" hidefocus="HIDEFOCUS"><img class="PopcalTrigger" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt="" /></a> <a href="#" onclick="javascript:document.getElementById('EDate').value=''">clear</a></td>
                                                <td width="18%" bgcolor="#FFFFFF"><strong>Filter:<br />
												
                                                      <select name="Filter" id="Filter" onchange="javascript:set_option(this);">
                                                        <option value="" >Select Filter</option>
                                                        <option value="fb_user_id" <? if ($Filter=="fb_user_id") echo "selected=\"selected\"" ?>>FaceBook User Id</option>
                                                        <option value="name" <? if ($Filter=="name") echo "selected=\"selected\"" ?>>Full Name</option>
                                                        <option value="first_name" <? if ($Filter=="first_name") echo "selected=\"selected\"" ?>>First Name</option>
                                                        <option value="last_name" <? if ($Filter=="last_name") echo "selected=\"selected\"" ?>>Last Name</option>
                                                        <option value="username" <? if ($Filter=="username") echo "selected=\"selected\"" ?>>FaceBook Username</option>
                                                        <option value="hometown_name" <? if ($Filter=="hometown_name") echo "selected=\"selected\"" ?>>Home Town</option>
                                                        <option value="gender" <? if ($Filter=="gender") echo "selected=\"selected\"" ?>>Gender</option>
                                                      </select>
                                                </strong></td>
                                                <td width="26%" bgcolor="#FFFFFF"><strong>Filter Value:</strong><br />
												  <input type="text" name="FVal" id="FVal" value="<? echo $FVal ?>" <? if ($Filter == "gender") { ?>style="display:none" <? } ?>>
                                                    <select name="gender" id="gender" <? if ($Filter!="gender") { ?>style="display:none" <? } ?>>
                                                      <option value="male" <? if ($status=="male") echo "selected=\"selected\"" ?>>Male</option>
                                                      <option value="female" <? if ($status=="female") echo "selected=\"selected\"" ?>>Female</option>
                                                    </select>                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="GO &gt;&gt;" /></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                      <td width="60%" valign="top"><strong>Note:</strong> <br />
                                                        1. 
                                                        Please leave empty the End date if you want to search for a perticular date<br />
                                                        2. Please leave empty the Start date if you want to search from very start to End Date</td>
                                                      <td width="40%" align="right"><table cellspacing="0" cellpadding="0" width="75%" border="0">
                                                          <tr>
                                                            <td></td>
                                                          </tr>
                                                          <tr>
                                                            <td bgcolor="#FFFFFF"><div align="left"><strong> <font face="Arial, Helvetica, sans-serif">USER STATUS</font></strong></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><table bordercolor="#cccccc" cellspacing="1" width="100%" border="0">
                                                                <tbody>
                                                                  <tr>
                                                                    <td width="66%" height="10" bgcolor="#EEEEEE"><div align="left">Total Users :</div></td>
                                                                    <td width="34%" align="center" bgcolor="#FFFFFF"><strong><? echo @mysql_result(mysql_query("select count(u_id) from tld_user_acc"),0,0); ?></strong></td>
                                                                  </tr>
                                                                </tbody>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td></td>
                                                          </tr>
                                                      </table></td>
                                                    </tr>
                                                </table></td>
                                              </tr>
                                            </tbody>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </form>
                                  </table></td>
                                </tr>
                              </table>
                              <table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td height="30" bgcolor="#FFFFFF"><strong>&nbsp;VIEW USERS </strong></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><table bordercolor="#cccccc" cellspacing="1" width="100%" border="0">
      <tbody>
        <tr>
          <td height="30" bgcolor="#EEEEEE"><div align="center"><strong>#id</strong></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><strong>FB User Id </strong></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><strong>Full Name </strong></div></td>
          <td align="center" bgcolor="#EEEEEE"><div align="center"><strong>Profile Link</strong></div></td>
          <td align="center" bgcolor="#EEEEEE"><div align="center">
            <p><strong>Username</strong></p>
          </div></td>
          <td align="center" bgcolor="#EEEEEE"><div align="center">
            <p><strong>Gender</strong></p>
          </div></td>
          <td align="center" bgcolor="#EEEEEE"><div align="center">
            <p><strong>Home Town</strong></p>
          </div></td>
          <td align="center" bgcolor="#EEEEEE"><div align="center">
            <p><strong>Join Date </strong></p>
          </div></td>
          <td bgcolor="#EEEEEE"><div align="center"><strong>Action</strong></div></td>
        </tr>
        <? 
		  $colcount=0;
		while ($row = mysql_fetch_array($result)) { 
		   $colcount++;
		   
		?>
        <tr  bgcolor="<? echo ($colcount%2==0?"#FFFFCC":"#FFFFFF"); ?>" <? if ($Filter=="new_member" and $colcount <=($FVal-$limit*($page-1))) { ?>bgcolor="#FFEBBB"<? } ?>>
          <td align="center" ><strong>&nbsp;<? echo $row['u_id'] ?></strong></td>
          <td >&nbsp;<? echo $row['fb_user_id'] ?></td>
          <td height="30" >&nbsp;<? echo $row['name'] ?></td>
          <td align="center" ><? echo $row['link']; ?></td>
          <td align="center" ><? echo $row['username']; ?></td>
          <td align="center" ><? echo ucfirst($row['gender']); ?></td>
          <td align="center" ><? echo $row['hometown_name'] ?></td>
          <td align="center" ><? echo date(_DateFormat,strtotime($row['created_date'])) ?></td>
          <td nowrap="nowrap" align="center"><a href="#" onclick="popup('employee/view.php?id=<? echo $row['u_id'] ?>',500,400);">View</a> / <a href="<? echo $link ?>page=<? echo $page ?>&amp;del=1&amp;id=<? echo $row['u_id'] ?>" onclick="javascript:return(confirm('Are you sure, you want to DELETE this User?'))">Delete</a></td>
        </tr>
        <? } ?>
      </tbody>
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