<html lang="en">
    <head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php foreach ($css_files as $file): ?>
    	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<style>
	    .title{
		color: #0055cc;
		text-align: center;
	    }
	</style>

	<script>
	    $(document).ready(function () {
		$("#save-and-go-back-button").hide();
	    });
	</script>

    </head>
    <body>
	<div class="title">
	    <?php echo $title; ?>
	</div>

	<!-- End of header-->
	<div style='height:20px;'></div>
	<div>
	    <?php echo $output; ?>
	</div>

	<?php foreach ($js_files as $file): ?>
    	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
    </body>

</html>
