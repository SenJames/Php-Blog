<?php  

	require 'includes/backbone.php';

	$callObj = new Backbone;

	$callObj->dbConnect();

?>



<!DOCTYPE html>
<html>
<head>
	<title> GOLB | Where Tech meets Poetry</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/golb.css">
</head>
<?php include 'includes/header.php' ?>

	<div class="row">
		<div class="container">
			<div class="col-md-6 col-md-offset-3" style="margin-top: 100px">
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<div class="panel-title">
							New Post
						</div>
					</div>

					<div class="panel-body">
						<form class="form form-horizontal" method="post">

							<?php $callObj->updatePost(); 
							?>

						</form>
					</div>
				</div>
			</div>
		
		</div>
	</div>








	<!-- <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> -->

<?php include 'includes/footer.php' ?>