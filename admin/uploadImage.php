<?php 
  function updateDatabase($imageID,$imageFor,$imageURL){
    include 'server.php';

    //append file location to database
 
    $sql = "UPDATE carouselImages SET imageURL='$imageURL' WHERE ID = '$imageID' AND imageFor = '$imageFor'";
    if (mysqli_query($con, $sql)) {
      echo "<br><span class='text-success'>Carousel Image updated</span><br>";
    } else {
      echo "<br><span class='text-danger'>Something Went Wrong !!</span><br>";
    }

    mysqli_close($con);
  }

?>

<?php
//upload image to server
$imageID = $_POST['imageID'];
$imageFor = $_POST['imageFor'];
$imageURL = 'assets/img/'.$_POST['imageURL'];
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    
    $uploadOk = 1;
  } else {
    echo "<br><span class='text-danger'>File is not an image.</span><br>";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "<br><span class='text-danger'>Sorry, file already exists.</span><br>";
  $uploadOk = 0;
  updateDatabase($imageID,$imageFor,$imageURL);
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "<br><span class='text-danger'>Sorry, your file is too large.</span><br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  echo "<br><span class='text-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</span><br>";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<br><span class='text-danger'>Sorry, your file was not uploaded.</span><br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "<br><span class='text-success'>The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.</span><br>";

    updateDatabase($imageID,$imageFor,$imageURL);
  } else {
    echo "<br><span class='text-danger'>Sorry, there was an error uploading your file.</span><br>";
  }
}

?>