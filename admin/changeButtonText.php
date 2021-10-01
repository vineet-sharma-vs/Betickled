<?php
   include 'server.php';
?>

<?php

$buttonText = $_POST['buttonText'];
$imageFor = $_POST['imageFor'];
$id = $_POST['id'];

if(isset($buttonText) && isset($id)){
    $sql = "UPDATE carouselImages SET buttonText='$buttonText' WHERE ID = '$id' AND imageFor='$imageFor'";
    if(mysqli_query($con,$sql)){
    	echo "<span class='text-success'>buttonText update successfully</span>";
    }else{
    	echo "<span class='text-danger'>Something Went wrong</span>";
    }
}

?>