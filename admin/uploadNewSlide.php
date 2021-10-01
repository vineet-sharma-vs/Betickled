<?php
include 'server.php'
?>

<?php

$id = $_POST['id'];
$imageLabel = $_POST['imageLabel'];
$imageFor = $_POST['imageFor'];
$imageURL = $_POST['imageURL'];

$i = $id+1;
$sql = "SELECT ID FROM carouselImages WHERE imageFor = '$imageFor' AND ID >= '$id' ORDER BY ID DESC";
$result = mysqli_query($con,$sql); 

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$ID = $row['ID'];

		$sql = "UPDATE carouselImages SET ID = '$ID'+1 WHERE ID = '$ID' AND imageFor = '$imageFor'";
		if(mysqli_query($con,$sql)){

		}else{
			echo mysqli_error($con);
		}
	}
}else{
	echo mysqli_error($con);
}

$sql = "INSERT INTO carouselImages (ID,imageURL,imageFor,imageLabel) VALUES('$id','$imageURL','$imageFor','$imageLabel')";
if(mysqli_query($con,$sql))
	echo "<span class='text-success'>Uploaded successfully</span>";
else
	echo "<span class='text-danger'>Something went wrong <br>".mysqli_error($con)."</span>";
?>