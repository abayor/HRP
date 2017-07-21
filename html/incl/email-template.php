<?php //inputi, ki so obvezni jim daj class "required" ?>
<form action="index.php#order-now" method="post" enctype="multipart/form-data" role="form" class="ajax-form">

	<div class="row">
		<div class="col-md-6"><input type="text" class="required" name="name" id="name" placeholder="FIRST NAME"></div>
		<div class="col-md-6"><input type="text" class="required" name="surname" id="surname" placeholder="LAST NAME"></div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-md-6"><input type="text" class="required" name="email" id="email" placeholder="EMAIL"></div>
		<div class="col-md-6"><input type="text" name="website" id="website" placeholder="HOSPITAL"></div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-md-12"><textarea name="note" id="note" placeholder="NOTES"></textarea></div>
	</div><!-- /.row -->
	
	<div class="row submit-row">
		<div class="col-md-12 text-right"><span class="provide"> <?php echo $submit_label; ?></span><button class="pull-right btn submit" type="submit">SUBMIT</button></div>
	</div><!-- /.row -->
</form>