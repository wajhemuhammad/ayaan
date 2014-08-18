
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="findmydeal"><span class="textred11_bold"> Articles</span></td>
  </tr>
  <tr>
    <td height="100" align="left" valign="top">
        <table width="95%" border="0" align="center">
          <tr>
            <td align="left" valign="top" >
			<?    
			    $page = (request("page"))?request("page"):1;
				$limit = _ItemsPerPageAcc; 
				$start = ($page-1) * $limit;
 				$t_rec = @mysql_result(mysql_query("select count(id) from tld_article"),0,0);
				$t_pages = @ceil($t_rec/$limit);
				$link="?main=article&sub=index&";
			   $subjectquery = "select * from tld_article order by created_date desc limit $start,$limit";
								  $subjectrs = mysql_query($subjectquery);
								  if (mysql_num_rows($subjectrs)>0) {
								  while ($subject_row = mysql_fetch_array($subjectrs)) {
								?>
			<div  style="background-color:#EFEFEF; padding:10px;"  >
              <div style="MARGIN-BOTTOM: 5px">
                <div style="FONT-SIZE: 20px; MARGIN-BOTTOM: 3px; COLOR: #007dc3"><span class="dealofmonth"><? echo $subject_row['title'] ?></span></a></div>
              </div>
			  <div > &nbsp;<? echo date(" M d ",strtotime($subject_row['created_date'])) ?>
              </div>
			  <br />
              <div style="FONT-SIZE: 12px; MARGIN-BOTTOM: 5px; LINE-HEIGHT: 18px"> <? 
			  			        if (strlen($subject_row['article_text'])>250) {
								   echo nl2br(trim(substr($subject_row['article_text'],0,250)))."... ".'<a class="more" href="index.php?main=article&sub=detail&id='.$subject_row['id'].'">read more</a>';
								} else {
								  echo nl2br(trim($subject_row['article_text']));
								}
								 ?><br />
              </div>
			  </div>
			<div style="height:4px;"></div>
 								<? } ?>
								     <? include("paging.php"); ?>
							          <div style="FONT-SIZE: 16px; MARGIN-BOTTOM: 10px; PADDING-BOTTOM: 6px; COLOR: #0c487b; BORDER-BOTTOM: #9f9f9f 1px solid"></div>
									  
								<? } ?>	  
			</td>
          </tr>
          
        </table>
      <p class="text_11normblack">&nbsp; </p>
      <p>&nbsp;</p></td>
  </tr>
</table>