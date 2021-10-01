<?php //php header
include 'server.php';
?>
<?php

    //fetch all images url
$imageLg = array(array());
$imageSm = array(array());

$sql = "SELECT * from carouselImages";
$result = mysqli_query($con,$sql);

if((mysqli_num_rows($result))>0){
  while ($row = mysqli_fetch_assoc($result)) {
    if($row['imageFor'] === 'lg')
      array_push($imageLg,$row);
  else if($row['imageFor'] === 'sm')
      array_push($imageSm,$row);

}
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>

<body>
    <div class="container">
        <h2 class="text-primary text-center">Change Image For Large Screen</h2>
        <div class="row mb-5">
         <div class="col border border-primary p-3">
            <div class="form-group">
             <label for="label">Add label to image : </label>
             <input type="text" class="form-control" placeholder="Enter label" id="label">
         </div>
         <div class="form-group">
             <label for="slideNumber">Enter Slide Number : </label>
             <input type="number" class="form-control" placeholder="Enter Slide slideNumber" id="slideNumber">
         </div>
         <div class="form-group">
             <label for="imageFor">Choose for Screen Size : </label>
             <select name="imageFor" id="imageFor" class="custom-select">
                 <option value="lg">LG</option>
                 <option value="sm">SM</option>
             </select>
         </div>
         <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <button type="button" class="btn btn-primary mt-2" id="uploadImageBtn">Add to slide</button>

    </div> 
</div>
<div class="row">
    <?php  for($i=1;$i<count($imageLg);$i++){ ?>
        <div class="col-md-4">
            <div class="thumbnail border border-primary p-2 m-2">
                <div>
                    <label>Slider: <?php echo $imageLg[$i]['ID']; ?></label>
                    <button type="button"  class="removeImageBtn close" id="<?php echo '+removeImageBtnID'.($imageLg[$i]['ID']); ?>">&times;</button>
                </div>
                <img src="<?php echo " ../".$imageLg[$i]['imageURL']; ?>" alt="Lights" style="width:100%" id="<?php echo '+imgID'.($imageLg[$i]['ID']); ?>">
                <div class="caption">
                    <div class="form-group mt-2">
                        <label for="">Change button text : </label>
                        <input type="text" name="buttonText" class="form-control" id="<?php echo '+buttonTextID'.($imageLg[$i]['ID']); ?>" value="<?php echo $imageLg[$i]['buttonText']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Change button url : </label>
                        <input type="text" name="buttonURL" class="form-control" id="<?php echo '+buttonURLID'.($imageLg[$i]['ID']); ?>" value="<?php echo $imageLg[$i]['buttonURL']; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">change text on slide : </label>
                        <input type="text" name="imageLabel" class="form-control" id="<?php echo '+imageLabelID'.($imageLg[$i]['ID']); ?>" value="<?php echo $imageLg[$i]['imageLabel']; ?>"> 
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input changeImage" id="<?php echo "+".$imageLg[$i]['ID']; ?>" name="fileToUpload"> 
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div>
                        <label id="<?php echo '+responseID'.($imageLg[$i]['ID']); ?>"></label>
                    </div>
                </div>
            </div>
        </div>
    <?php  }?>
</div>
<h2 class="text-primary text-center">Change Image For Small Screen</h2>
<div class="row">
    <?php  for($i=1;$i<count($imageSm);$i++){ ?>
        <div class="col-md-4">
            <div class="thumbnail border border-primary p-2 m-2">
                <div>
                    <label>Slider: <?php echo $imageSm[$i]['ID']; ?></label>
                    <button type="button"  class="removeImageBtn close" id="<?php echo '-removeImageBtnID'.($imageSm[$i]['ID']); ?>">&times;</button>
                </div>
                <img src="<?php echo " ../".$imageSm[$i]['imageURL']; ?>" alt="Lights" style="width:100%" id="<?php echo '-imgID'.($imageSm[$i]['ID']); ?>">
                <div class="caption">
                    <div class="form-group mt-2">
                        <input type="text" name="imageLabel" class="form-control" id="<?php echo '-imageLabelID'.($imageSm[$i]['ID']); ?>" value="<?php echo $imageSm[$i]['imageLabel']; ?>">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input changeImage" id="<?php echo "-".$imageSm[$i]['ID']; ?>" name="fileToUpload">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    <div>
                        <label id="<?php echo '-responseID'.($imageSm[$i]['ID']); ?>"></label>
                    </div>
                </div>
            </div>
        </div>
    <?php  }?>
</div>
</div>
</body>

</html>
<script>
        //upload image on image select
        $(".changeImage").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            var id = $(this).attr('id');
            var imageFor; 
            var sign;

            if(id[0] == "+"){
                id = id.substring(1);
                imageFor = "lg";
                sign = "+";
            }else{
                id = id.substring(1);
                imageFor = "sm";
                sign = "-";
            }

            var label;

            var file = this.files[0];
            var form = new FormData();

            form.append('image', file);
            form.append('imageID',$(this).attr('id'));
            form.append('imageURL',fileName);
            form.append('imageFor',imageFor);

            $.ajax({
                url : "uploadImage.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(response){

                    var img = document.getElementById(sign+'imgID'+id);
                    img.src = '../assets/img/'+fileName;
                    
                    var label = document.getElementById(sign+'responseID'+id);
                    label.innerHTML = response;
                }
            });

        });

        
        //change label on images on blur

        $('input[name = "imageLabel"]').blur(function(){
            var id = $(this).attr('id');
            var imageFor; 
            var sign;

            if(id[0] == "+"){
                id = id.substring(1);
                imageFor = "lg";
                sign = "+";
            }else{
                id = id.substring(1);
                imageFor = "sm";
                sign = "-";
            }
            
            id = id.match(/\d+/)[0];
            var labelValue = $(this).val();

            var form = new FormData();
            form.append('label',labelValue);
            form.append('id',id);
            form.append('imageFor',imageFor);

            $.ajax({
             url : "uploadLabel.php",
             type : "POST",
             cache : false,
             contentType: false,
             processData: false,
             data : form,
             success : function(response){
              var label = document.getElementById(sign+'responseID'+id);
              console.log(sign+'responseID'+id);
              label.innerHTML = response;
          }
      });
        });

        //change btn url
        $('input[name = "buttonURL"]').blur(function(){
            var id = $(this).attr('id');
            var imageFor; 
            var sign;

            if(id[0] == "+"){
                id = id.substring(1);
                imageFor = "lg";
                sign = "+";
            }else{
                id = id.substring(1);
                imageFor = "sm";
                sign = "-";
            }
            
            id = id.match(/\d+/)[0];
            var buttonURLValue = $(this).val();

            var form = new FormData();
            form.append('buttonURL',buttonURLValue);
            form.append('id',id);
            form.append('imageFor',imageFor);
            
            console.log(buttonURLValue+" "+id+" "+imageFor);
            $.ajax({
             url : "changeButtonURL.php",
             type : "POST",
             cache : false,
             contentType: false,
             processData: false,
             data : form,
             success : function(response){
              var label = document.getElementById(sign+'responseID'+id);
              console.log(sign+'responseID'+id);
              label.innerHTML = response;
          }
      });
        });



        //change btn text
        $('input[name = "buttonText"]').blur(function(){
            var id = $(this).attr('id');
            var imageFor; 
            var sign;

            if(id[0] == "+"){
                id = id.substring(1);
                imageFor = "lg";
                sign = "+";
            }else{
                id = id.substring(1);
                imageFor = "sm";
                sign = "-";
            }
            
            id = id.match(/\d+/)[0];
            var buttonTextValue = $(this).val();

            var form = new FormData();
            form.append('buttonText',buttonTextValue);
            form.append('id',id);
            form.append('imageFor',imageFor);
            
            console.log(buttonTextValue+" "+id+" "+imageFor);
            $.ajax({
             url : "changeButtonText.php",
             type : "POST",
             cache : false,
             contentType: false,
             processData: false,
             data : form,
             success : function(response){
              var label = document.getElementById(sign+'responseID'+id);
              console.log(sign+'responseID'+id);
              label.innerHTML = response;
          }
      });
        })
        

        //remove iamge from slider
        $('.removeImageBtn').click(function(){
         var id = $(this).attr('id');
         var imageFor; 
         var sign;

         if(id[0] == "+"){
            id = id.substring(1);
            imageFor = "lg";
            sign = "+";
        }else{
            id = id.substring(1);
            imageFor = "sm";
            sign = "-";
        }

        id = id.match(/\d+/)[0];

        var form = new FormData();
        form.append('id',id);
        form.append('imageFor',imageFor);

        $.ajax({
            url : "removeImageFromSlider.php",
            type : "POST",
            cache : false,
            contentType : false,
            processData : false,
            data : form,
            success : function(response){
                alert(response);
            }
        });
    });


    $('#uploadImageBtn').click(function(){
        var slideNumber = $('#slideNumber').val();
        var imageLabel = $('#label').val();
        var imageFor = $('#imageFor').val();
        var imageURL = $('#customFile').val().split("\\").pop();

        $('#customFile').siblings(".custom-file-label").addClass("selected").html(imageURL);

        var form = new FormData();
        form.append('id',slideNumber);
        form.append('imageFor',imageFor);
        form.append('imageURL',imageURL);
        form.append('imageLabel',imageLabel);

        $.ajax({
            url : "uploadNewSlide.php",
            type : "POST",
            cache : false,
            contentType : false,
            processData : false,
            data : form,
            success : function(response){
                alert(response);
            }
        })
    });

</script>