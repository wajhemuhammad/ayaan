<? 
if (request("del")==1) {
   $id = request('id');
   $del_message = mysql_query("DELETE FROM tld_article where id = '$id'");
   
}

$SDate = request("SDate");
$EDate = request("EDate");
$Filter = request("Filter");
$FVal = request("FVal");

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
if ($Filter!="") {
   if ($Filter !="id") 
   $DSQL.= " AND $Filter like '%$FVal%'"; 
   else $DSQL.= " AND $Filter = '$FVal'"; 
}



$page = (request("page"))?request("page"):1;
$limit =_ItemsPerPageAdmin; 
$start = ($page-1) * $limit;
$t_rec = @mysql_result(mysql_query("select count(id) from tld_article WHERE 1 $DSQL "),0,0);

$link = "index.php?main=article&sub=aview&SDate=$SDate&EDate=$EDate&Filter=$Filter&FVal=$FVal&";

$result = mysql_query("select * from tld_article WHERE 1 $DSQL $DQ2 limit $start,$limit"); 

?>
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
    <td width="99%"><div style="padding-top: 14px;"> <span style="color: #c10000"> <font style="font-size: 16pt"> ARTICLE MANAGEMENT</font> </span></div></td>
  </tr>
</table>
</td>
    </tr>
    
    <tr>
      <td height="461" valign="top"><table border="0" cellpadding="0" cellspacing="0"
 height="441" width="104%">
        <!--Tabelle_mitte-->
        <tbody>
          <tr>
            <td class="schrift_ueberschrift"
 height="22" valign="middle"><img border="0" src="bilder/IMG_butt_find_SETTINGS.gif" width="178" height="63" /></td>
          </tr>
          <tr>
            <td class="schrift_mitte" height="419"
 valign="top"><div style="padding-left: 30px;">
              <table border="0" width="91%" cellspacing="0" cellpadding="0">
                <tr>
                  <td><hr size="1" color="#C0C0C0" />
				     <? include "message.php"; ?>
                          <table class="class" cellspacing="0" cellpadding="0" width="100%" border="0">
                            <tr>
                              <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
                                  <tr valign="top">
                                    <td width="100%"><table cellspacing="0" cellpadding="0" width="100%" border="0">
                                        <tr>
                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td bgcolor="#999999"><table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                  <form>
                                                    <input type="hidden" name="main" value="article" />
                                                    <input type="hidden" name="sub" value="aview" />
                                                    <tr>
                                                      <td></td>
                                                    </tr>
                                                    <tr>
                                                      <td height="30" bgcolor="#EEEEEE"><strong>&nbsp;SEARCH by: Article Listing  Date / Other Fields Filter</strong></td>
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
                                                                    <select name="Filter" id="Filter" >
                                                                      <option value="" >Select Filter</option>
                                                                      <option value="id" <? echo ($Filter=="id"?'selected="selected"':"") ?>>Article ID</option>
                                                                      <option value="title" <? echo ($Filter=="title"?'selected="selected"':"") ?>>Title</option>
                                                                      <option value="article_text" <? echo ($Filter=="article_text"?'selected="selected"':"") ?>>Text</option>
                                                                      <option value="notification_msg" <? echo ($Filter=="notification_msg"?'selected="selected"':"") ?>>FB Notification Message</option>
                                                                                                                                        </select>
                                                              </strong></td>
                                                              <td width="26%" bgcolor="#FFFFFF"><strong>Filter Value:</strong><br />
                                                                  <input type="text" name="FVal" id="FVal" value="<? echo $FVal ?>"></td>
                                                            </tr>
                                                            <tr>
                                                              <td colspan="4" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="GO &gt;&gt;" /></td>
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
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#999999"><table bordercolor="#cccccc" cellspacing="1" width="100%" border="0">
          <tbody>
            <tr>
              <td width="11%" height="30" bgcolor="#EEEEEE"><div align="center"><strong>#</strong></div></td>
              <td width="35%" bgcolor="#EEEEEE"><div align="center"><strong>Title  </strong></div></td>
              <td width="35%" bgcolor="#EEEEEE"><div align="center"><strong>FB Notification Msg</strong></div></td>
              <td width="22%" bgcolor="#EEEEEE"><div align="center"><strong>Send Notification</strong></div></td>
              <td width="22%" bgcolor="#EEEEEE"><div align="center"><strong>Notification Status</strong></div></td>
              <td width="22%" bgcolor="#EEEEEE"><div align="center"><strong>Action</strong></div></td>
            </tr>
            <? while ($row = mysql_fetch_array($result)) { 
			   $colcount++;
			?>
            <tr bgcolor="<? echo ($colcount%2==0?"#FFFFCC":"#FFFFFF"); ?>" >
              <td align="center" ><? echo $row['id']; ?></td>
              <td height="30" >&nbsp;<? echo $row['title'] ?></td>
              <td >&nbsp;<? echo $row['notification_msg'] ?></td>
              <td nowrap="nowrap" ><? echo ($row['send_notification']=='1'?'YES':'NO'); ?></td>
              <td nowrap="nowrap" >Delived: <strong><? echo number_format($row['success']) ?></strong><br />
                Failed: <strong><? echo number_format($row['failed']) ?></strong></td>
              <td align="center" nowrap="nowrap" ><a href="index.php?main=article&amp;sub=edit_article&amp;id=<? echo $row['id']; ?>">Edit</a><strong>/</strong><a href="index.php?main=article&amp;sub=aview&amp;id=<? echo $row['id']; ?>&amp;del=1&amp;page=<? echo $page ?>" onclick="javascript:return(confirm('Are you source, you want to DELETE this article?'))">Delete</a></td>
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
                                          <? include "paging.php" ?></td>
                                        </tr>
                                      </table>                                        </td>
                                  </tr>
                              </table></td>
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
