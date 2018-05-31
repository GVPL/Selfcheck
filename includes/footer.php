<div id="done_popup">
	<h1>Select a receipt option</h1>
	<!--  ============= finish/cancel buttons ============= -->
		
				<?php if (!empty($_SESSION['email']) && $allow_email_receipts){?>
					<br>
					<div class="ok_button button" id="email" title="selfcheck_button">
						<h1>Email Receipt</h1>
					</div>
					<div class="thanks_button button" id="email_thanks">
						<h1>Thanks</h1>
					</div>
				
				<?php }?>
		
                <?php if (!empty($printer_location)){?>
					<br>
					<div class="ok_button button" id="print" title="selfcheck_button">
						<h1>Print Receipt</h1>
					</div>
					<div class="thanks_button button" id="print_thanks">
						<h1>Thanks</h1>
					</div>
					
				
				<?php }?>
				
				    <br>
					<div class="ok_button button" id="no_print" title="selfcheck_button">
						<h1>No Receipt</h1>
					</div>
					<div class="thanks_button button corners" id="no_print_thanks">
						<h1>Thanks</h1>
					</div>
				
</div>	

<!--session timeout prompt -->
<div id="idle_timer">
	<h1>You've been inactive for <?php echo $inactivity_timeout/1000;?> seconds.</h1>
	<h1>Click OK to continue.</h1>
	<h1>Otherwise your session will end in <span style="color:#b60606">20</span> seconds.</h1>
	<div class="ok_button button" title="selfcheck_button" onclick="tb_remove();">
		<h1>OK</h1>
	</div>
</div>
<!--end session timeout prompt -->

</body>
</html>