<div id="page_content">
<script type="text/javascript"> 
  function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
</script> 


<audio preload="auto">
    <source src="/sounds/click.mp3"></source>
    <source src="/sounds/click.wav"></source>
    Your browser isn't invited for SUPER DUPER fun audio time.
</audio>

<!-- keyboard widget css & script (required) -->
<link href="keyboard/css/keyboard.css" rel="stylesheet">
<script src="keyboard/js/jquery.keyboard.js"></script>

<script type="text/javascript">
   function formfocus() {
      document.getElementById('barcode').focus();
   }
   window.onload = formfocus;
</script>

<!-- initialize keyboard (required) -->
<script>
	$(function(){
		$('#password').keyboard();
	});
	
	$.extend($.keyboard.keyaction, {
	  enter : function(kb) {
	    // accept the content and close the keyboard
	    kb.accept();
	    // submit the form
	    kb.$el.closest('form').submit();
	  }
	});

	

</script>



<?php 
//keypad include
if ($allow_manual_userid_entry) { 
	include_once('includes/keypad.php');
}
?>

	<div id="banner_title">
		<h2>
			<?php// echo $module_name;?>
		</h2>
	</div>
	<div class="corners" id="banner">
		<span id="swap">
			<img src="images/<?php echo $card_image;?>_card1.png" align="left" class="active" />
			<?php if ($card_image!='magnetic'){ ?>
				<img src="images/<?php echo $card_image;?>_card2.png" align="left"/>
			<?php }?>
		</span>
		<h2><?php echo $intro_screen_text;?></h2>
	</div>
	
	<div id="response"></div><!-- response container for showing failed login/blocked patron messages -->
			
	<!--  ============= form for submitting patron id ============= -->
	<div style="position: absolute;left:-10000px;height:1px;overflow:hidden">
		<form id="form">
		Barcode:	<input name="barcode" type="text" id="barcode" value="" onkeypress="return tabE(this,event)" />
		Password:	<input name="password" type="password" id="password" onKeyPress="return submitenter(this,event)" value="" placeholder="Input PASSWORD and press ENTER to continue"/>
	    <input type="submit" name="button" id="button" value="Submit" />
		
		</form>
	</div>
	<!--  ============= end form for submitting items ============= -->

</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#form').submit(function(){
		tb_remove();
		$barcode=$('#barcode');
		$password=$('#password');
		$response=$("#response");
		$response.html('<h2 style="color:#f15e3d"> Checking your account please wait. <img src="images/checking_account.gif" /></h2>');
		$.post("processes/account_check.php", { barcode: $barcode.val(), password: $password.val()},
			function(data){
				setTimeout(function(){
					if (data=='out of order'){ //does the response indicate a failed sip2 connection
						window.location.href='index.php?page=out_of_order';
					} else if (data=='blocked account'){ //does the response indicate a blocked account
						$.dbj_sound.play('<?php echo $error_sound;?>');
						$response.html('<h2 style="text-align: center;" id="error_message"> <span style="text-decoration:blink"><br>There\'s a problem with your account</span>. <br>Please see a circulation clerk.</h2>');
						setTimeout(function() { $('#error_message').hide(); },10000);
						
						setTimeout(function () {
						       window.location.href='index.php';
						    }, 4000);
						
					} else if (data=='invalid account'){ //does the response indicate an invalid account
						$.dbj_sound.play('<?php echo $error_sound;?>');
						$response.html('<h2 style="text-align: center;" id="error_message"> <span style="text-decoration:blink"><br>There was a problem</span>. <br>Please scan your card again.</h2>');
						setTimeout(function() { $('#error_message').hide(); },10000);
						
						setTimeout(function () {
						       window.location.href='index.php';
						    }, 4000);
						
					} else { //if everything is ok with the patron's account show the welcome screen
						$("#page_content").html(data);
					}
				}, 1000);
		},'json'); //responses from process/account_check.php are expectd to be in json
		$barcode.val('');
		$password.val('');
		$barcode.focus();
		return false;   
	});
});
</script>





<!-- Fancy Box//-->
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script type="text/javascript" src="js/fancybox/jquery.fancybox-media.js?v=1.0.5"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".various_medium").fancybox({
			maxWidth	: 1280,
			maxHeight	: 720,
			width		: '70%',
			height		: '95%',
			fitToView	: false,
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'elastic',
			closeEffect	: 'elastic',
			
		});
	});
	</script>
	