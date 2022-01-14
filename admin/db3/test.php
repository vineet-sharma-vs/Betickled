<!DOCTYPE html>
<html>
<head>
	<title>upload image</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>	


	<div class="container mt-5 " id="myArea">
        <h1 class="display-4 my-5">My Demo website to uplaod image</h1>

		<form action="uploadImage.php" method="post"   enctype="multipart/form-data" id="myform">
			<div class="custom-file">
				<input type="file"   name="fileToUpload" class="custom-file-input">
				<label for="imageFile" class="custom-file-label" id="imageFileLabel_1">Select Image</label>
			</div>

			<button type="submit" class="btn mt-2 btn-primary">Submit</button>
		</form>
	</div>


</body>
</html>