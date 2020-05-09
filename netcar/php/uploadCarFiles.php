<?php
// Inialize session
session_start();

// Check, if the user is already logged in, then jump to the right page
// // Customer
// if (!isset($_SESSION['customerID'])){
// header('Location: index.php');
// }
// If Dealer session does not exist, go back to login page
if (!isset($_SESSION['dealerID'])){
header('Location: login.php');
}
?>

<?php
// Script called by $('.file_drag_area').on('drop', function(e){...}) from page "dealerAddCars.php"
// Script to upload car files
// Save files info in the Db first
// Then upload files
//echo "test";

//Dealer Files Upload folder location
$folderName = 'upload/';
// var holding the files div
$output = '';
//
$fileVehicleData = '';
  //
$i = 0;
// Empty the session var first
$_SESSION['thisCarPictures'] = '';
//
if(isset($_FILES['file']['name'][0])){

  //
  $validFormats = array("jpg", "png","jpeg");
// $txt goes for file name
list($txt, $ext) = explode(".", $_FILES['file']['name'][0]);
     //echo 'OK';
     // For each files
     foreach($_FILES['file']['name'] as $keys => $values){
       // Get their name, size and sqlite_fetch_column_types
        //$nameSource = $_FILES['file']['tmp_name'][$keys];
        //$nameSource = date('Y-m-d H:i:s'). '.' .$ext;
        //$size = $_FILES['file']['size'];
       //$type = $_FILES['file']['type'];\

       $i++;
       // Format of the downloading picture name
       $values = time().  '_'. $i. '.' .$ext;
       //
      $initialName = $_FILES['file']['tmp_name'][$keys];

       if(in_array($ext,$validFormats)){ // if the farmat is valid
//         if($_FILES['file']['size']<(1024*1024*10)){ // Image size max 10 MB
//move_uploaded_file ( string $filename , string $destination ) : bool
          if(move_uploaded_file($initialName, $folderName . $values)){

               //$output .= '<div class=col-md-3"><img src="upload/'.$values.'" class="img-responsive" /></div>';
               $output .= '<div style=" width: 49%; text-align: center;float: left; background: whitesmoke; border: 1px solid gainsboro; ">
               <img src="php/'. $folderName .$values.'" style="width: 100%;"/>
               </div>';

               //  Get the name of the files uploaded for this car
               $fileVehicleData .= $values .',';
               // Put it into the global var for dealerAddCars.php to read
              //echo $_SESSION['thisCarPictures'] = $fileVehicleData;

          }else{
            ?>
                  <script> alert('Picture format not supported or size larger than 10 MB'); </script>
            <?php  }
        }
      }


// Display the files
echo $output;
// Put it into the global var for dealerAddCars.php to read
$_SESSION['thisCarPictures'] = $fileVehicleData;
}
 ?>
