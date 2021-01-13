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
			<div class="col-md-9 col-md-offset-1" style="margin-top: 100px">
				<table class="table table-striped">
					<tr>
						<td>S/N</td>
						<td>Title</td>
						<td>Description</td>
						<td>Image</td>
						<td>Posted on</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					
					<?php $callObj->readPost(); ?>

				</table>

			</div>
		
		</div>
	</div>








	<!-- <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> -->

<?php include 'includes/footer.php' ?>