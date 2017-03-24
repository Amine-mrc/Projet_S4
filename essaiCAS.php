<?php
header('Content-Type: text/html; charset=utf-8');

$cas_host='cas.univ-paris13.fr';
$cas_port=443;
$cas_context='/cas/';

error_reporting(E_ALL & ~E_NOTICE);

require_once('CAS.php');

phpCAS::setDebug();
phpCAS::setVerbose(true);
// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context,true);
phpCAS::setNoCasServerValidation();
phpCAS::setLang(PHPCAS_LANG_FRENCH);
phpCAS::forceAuthentication();

if (isset($_REQUEST['logout'])) {
 	phpCAS::logout();
}
 	// for this test, simply print that the authentication was successfull
?>

<html>
<head>
<title>phpCAS simple client</title>

</head>
<body>
<h1>Successfull Authentication!</h1>
<dl style='border: 1px dotted; padding: 5px;'>
      <dt>Current script</dt><dd><?php print basename($_SERVER['SCRIPT_NAME']); ?></dd>
      <dt>session_name():</dt><dd> <?php print session_name(); ?></dd>
      <dt>session_id():</dt><dd> <?php print session_id(); ?></dd>
</dl>
<p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
<p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>

<p><a href="?logout=">Logout</a></p>
</body>
</html>
