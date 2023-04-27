
<?php
include('includes/config.php');
if(isset($_POST['submit'])){

	
	
	// Select file type
	/* $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
	
	// valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){ */
 
	// Upload files and store in database
	$image=$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploaded/".$_FILES["image"]["name"]);
        $qrwy=mysqli_query($con,"INSERT into image(name) values('$image')");
        if($qrwy)
            {
                echo "Profile Picture Changed Successfully...";
            }
            else
            {
                echo "Something went wrong...";
			}
	
		
		
	
	
	
} 
else
	{
		echo 'Error in uploading file - ';
	}
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>Select Image to Upload</h1>
	<form method='post' enctype='multipart/form-data'>
	<div class="form-group">
	 <input type="file" name="image" id="file">
	</div> 
	<div class="form-group"> 
	 <input type='submit' name='submit' value='Uploaded' class="btn btn-primary">
	</div> 
	</form>
</div>	
</body>
</html>