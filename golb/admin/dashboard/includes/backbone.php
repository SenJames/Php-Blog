<?php  

	/**
	 * 
	 */
	class Backbone 	{
		public $title, $description, $image, $date, $query, $conString, $row, $postID, $target_file;

		public $admin_url = "http://localhost/golb/admin/dashboard/";
		public $root_url = "http://localhost/golb/";

		function dbConnect(){
			$this->conString = mysqli_connect('localhost', 'root', '', 'db_bootstrap');

			if(!$this->conString){
				echo 'Database connection failed';
			}
		}


		function uploadPost(){
			if (isset($_POST['submit'])){
				$this->title = $_POST['title'];
				$this->description = $_POST['description'];
				$this->date = $_POST['date'];
				$this->filename = $_FILES['image']['name'];
				$this->image = $_FILES["image"]["tmp_name"];
				$this->targetdir = "uploads/";
				$this->target_file = $this->targetdir . basename($_FILES["image"]["name"]);

				if (!$this->title == "" && !$this->description == "" &&  !$this->date == "" && !$this->filename == "") {
						if (move_uploaded_file($_FILES["image"]["tmp_name"], $this->target_file)) {
								$this->query = "INSERT INTO `post` (`title`, `description`, `image`, `date`) VALUES('$this->title', '$this->description', '$this->filename', '$this->date') ";

							if (mysqli_query($this->conString, $this->query)) {
								echo "<script> alert('Upload Succesful')</script>";
							}else{
								echo "<script> alert('Upload failed. Please Try Again')</scrpt>";
							}
						}
					}else{
						echo "<script> alert('All fields are required!')</scrpt>";
					}
				}
			}

		function readPost(){
			
			if ($this->query = mysqli_query($this->conString, "SELECT * FROM `post`")) {
				while ($this->row = mysqli_fetch_array($this->query)) {
					echo '
						<tr>
							<td>'.$this->row["post_id"]. '</td>
							<td>'.$this->row["title"].'</td>
							<td>' .$this->row["description"]. '</td>
							<td> <img src="../../img/'.$this->row["image"]. '" style="width: 30px; height:30px;"> </td>
							<td>'.$this->row["date"]. '</td>
							<td> <a href="'.$this->admin_url.'editpost.php?postID='.$this->row["post_id"]. '" class="btn btn-info btn-xs">Edit</a> </td>
							<td> <a href="" class="btn btn-danger btn-xs">Delete</a> </td>
						</tr>';
				}
			}
		}


		function updatePost(){
			if (isset($_GET["postID"])) {
				$this->post_id = $_GET["postID"];

				$this->query = mysqli_query($this->conString, "SELECT * FROM post WHERE `post_id` = $this->post_id");

				if ($this->row = mysqli_fetch_array($this->query)) {
					echo '
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" name="title" placeholder="Post Title" class="form-control" value="'.$this->row["title"].'">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									<textarea type="text" name="description" placeholder="Post Description" class="form-control">'.$this->row["description"].'</textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6">
									<input type="file" name="image" class="form-control" value="'.$this->row["image"].'">
								</div>

								<div class="col-md-6">
									<input type="date" name="date" class="form-control" value="'.$this->row["date"].'">
								</div>

							</div>

							<div class="form-group">
								<div class="col-md-12">
								<input type="submit" name="submit" value="Update Now" class="btn btn-success btn-block">
								</div>
							</div>';
				}
			}
				if (isset($_POST['submit'])) {
							$this->title = $_POST['title'];
							$this->description = $_POST['description'];
							$this->image = "file.image";
							$this->date = $_POST['date'];
			
							$sql = "UPDATE post SET `title` ='$this->title', `description` ='$this->description', `image`='$this->image', `date`='$this->date' WHERE `post_id` ='$this->post_id'";
			
							if (mysqli_query($this->conString, $sql)) {
								echo '<script>alert("Uploaded successfully")</script>';
							}else{
								echo' <script>alert("Update Failed")</script>';
							}
				}
		}


		function viewPost(){
			if ($this->query = mysqli_query($this->conString, "SELECT * FROM `post`")) {
				while ($this->row = mysqli_fetch_array($this->query)) {
					echo '
				<div class="col-md-4">
					<div class="postbox">
						<img src="'.$this->admin_url.'uploads/'.$this->row["image"].'">
						<h4>'.substr($this->row["title"], 0, 15).'</h4>
						<p> 
							'.substr($this->row["description"], 0, 30).'
						</p>

						<a class="btn btn-primary btn-block" href="viewpost.php?postID='.$this->row["post_id"].'">Read More</a>
					</div>
				</div>

						';
				}
			}
		}
		
	}

?>