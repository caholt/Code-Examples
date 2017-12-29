<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php
if(isset($_REQUEST['submit']) && $_REQUEST['send_check'] == '')
{
	$NameSurname = filter_var($_REQUEST['namesurname'], FILTER_SANITIZE_STRING);
	$Email = filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING);
	if($NameSurname == '' || $Email == '')
	{
		?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <div>Please Make sure you have added data</div>
		</div>
		<?php 
	}else{
		$sMessage ="$NameSurname,$Email";
		if(file_put_contents("CSV.csv",$sMessage."\n",FILE_APPEND))
		{
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <div>The data has been added to the CSV</div>
			</div>
			<?php 
		}
	}
}
?>
<section>
	<div class="container">
		<div class="col-md-6 offset-md-3">
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name Surname</label>
			    <input type="text" name="namesurname" class="form-control" id="namesurname" aria-describedby="Name Surname" placeholder="Name, Surname">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Send to CSV</button>
			  <input type="hidden" name="send_check" value="">
			</form>
		</div>
	</div>
</section>
