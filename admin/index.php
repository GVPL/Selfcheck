<?
$start_date = $_POST['start'];
$end_date = $_POST['end'];
$searchtype = $_POST['searchtype'];

$con=mysqli_connect("xxxxx","xxxxx","xxxxxxxx","xxxxxxxx");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($searchtype == 'mult'){
	$result = mysqli_query($con,"SELECT SUM( count ) AS CheckOut, SUM( sessions ) AS Sessions, location AS Location
FROM self_check_stats
WHERE  `timestamp` >  '$start_date'
AND  `timestamp` <  '$end_date'
GROUP BY location
ORDER BY  `Location` ASC");
} else {
	$result = mysqli_query($con,"SELECT SUM( count ) AS CheckOut, SUM( sessions ) AS Sessions, location AS Location
FROM self_check_stats
WHERE  `timestamp` LIKE  '$start_date %'
GROUP BY location
ORDER BY  `Location` ASC");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Selfcheck Quick Stats</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script>
    $(function() {
      $( "#start" ).datepicker({ dateFormat: "yy-mm-dd" });
	  $( "#end" ).datepicker({ dateFormat: "yy-mm-dd" });
    });
    </script>

</head>

<body>
	<form method="post" action="index.php">
	<img src="logo.png">
	<h2>Selfcheck Stats</h2>
	Date Range <input name="searchtype" type="radio" value="mult"> or Single Date <input name="searchtype" type="radio" value="single"><br> <br>
	Start Date: <input name="start" type="text" id="start" value="<?=$start_date;?>"> End Date: <input name="end" type="text" id="end" value="<?=$end_date;?>">
	<input type="submit" value="Submit" />
	</form>
	<div id="cal1Container"></div>
	
<table id="mytable" cellspacing="0">

  <tr>
    <th scope="col" abbr="" class="nobg">Branch</th>
    <th scope="col" abbr="">CheckOut</th>
    <th scope="col" abbr="">Sessions</th>
	<th scope="col" abbr="">Device IP</th>
  </tr>
  <?
  while($row = mysqli_fetch_array($result)) {
	 // print "TEST<br>".$row['Location']."<br>";
	  //Branch Map
	  $sc_ip = substr($row['Location'], 0, 5);  // 10.2 ip
	  
	  if($sc_ip == ''){
		  $branch = 'ob';
		  $sum_checkout_ob += $row['CheckOut'];
		  $sum_sessions_ob += $row['Sessions']; 
	  } elseif($sc_ip == ''){
		  $branch = 'bh';
		  $sum_checkout_bh += $row['CheckOut'];
		  $sum_sessions_bh += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'nm';
		  $sum_checkout_nm += $row['CheckOut'];
		  $sum_sessions_nm += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'jf';
		  $sum_checkout_jf += $row['CheckOut'];
		  $sum_sessions_jf += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'es';
		  $sum_checkout_es += $row['CheckOut'];
		  $sum_sessions_es += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = '??';
	  }
	  elseif($sc_ip == ''){
		  $branch = 'ec';
		  $sum_checkout_ec += $row['CheckOut'];
		  $sum_sessions_ec += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'cs';
		  $sum_checkout_cs += $row['CheckOut'];
		  $sum_sessions_cs += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'sc';
		  $sum_checkout_sc += $row['CheckOut'];
		  $sum_sessions_sc += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'go';
		  $sum_checkout_go += $row['CheckOut'];
		  $sum_sessions_go += $row['Sessions']; 
	  }
	  elseif($sc_ip == ''){
		  $branch = 'ce';
		  $sum_checkout_ce += $row['CheckOut'];
		  $sum_sessions_ce += $row['Sessions']; 
	  } else {
	  	$branch = "n/a";
	    $sum_checkout_na += $row['CheckOut'];
	    $sum_sessions_na += $row['Sessions']; 
	  }
	  $sc_ip = '';
	  //End Branch Map
	  
	echo "
    <tr>
      <th scope=\"col\" class=\"nobg\">".$branch."</th>
      <th scope=\"col\">".$row['CheckOut']."</th>
      <th scope=\"col\">" . $row['Sessions']. "</th>
  	<th scope=\"col\">" . $row['Location']."</th>
    </tr>
	";
		  
  }

  mysqli_close($con);
  ?>
 
 
</table>
Totals <br>
<h3>
  CE => Checkouts <?=$sum_checkout_ce;?> --- Sessions <?=$sum_sessions_ce;?> <br>
  BH => Checkouts <?=$sum_checkout_bh;?> --- Sessions <?=$sum_sessions_bh;?> <br>
  CS => Checkouts <?=$sum_checkout_cs;?> --- Sessions <?=$sum_sessions_cs;?> <br>
  EC => Checkouts <?=$sum_checkout_ec;?> --- Sessions <?=$sum_sessions_ec;?> <br>
  ES => Checkouts <?=$sum_checkout_es;?> --- Sessions <?=$sum_sessions_es;?> <br>
  GO => Checkouts <?=$sum_checkout_go;?> --- Sessions <?=$sum_sessions_go;?> <br>
  JF => Checkouts <?=$sum_checkout_jf;?> --- Sessions <?=$sum_sessions_jf;?> <br>
  NM => Checkouts <?=$sum_checkout_nm;?> --- Sessions <?=$sum_sessions_nm;?> <br>
  OB => Checkouts <?=$sum_checkout_ob;?> --- Sessions <?=$sum_sessions_ob;?> <br>
  SC => Checkouts <?=$sum_checkout_sc;?> --- Sessions <?=$sum_sessions_sc;?> <br>
</h3>

</body>
</html>

