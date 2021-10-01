<?php
  include "server.php";
?>

<?php
 
  //first delete record having 'id'...

    $id = $_POST['id'];
    $imageFor = $_POST['imageFor'];

    $sql = "DELETE  FROM carouselImages WHERE ID = '$id' AND imageFor = '$imageFor'";
    if(mysqli_query($con,$sql)){
       //re-assigned id from 1 to ....
       $i = 1;
       $sql = "SELECT ID FROM carouselImages WHERE imageFor = '$imageFor'";
       $result = mysqli_query($con,$sql); 

       if(mysqli_num_rows($result) > 0){
       	  while($row = mysqli_fetch_assoc($result)){
       	  	  $ID = $row['ID'];
              $sql = "UPDATE carouselImages SET ID = '$i' WHERE ID = '$ID' AND imageFor = '$imageFor'";
              mysqli_query($con,$sql);
            $i++;
       	  }
       }
    }
?>