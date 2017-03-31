<?php
header('Content-Type: text/html; charset=utf-8');

$cas_host='cas.univ-paris13.fr';
$cas_port=443;
$cas_context='/cas/';

error_reporting(E_ALL & ~E_NOTICE);

require_once('CAS.php');

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

