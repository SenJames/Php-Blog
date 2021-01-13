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
					<?php $callObj->uploadPost(); ?>
					<div class="panel-heading">
						<div class="panel-title">
							New Post
						</div>
					</div>

					<div class="panel-body">
						<form class="form form-horizontal" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<div class="col-md-12">
									<input type="text" name="title" placeholder="Post Title" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									<textarea type="text" name="description" placeholder="Post Description" class="form-control"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6">
									<input type="file" name="image" id="image" class="form-control">
								</div>

								<div class="col-md-6">
									<input type="date" name="date" class="form-control">
								</div>

							</div>

							<div class="form-group">
								<div class="col-md-12">
									<input type="submit" name="submit" value="Update Now" class="btn btn-success btn-block">
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		
		</div>
	</div>








	<!-- <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> -->

<?php include 'includes/footer.php' ?>