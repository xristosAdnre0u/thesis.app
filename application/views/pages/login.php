<!DOCTYPE>
<html>
    <head>
	<style>
	    .login{
		text-align: center;
	    }
	    .welc{
		color: #129FEA;
		padding-bottom: 20px;
	    }
	    .kwd{
		margin-left: -37px;
	    }
	</style>
    </head>
    <body>

	<?php echo validation_errors(); ?>
	<div class="login">
	    <h2 class="welc">Είσοδος</h2>

	    <form action="" method="post">
		Όνομα Χρήστη:<input type="text" name="username" value="" size="" placeholder="UserName" />
		<br>
		<br>
		<span class="kwd">Κωδικός Πρόσβασης:</span><input type="password" name="password" value="" size="" placeholder="Password"/>
		<br>
		<br>
		<input type="submit" name="submit" value="Εισοδος" />
	    </form>

	</div>

    </body>
</html>
