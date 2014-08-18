<?php
/*
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>

    <h3>Public profile of Naitik</h3>
    <img src="https://graph.facebook.com/naitik/picture">
    <?php echo $naitik['name']; ?>
  </body>
</html>
<? 
*/
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'src/facebook.php';
include "admin/lib/front.inc.php";	
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '144538905714459',
  'secret' => '34f4537a455d23c345581f370e210548',
));

$app_id = '144538905714459';
$app_secret = '34f4537a455d23c345581f370e210548';

$appname = 'helloayaan';

// Get User ID
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


/*
echo $response = $facebook->api( '/806284297/notifications', 'POST', array(
    'template' => 'You have received a new message.',
    'href' => 'http://www.facebook.com/ayaan.wajhe',
    'access_token' => '144538905714459|34f4537a455d23c345581f370e210548'
) );
*/

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
   $chkUserQuery = mysql_num_rows(mysql_query("select u_id from tld_user_acc where fb_user_id = '".$user_profile['id']."'"));
   if (!$chkUserQuery) 
   mysql_query(
   				"insert into tld_user_acc 
				(fb_user_id, name, first_name, last_name, link, username, hometown_id, hometown_name, gender, timezone, locale, verified, login_last_updated, created_date)
				values
				(".$user_profile['id'].",'".$user_profile['name']."','".$user_profile['first_name']."','".$user_profile['last_name']."','".$user_profile['link']."', 
				 '".$user_profile['username']."','".$user_profile['hometown']['id']."','".$user_profile['hometown']['name']."','".$user_profile['gender']."',
				 '".$user_profile['timezone']."','".$user_profile['locale']."','".$user_profile['verified']."',
				 '".date(DB_DATE_FORMAT,strtotime($user_profile['updated_time']))."',now())");
} else {
  $loginUrl = $facebook->getLoginUrl();
}
  
 $main = $_REQUEST["main"];
 $sub = $_REQUEST["sub"];
	 
 
 if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: 
	
	   
	?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif; 
    
 

 ?>
 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html style="" class=" js no-flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js no-flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Naya Pakistan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <script src="files/flexie.js" async="" type="text/javascript"></script><script src="files/CFInstall.js" async="" type="text/javascript"></script><script src="files/ga.js" async="" type="text/javascript"></script><script src="files/analytics.js" async=""></script><script src="files/cloudflare.js" async=""></script><script type="text/javascript">
//<![CDATA[
window.__CF=window.__CF||{};window.__CF.AJS={"ga_key":{"ua":"UA-8433169-1","ga_bs":"2"},"cdnjs":{"__h":"1","cdnjs":"MO,GF,FX,CS,JS"}};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) { var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",mirage:{responsive:0,lazy:0},oracle:"33/7be4eeb3bc23867190fda1387afdaf",paths:{cloudflare:"/cdn-cgi/nexp/abv=2692629090/"},atok:"b37d611ed1d23cb582f730148d38b962",zone:"insaf.pk",rocket:"0",apps:{"ga_key":{"ua":"UA-8433169-1","ga_bs":"2"},"cdnjs":{"__h":"1","cdnjs":"MO,GF,FX,CS,JS"}}}];var a=document.createElement("script"),b=document.getElementsByTagName("script")[0];a.async=!0;a.src="//ajax.cloudflare.com/cdn-cgi/nexp/abv=2562784428/cloudflare.min.js";b.parentNode.insertBefore(a,b);}}catch(e){};
//]]>
</script>
<script type="text/javascript" src="files/appsh.js"></script><script src="files/modernizr.js" type="text/javascript"></script><script src="files/jquery_002.js" type="text/javascript"></script><script src="files/jquery-migrate.js" type="text/javascript"></script><script src="files/jquery_004.js" type="text/javascript"></script><script src="files/json2.js" type="text/javascript"></script><script type="text/javascript">__CF.AJS.inith();</script><link class="css-finalize-read" type="text/css" rel="stylesheet" href="files/normalize.css"><style class="css-finalized">hr{-moz-box-sizing:content-box;}input[type="checkbox"],input[type="radio"]{-moz-box-sizing:border-box;}input[type="search"]{-moz-box-sizing:content-box;}</style>
        <link class="css-finalize-read" type="text/css" rel="stylesheet" href="files/main.css"><style class="css-finalized">::-moz-selection{background:#b3d4fc;text-shadow:none;}a{transition:color 0.5s ease-in-out;}header#mainHeader nav ul.topSml li a{transition:color 0.2s ease-in-out;}header#mainHeader nav ul.topSml li.l:hover .popup .form .btn{transition:background-color 0.2s ease-in-out;}header#mainHeader nav ul.main li a{transition:color 0.2s ease-in-out;}header#mainHeader nav ul.main li.ml .popup ul li a{transition:background 0.2s ease-in-out;}#nayafund .form a.pay{transition:all 0.5s ease-in-out;}#nayafund .form .btn{transition:background-color 0.2s ease-in-out;}#trp .registerBtn{transition:background-color 0.2s ease-in-out;}#trp .cat{transition:background-color 0.2s ease-in-out;}#trp .form .btn{transition:background-color 0.2s ease-in-out;}#register .form .btn{transition:background-color 0.2s ease-in-out;}#register .accountInfo .submitButton input{transition:background-color 0.2s ease-in-out;}#arm .form .btn{transition:background-color 0.2s ease-in-out;}#contact .form .colOne .btn{transition:background-color 0.2s ease-in-out;}#comments .btns a{transition:background-color 0.2s ease-in-out;}#comments .form .colOne .btn{transition:background-color 0.2s ease-in-out;}</style>
        <link class="css-finalize-read" type="text/css" rel="stylesheet" href="files/orbit-1.css">
        <link class="css-finalize-read" type="text/css" rel="stylesheet" href="files/shadowbox.css">


        <script type="text/javascript" src="files/modernizr-2.js"></script>
        <script type="text/javascript" src="files/jquery-1.js"></script>
        <link href="files/css.css" rel="stylesheet" type="text/css">
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date(); a = s.createElement(o),
  m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-39704210-1', 'insaf.pk');
            ga('send', 'pageview');

</script>

        

<script type="text/javascript">
/* <![CDATA[ */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-8433169-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

(function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
/* ]]> */
</script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
   <form method="post" action="" id="frmMain">
<div class="aspNetHidden">
<input name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJNDMyNDU0NjAzZGRis1pXW4mi+TgzV36iqA0mh186JZrbbyHig9vvkqJl0Q==" type="hidden">
</div>

<div class="aspNetHidden">

	<input name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWBAKi06/ABwKclsvbAQLcxd7aDgLo+NCeBUuk3CY0nietOdAYvvuPU3sZi/mSdkgeb1MdvyHFu2P4" type="hidden">
</div>

   <header id="mainHeader">
        <div class="wrapper">
            <a href="http://elections.insaf.pk/" class="logo"></a>
            <nav>
                <ul class="topSml">
                    <li><a href="https://elections.insaf.pk/NayaPakistanFund/">Donate</a></li>
                    <li><a id="hlRegister" href="http://elections.insaf.pk/Register.aspx">Register</a></li>
                    <li class="l">
                    
                        <a href="#">Login</a>
                        <span class="arrow"></span>
                        <div class="popup">
                            <div class="form">
                                <input name="ctl00$HeadLoginView$ucLogin$txtLogin" id="HeadLoginView_ucLogin_txtLogin" class="txtfld" placeholder="User Name" type="text">
<input name="ctl00$HeadLoginView$ucLogin$txtPassw" id="HeadLoginView_ucLogin_txtPassw" class="txtfld" placeholder="Password" type="password">
<a href="http://elections.insaf.pk/ForgotPassword.aspx">Forgot Password</a>
<input name="ctl00$HeadLoginView$ucLogin$btnLogin" value="Login" id="HeadLoginView_ucLogin_btnLogin" class="btn" type="submit">

                            </div>
                        </div>
                                            
                    </li>
                </ul>
                <span class="clearfix"></span>
                <ul class="main">
                    <li class="ml jt">
                        <a href="#">Jump To</a>
                        <span class="arrow"></span>
                        <div class="popup">
                            <ul class="subNav">
                                <li><a href="<?=WEBPATH ?>index.php?main=article&amp;sub=index">Article</a></li>
                                <li><a href="http://elections.insaf.pk/Flipbook/" target="_blank">Naya Pakistan Plan</a></li>
                                <li><a href="https://elections.insaf.pk/NayaPakistanFund/">Naya Pakistan Fund</a></li>
                                <li><a href="http://tabdeeli.insaf.pk/" target="_blank">Tabdeeli Razakar Program</a></li>
                                <li><a href="http://elections.insaf.pk/AwamiRabitaMuhim.aspx">Awami Rabita Muhim</a></li>
                                <li><a href="http://elections.insaf.pk/Endorsements.aspx">Endorsements</a></li>
                                <li><a href="http://www.fundyourtsunami.com/" target="_blank">Fund your Tsunami</a></li>
                                <li><a href="http://elections.insaf.pk/Comments.aspx">Comments</a></li>
                                
                            </ul>
                        </div>
                     </li>
                     <li class="ml">
                        <a href="#">Media Library</a>
                        <span class="arrow"></span>
                        <div class="popup">
                            <ul class="subNav">
                                <li><a href="http://elections.insaf.pk/AudioGallery.aspx">Audio Gallery</a></li>
                                <li><a href="http://elections.insaf.pk/ImageGallery.aspx">Image Gallery</a></li>
                                <li><a href="http://elections.insaf.pk/VideoGallery.aspx">Video Gallery</a></li>
                            </ul>
                        </div>
                     </li>
                     <li><a href="http://www.insaf.pk/" target="_blank">insaf.pk</a></li>
                     <li><a href="http://elections.insaf.pk/Contact.aspx">Contact Us</a></li>
                </ul>
            </nav>
        </div>
   </header>

   <section class="newsticker">
    	<div class="shw">
            <div class="wrapper">
                <div style="position: relative; height: 1.5em;" class="fade innerfade">
                  <p style="z-index: 4; position: absolute; display: none;">Be there 23rd March at Meenar-e-Pakistan</p>
                  <p style="z-index: 3; position: absolute; display: none;">Have you enrolled as a Voter</p>
                  <p style="z-index: 2; position: absolute; display: block;">CONTRIBUTE to elect youth</p>
                  <p style="z-index: 1; position: absolute; display: none;">Help create NAYA PAKISTAN</p>
                </div>
            </div>
        </div>
    </section>     
    
    <span class="clearfix"></span>
     
    
    
    <div class="wrapper">
        <section id="slider">
        	<div style="width: 980px; height: 400px;" class="orbit-wrapper"><div style="width: 980px; height: 400px;" class="orbit" id="featured"> 
            	<img style="z-index: 3; display: block; opacity: 1;" src="files/slider-img-1.jpg" alt="">
                <img style="display: block; opacity: 1; z-index: 1;" src="files/slider-img-2.jpg" alt="">
                <img style="display: block; opacity: 1; z-index: 1;" src="files/slider-img-3.jpg" alt="">
            </div><div class="timer"><span class="mask move"><span style="transform: rotate(250deg);" class="rotator move"></span></span><span class="pause"></span></div><ul class="orbit-bullets"><li class="active">1</li><li class="">2</li><li class="">3</li></ul></div>
        </section>

        
           <? include "main.php"; ?>
  
       
    </div>

    

    <footer id="mainFooter">
       	<div class="wrapper">
            <div class="copyrights">
                    <a href="http://www.insaf.pk/" class="pti"></a>
                     ©2013 Naya Pakistan, all rights reserved.<br>
            </div>
            
            <div class="social">
                <a class="icon twitter" target="_blank" href="https://twitter.com/PTIofficial"></a>
                <a class="icon google" target="_blank" href="https://plus.google.com/u/0/115043561486052221463/posts"></a>
                <a class="icon fb" target="_blank" href="https://www.facebook.com/PTIOfficial"></a>                
            </div>
            <a href="http://www.insaf.pk/" target="_blank" class="logoInsaf"></a>
        </div>
	</footer>
	
        <script type="text/javascript" src="files/plugins.js"></script>
        <script type="text/javascript" src="files/main.js"></script>
        <script type="text/javascript" src="files/jquery.js"></script>
        <script type="text/javascript" src="files/jquery_003.js"></script>
                
        <script type="text/javascript">
            $(document).ready(
				function () {

				    $('.fade').innerfade({
				        speed: 1000,
				        timeout: 6000,
				        type: 'random_start',
				        containerheight: '1.5em'
				    });

				});
  		</script>

        
        <script type="text/javascript">
            $(window).load(function () {
                $('#featured').orbit({
                    animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
                    animationSpeed: 800,                // how fast animtions are
                    timer: true, 			 // true or false to have the timer
                    advanceSpeed: 4000, 		 // if timer is enabled, time between transitions 
                    pauseOnHover: false, 		 // if you hover pauses the slider
                    startClockOnMouseOut: false, 	 // if clock should start on MouseOut
                    startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
                    directionalNav: false, 		 // manual advancing directional navs
                    captions: false, 			 // do you want captions?
                    captionAnimation: 'none', 		 // fade, slideOpen, none
                    captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
                    bullets: true, 		 // true or false to activate the bullet navigation
                    bulletThumbs: false, 	 // thumbnails for the bullets
                    bulletThumbLocation: '', 	 // location from this file where thumbs will be
                    afterSlideChange: function () { } 	 // empty function 
                });
            });

            $('.growImage').mouseover(function () {
                //moving the div left a bit is completely optional
                //but should have the effect of growing the image from the middle.
                $(this).stop().animate({ "width": "105%", "z-index": "100" }, 400, 'swing');
            }).mouseout(function () {
                $(this).stop().animate({ "width": "100%", "z-index": "10" }, 200, 'swing');
            });


        </script>


    </form>
<script type="text/javascript" src="files/apps1.js"></script><script type="text/javascript">__CF.AJS.init1();</script>

<object style="position: absolute; left: -9999px;" data="files/ImageHandler.txt" width="0"></object></body></html>