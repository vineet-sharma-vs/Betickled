<?php
   include 'server.php';
?>

<?php

$buttonURL = $_POST['buttonURL'];
$imageFor = $_POST['imageFor'];
$id = $_POST['id'];

if(isset($buttonURL) && isset($id)){
    $sql = "UPDATE carouselImages SET buttonURL='$buttonURL' WHERE ID = '$id' AND imageFor='$imageFor'";
    if(mysqli_query($con,$sql)){
    	echo "<span class='text-success'>buttonURL update successfully</span>";
    }else{
    	echo "<span class='text-danger'>Something Went wrong</span>";
    }
}

?>