<?php
   include 'server.php';
?>

<?php

$label = $_POST['label'];
$imageFor = $_POST['imageFor'];
$id = $_POST['id'];

if(isset($label) && isset($id)){
    $sql = "UPDATE carouselImages SET imageLabel='$label' WHERE ID = '$id' AND imageFor='$imageFor'";
    if(mysqli_query($con,$sql)){
    	echo "<span class='text-success'>Label update successfully</span>";
    }else{
    	echo "<span class='text-danger'>Something Went wrong</span>";
    }
}

?>