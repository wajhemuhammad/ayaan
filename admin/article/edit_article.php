	<!-- START Demo Code -->

<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync for all rtes before submitting form
	var frm = document.getElementById('frmNewArticle');
		var title = Trim(frm.title.value);
		var send_notification = Trim(frm.send_notification.value);
		
		
		var error_str = '';
		
		if (title.length < 1)
		{
			error_str+="Error : Please Enter Title<br>";
		}
		if (send_notification.length < 1)
		{
			error_str+="Error : Please Enter FB Message<br>";
		}
		
		if (error_str) {
			 document.getElementById("ERR_DISP").style.display = "block";
			 document.getElementById("Error_Label").innerHTML = error_str;
			 window.scroll(0,0);
			 return false;
		}
	updateRTEs();
	
	return true;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
initRTE("./images/", "./", "", true);
//-->
</script>

<?php
function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;
}
?>
<!-- END Demo Code -->


<? if (request("ERROR_STR")=="") {
    $id = request("id");
    $urow = mysql_fetch_array(mysql_query("select * from tld_article where id = '$id'"));
	if ($urow!="") {
		$_REQUEST['title']=$urow['title'];
		$_REQUEST['notification_msg']=$urow['notification_msg'];
		$_REQUEST['article_text']=$urow['article_text'];
		$_REQUEST['send_notification']=$urow['send_notification'];
	} else {
	   $_REQUEST['ERROR_STR'] = "Error : No Page to display, Parameters are incorrect";
	   include "error.php";
	   die();
	} 
	
} ?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
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
    <td width="99%"><div style="padding-top: 14px;"> <span style="color: #c10000"> 
                <font style="font-size: 16pt"> EDIT ARTICLE</font> </span></div></td>
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
                        <div align="center"><form action="article/process.php" method="post" id="frmNewArticle"  enctype="multipart/form-data" onSubmit="return submitForm();">
 <div align="left">
   <input type="hidden" name="action" value="editarticle">
   <input type="hidden" name="id" value="<? echo $id ?>">
    <? include "error.php" ?>
 </div>
                            <table width="100%" align="center" border="0">
                              <tbody>
                                <tr> 
                                  <td width="26%" align="right" nowrap="nowrap">Article Title*:&nbsp;&nbsp;&nbsp;</td>
                                  <td width="74%" align="left" class="small"><div align="left"> 
                                      <input name="title" id="title" size="30"  value="<? echo request("title") ?>" />
                                    </div></td>
                                </tr>
                                <tr>
                                  <td align="right" nowrap="nowrap">FB Notification Message*:&nbsp;&nbsp;&nbsp;</td>
                                  <td align="left" class="small"><input name="notification_msg" id="notification_msg" size="75" maxlength="180" value="<? echo request("notification_msg") ?>" /> 
                                    (180 characters)</td>
                                </tr>
                                <tr>
                                  <td align="right" nowrap="nowrap">Send Notification to All FB users:&nbsp;&nbsp;&nbsp;</td>
                                  <td align="left" class="small"> <input type="checkbox" name="send_notification" id="send_notification" value="1" <? if (request("send_notification") == 1) { ?> checked="checked" <? } ?> /></td>
                                </tr>
                                <tr>
                                  <td align="right" nowrap="nowrap">Article Description*:&nbsp;&nbsp;&nbsp;</td>
                                  <td align="left" class="small"><script language="JavaScript" type="text/javascript">
									<!--
									//build new richTextEditor
									var rte1 = new richTextEditor('rte1');
									<?php
									//format content for preloading
									if (!(isset($_POST["rte1"]))) {
										$content = request("article_text");
										$content = rteSafe($content);
									} else {
										//retrieve posted value
										$content = rteSafe($_POST["rte1"]);
									}
									?>
									rte1.html = '<?=$content;?>';
									//rte1.toggleSrc = false;
									rte1.build();
									//-->
									</script></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"></td>
                                </tr>
                               
                              
                                <tr> 
                                  <td colspan="3"><div align="center"><FONT size=4>&nbsp; 
                                    </div></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><div align="center"> 
                                      <input type="submit" value="Edit Article" name="Submit" />
                                    </div></td>
                                </tr>
                              </tbody>
                            </table>
                        </form>
</div></td>
                </tr>
              </table>
            </div></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
   
  </tbody>
</table>
