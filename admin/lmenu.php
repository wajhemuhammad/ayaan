<? 
   $per = request("AD_CAT_LEVEL","S");
   ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!--Tabelle_links-->
  <tbody>
    <tr> 
      <td height="32" valign="top" width="199"><img
 src="bilder/images_r2_c1.gif" alt="" border="0" width="199" height="32" /></td>
    </tr>

    <tr> 
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('EMPLOYESS_ADMIN');"> 
        ADMIN SETTINGS</a></td>
    </tr>
    <tr> 
      <td> <table cellpadding="0" cellspacing="0" id="EMPLOYESS_ADMIN" style="<? echo ($main=="account"?"display:block;":"display:none;") ?>">
          <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> 
              <a href="?main=account&sub=index"><font size="1" color="<? echo ($main=="account" && $sub=="index"?"#CC6600":"#716F6F"); ?>">VIEW/UPDATE 
              ACC</font></a></td>
          </tr>
          <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> 
              <a href="?main=account&sub=change_pass"><font size="1" color="<? echo ($main=="account" && $sub=="change_pass"?"#CC6600":"#716F6F"); ?>">CHANGE 
              PASS</font></a></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('WEBSITE_SETTINGS');">WEBSITE 
        SETTINGS</a></td>
    </tr>
    <tr> 
      <td> <table cellpadding="0" cellspacing="0" id="WEBSITE_SETTINGS" style="<? echo ($main=="settings"?"display:block;":"display:none;") ?>">
          <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10"> 
              <a href="?main=settings&sub=gen_settings"><font size="1" color="<? echo ($main=="settings" && $sub=="gen_settings"?"#CC6600":"#716F6F"); ?>">GENERAL 
              SETTINGS</font></a></td>
          </tr>
          <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10"> 
              <a href="?main=settings&sub=new_country"><font size="1" color="<? echo ($main=="settings" && $sub=="new_country"?"#CC6600":"#716F6F"); ?>">ADD 
              COUNTRY</font></a></td>
          </tr>
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=settings&amp;sub=cview"><font size="1" color="<? echo ($main=="settings" && $sub=="cview"?"#CC6600":"#716F6F"); ?>">COUNTRY 
              MANAGEMENT</font></a></td>
          </tr>
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=settings&amp;sub=templink"><font size="1" color="<? echo ($main=="settings" && $sub=="templink"?"#CC6600":"#716F6F"); ?>">EDIT PAGES</font></a></td>
          </tr>
          <!--<tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=settings&amp;sub=topmsg"><font size="1" color="<? echo ($main=="settings" && $sub=="topmsg"?"#CC6600":"#716F6F"); ?>">MANAGE TOP MSG.</font></a></td>
          </tr>
          <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10"> 
              <a href="?main=settings&amp;sub=whatsnew"><font size="1" color="<? echo ($main=="settings" && $sub=="whatsnew"?"#CC6600":"#716F6F"); ?>">MANAGE WHAT'S NEW</font></a></td>
          </tr>-->
        </table></td>
    </tr>
    <!--<tr>
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('CATEGORY_ADMIN');">CATEGORY ADMIN</a></td>
    </tr>
    <tr>
      <td><table cellpadding="0" cellspacing="0" id="CATEGORY_ADMIN" style="<? echo ($main=="category"?"display:block;":"display:none;") ?>">
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=category&amp;sub=add_cat"><font size="1" color="<? echo ($main=="category" && $sub=="add_cat"?"#CC6600":"#716F6F"); ?>">ADD CATEGORY</font></a></td>
          </tr>
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=category&amp;sub=index"><font size="1" color="<? echo ($main=="category" && $sub=="index"?"#CC6600":"#716F6F"); ?>">MANAGE CAT.</font></a></td>
          </tr>
          
      </table></td>
    </tr> -->
   <tr> 
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('ARTICLES_ADMIN');">ARTICLES ADMIN</a></td>
    </tr>
    <tr> 
      <td valign="top"><table cellpadding="0" cellspacing="0" id="ARTICLES_ADMIN" style="<? echo ($main=="article"?"display:block;":"display:none;") ?>">
           <tr> 
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> 
              <a href="?main=article&amp;sub=aview"><font size="1" color="<? echo ($main=="article" && $sub=="aview"?"#CC6600":"#716F6F"); ?>"> MANAGE ARTICLES</font></a></td>
          </tr>
           <tr>
             <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=article&amp;sub=new_article"><font size="1" color="<? echo ($main=="article" && $sub=="new_article"?"#CC6600":"#716F6F"); ?>">ADD A NEW ARTICLE</font></a></td>
           </tr>
        </table></td>
    </tr>
    <tr>
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('MEMBERS_ADMIN');">USER 
        ADMIN</a></td>
    </tr>
    <tr>
      <td><table cellpadding="0" cellspacing="0" id="MEMBERS_ADMIN" style="<? echo ($main=="employee"?"display:block;":"display:none;") ?>">
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=employee&amp;sub=index"><font size="1" color="<? echo ($main=="employee" && $sub=="index"?"#CC6600":"#716F6F"); ?>">USER MANAGEMENT</font></a></td>
          </tr>
      </table></td>
    </tr>
    <!--<tr>
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('ORDERS_ADMIN');">ORDERS ADMIN</a></td>
    </tr>
    <tr>
      <td valign="top"><table cellpadding="0" cellspacing="0" id="ORDERS_ADMIN" style="<? echo ($main=="order"?"display:block;":"display:none;") ?>">
        <tr>
          <td width="400" height="6"
 class="schrift_links" style="background-image: url('bilder/images_r23_c1.jpg');">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=order&amp;sub=index"><font size="1" color="<? echo ($main=="order" && $sub=="index"?"#CC6600":"#716F6F"); ?>">VIEW ORDERS</font></a></td>
        </tr>
      </table></td>
    </tr>-->
    <!--<tr>
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('CUSTOM_QUOTE_ADMIN');">CUSTOM QUOTE  ADMIN</a></td>
    </tr>
    <tr>
      <td valign="top"><table cellpadding="0" cellspacing="0" id="CUSTOM_QUOTE_ADMIN" style="<? echo ($main=="custom_quotation"?"display:block;":"display:none;") ?>">
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=custom_quotation&amp;sub=index"><font size="1" color="<? echo ($main=="custom_quotation" && $sub=="index"?"#CC6600":"#716F6F"); ?>">CUSTOM QUOTE MANAG.</font></a></td>
          </tr>

      </table></td>
    </tr>-->
   <!-- <tr>
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="javascript:show_hide('BLOGS_ADMIN');">BLOGS ADMIN</a></td>
    </tr>
    <tr>
      <td valign="top"><table cellpadding="0" cellspacing="0" id="BLOGS_ADMIN" style="<? echo ($main=="blog"?"display:block;":"display:none;") ?>">
          <tr>
            <td style="background-image: url('bilder/images_r23_c1.jpg');"
 class="schrift_links" height="6" width="400">&nbsp;&nbsp; <img border="0" src="bilder/FLECHE.jpg" width="7" height="10" /> <a href="?main=blog&amp;sub=index"><font size="1" color="<? echo ($main=="blog" && $sub=="index"?"#CC6600":"#716F6F"); ?>">BLOGS MANAG.</font></a></td>
          </tr>
      </table></td>
    </tr>-->
    <tr> 
      <td style="background-image: url(bilder/images_r3_c1.jpg);"
 class="schrift_links" height="24" valign="middle"><a href="?main=logout&sub=logout">Logout</a></td>
    </tr>
    <tr> 
      <td height="13" valign="top"><img
 src="bilder/images_r26_c1.jpg" alt="" border="0" /></td>
    </tr>
  </tbody>
</table>
