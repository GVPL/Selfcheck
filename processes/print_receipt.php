<?php
session_start();
include_once('../includes/html2text.php'); 
include_once('../includes/phpmailer/class.phpmailer.php');
include_once('../config.php');
//make the mail text
// The "source" HTML you want to convert.
$html =$_POST['receipt'];

$h2t =& new html2text($html);

// Simply call the get_text() method for the class to convert
// the HTML to the plain text. Store it into the variable.
$receipt_text = $h2t->get_text();

$print_receipt = implode("\n",$receipt_header).str_replace('Title:',"\n\nTitle:",$receipt_text)."\n\n".implode("\n\n $receipt_msg \n\n",$receipt_footer)."\n\n\n\n\n\n\n".chr(27).chr(105);
if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
	//ec
    $printer_name = "ec1";
}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //ec
    $printer_name = "ec2";
}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //ec
    $printer_name = "cs1";
}

if ($_SERVER['REMOTE_ADDR'] == 'xx.xx.x.xx'){
	//central selfcheck 1
    $printer_name = "ce1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.xx.x.xx'){
        //central selfcheck 1
    $printer_name = "ce2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.xx.x.xx'){
        //central selfcheck 3
    $printer_name = "ce3";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //OakBay selfcheck 2
    $printer_name = "ob2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //OakBay selfcheck 1
    $printer_name = "ob1";

}


if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //Es  selfcheck 2
    $printer_name = "es2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //LA  selfcheck 1
    $printer_name = "la1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xxx'){
        //LA  selfcheck 2
    $printer_name = "la2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //NM selfcheck 1
    $printer_name = "nm1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //NM  selfcheck 2
    $printer_name = "nm2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.xx.x.xx'){
        //GO selfcheck 1
    $printer_name = "go1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.xx.x.xx'){
        //GO selfcheck 2
    $printer_name = "go2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //sc selfcheck 1
    $printer_name = "sc1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //sc selfcheck 2
    $printer_name = "sc2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //sc selfcheck 3
    $printer_name = "sc3";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //bh selfcheck 1
    $printer_name = "bh1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //bh selfcheck 2
    $printer_name = "bh2";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //jf selfcheck 1
    $printer_name = "jf1";

}

if ($_SERVER['REMOTE_ADDR'] == 'xx.x.x.xx'){
        //jf selfcheck 1
    $printer_name = "jf2";

}

exec("echo \"".$print_receipt."\" | lp -d $printer_name");
?>
<script type="text/javascript">
	window.location.href="processes/logout.php";
</script>
