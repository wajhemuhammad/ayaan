<?
  session_start();
  $path = (isset($path))?$path:"";
  require_once ($path."admin/lib/functions.inc.php");
  require_once ($path."admin/lib/constants.inc.php");
  require_once ($path."admin/lib/errors.inc.php");
  require_once ($path."admin/lib/connection.inc.php");
  require_once ($path."admin/lib/settings.inc.php");
  require_once ($path."admin/lib/cpage.class.php");
?>