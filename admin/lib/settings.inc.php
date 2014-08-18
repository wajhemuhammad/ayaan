<?
 $result = mysql_query("SELECT * FROM tld_setting");
 while ($row = mysql_fetch_array($result)) {
 define($row['name'],nl2br($row['value']));
 }
 $hostName = $_SERVER['HTTP_HOST'];
 define('WEBPATH','http://'.$hostName."/ayaan/");
 define("CURRENCY",_DefaultCurrency);
 define("DATE_FORMAT",_DateFormat);
 unset($row);
 unset($result);

 $UserStatus['A'] = "ACTIVE";
 $UserStatus['B'] = "BLOCKED";
 $JobStatus['A'] = "Assigned";
 $JobStatus['N'] = "Not Assigned";

 $LeaveStatus[''] = "PENDING";
 $LeaveStatus['A'] = "APPROVED";
 $LeaveStatus['R'] = "REJECTED";
 
 $ListingStatus['A'] = "Active";
 $ListingStatus['B'] = "Blocked";
 
 $ChallStatus['a'] = "Accepted";
 $ChallStatus['p'] = "Pending";
 $ChallStatus['r'] = "Rejected";

 
 $CatType['I'] = "Item Page";
 $CatType['T'] = "Text Page"; 
 
 $PreferenceArr['challenger']="Challenger";
 $PreferenceArr['wager']="Wager";

 
 $dbArray = array("tld_country"=>"Country Dropdown");
 $visibilityStatus = array("P"=>"PUBLIC","V"=>"PRIVATE","O"=>"ON THE UNDER");
 
?>