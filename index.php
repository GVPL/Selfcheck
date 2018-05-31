<?php
session_start();
//Set Cookie for Selfcheck type
if (!empty($_GET['branch']) || !empty($_GET['type']) || !empty($_GET['printer'])) {
  // set the cookie with the submitted user data
	setcookie('branch',$_GET['branch'],time() + (10 * 365 * 24 * 60 * 60));
	setcookie('type', $_GET['type'],time() + (10 * 365 * 24 * 60 * 60));
    setcookie('printer', $_GET['printer'],time() + (10 * 365 * 24 * 60 * 60));
    setcookie('screen', $_GET['screen'],time() + (10 * 365 * 24 * 60 * 60));
  // redirect the user to final landing page so cookie info is available
} else {
	$sc_location = $_COOKIE['branch'];
	$selfcheck_type = $_COOKIE['type'];
    $printer_location = $_COOKIE['printer'];
	$screen_size = $_COOKIE['screen'];
}
 //////
 
 
include_once('config.php');
include_once('includes/sip2.php');

$formaction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $formaction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

/*
print "Branch<br>";
print $sc_location;
print "<br>Type<br>";
print $selfcheck_type;
*/

$page='home';
//set page for inclusion below
if (!empty($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php')){
	$page=$_GET['page'];	
	$include='pages/'.$page.'.php';
//if there's no page listed go to the home page
} else {
	header('location:index.php?page='.$page);
}

//header
include_once('includes/header.php');

//include page
include_once($include);

//footer
include_once('includes/footer.php');

?>