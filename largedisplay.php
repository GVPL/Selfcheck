<?
$type = $_GET['type'];
$branch = $_GET['branch'];
$printer = $_GET['printer'];
$screen = $_GET['screen'];
?>
<frameset cols="80%,20%">
<frame frameborder="0" name="main" src="/?type=<?=$type;?>&branch=<?=$branch;?>&printer=<?=$printer;?>&screen=24">
<frame frameborder="0" name="promo" src="/signage/">
</frameset> 
       
