<style type="text/css">
<!--
.style4 {font-size: 12px}
.style5 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="findmydeal"><span class="textred11_bold"> Article Details</span></td>
    <td align="right" valign="middle" class="findmydeal"><a class="dealofmonth" href="javascript:history.back(-1);">Back</a>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="100" colspan="2" align="left" valign="top">
        <table width="95%" border="0" align="center">
          <tr>
            <td align="left" valign="top" >
			<?    
			    
			   $subjectquery = "select * from tld_article where  id='".request('id')."'";
								  $subjectrs = mysql_query($subjectquery);
								  if (mysql_num_rows($subjectrs)>0) {
								  while ($subject_row = mysql_fetch_array($subjectrs)) {
								?>
								 <div  style="background-color:#EFEFEF; padding:10px;"  >
                                  <div style="MARGIN-BOTTOM: 5px">
                                    <div style="FONT-SIZE: 20px; MARGIN-BOTTOM: 3px; COLOR: #007dc3"><span class="dealofmonth"><? echo $subject_row['title'] ?></span></a></div>
                                  </div>
                                  <div><? echo date(" M d ",strtotime($subject_row['created_on'])) ?>						  </div><br>
                                  <div style="FONT-SIZE: 12px; MARGIN-BOTTOM: 5px; LINE-HEIGHT: 18px"> <? echo nl2br(trim($subject_row['article_text'])) ?><br>
                                  </div>
                                  </div>
								  <div style="height:4px;"></div>
 								<? } 
								 } else { ?>
								 <br>
								 <span class="error">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error : Invalid Article Information!</span>
								<? } ?>			</td>
          </tr>
          <tr>
            <td align="left" valign="top" >&nbsp;</td>
          </tr>
        </table>
      <p class="text_11normblack">&nbsp; </p>
      <p>&nbsp;</p></td>
  </tr>
</table>