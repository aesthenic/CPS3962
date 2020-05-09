
<?php
// Inialize session
session_start();

?>

<?php
// get the selected vehicle ID
// If it exists
if(isset($_GET['q'])){

     $vehicleID = $_GET['q'];
    // Script to display selected car information
    // include ('phpFunctions.php');
    // $getThisCarDetails = new Vehicle();
    // $data = $getThisCarDetails->getThisCarDetails($vehicleID);
?>

<html>
<head>
  <title>NetCar</title>

  <style>
body{

}
#mainBody1{
  margin-top: 50px;
}

 #mainBody2{
   margin: auto;
   background: white;
   /*border-bottom: 1px solid gray;*/
   text-align: center;
   box-shadow: 0 8px 6px -6px black;
 }

#mainBody2 .mainMenu{
   margin: auto;
   width: 75%;

 }
#mainBody2 .mainMenu td{
  font-size: 11px;
  font-weight: bold;
  cursor: pointer;
  padding: 15px;
  text-align: center;
  color: black;
  border: 1px solid white;

}
#mainBody2 .mainMenu td:hover{
    /*background: #0099FF;*/
    color: #0099FF;
    border: 1px solid #0099FF;

}
#mainBody3{
  margin: auto;
  width: 75%;
  padding: 5;

}
 #mainBody3 .mainBody3Top{
   width: 90%;
   margin: auto;

 }



#indBottom{
  float: left;
  width: 100%;

}
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
// When doc is ready
  // $(document).ready(function(){
  //
  // });

  </script>

</head>
<body>
  <div id="">
<?php include ('top.php') ?>
</div>

<div id="mainBody1"></div>

<div style="background: #FFFFFF; ">

<div id="mainBody2">

  <div class="mainMenu">

      <?php //main menu control here ?>

  </div>

</div>
</div>


<div id="mainBody3">
  <div class="mainBody3Top">
    <br/>

    <?php
    //include ('phpFunctions.php');
    $getThisCarDetails = new Vehicle();
    $data = $getThisCarDetails->getThisCarDetails($vehicleID);

      // If no data is returned or not.
      if(!$data){
    ?>

    <div class="" style=" background: whitesmoke; border: 1px solid gainsboro; border-radius: 3px; border-bottom: 1px solid gray; width: 98%; ">

      <div class="" style="width: 100%; margin: auto; padding-top: 15px; padding-bottom: 15px; color: white; background: #0099FF; text-align: center; ">
        Sorry this car information cannot be found
      </div>

      <img src="img/thisDealerCarPlaceHolder.png" style="width: 100%; "/>
      <br/><br/>
    </div>


    <?php
      }else {
        // If this car information exists

        foreach ($data as $row) {
          // code...
          //echo $vehicleID = $row['vehicleID'].'<br>';
    ?>


        <div class="" style=" background: white; border: 1px solid gainsboro; border-radius: 5px; border-bottom: 1px solid gray; width: 100%; ">
          <img src="php/upload/<?php echo $row['nameFileVehicle']; ?>" style="width: 100%; "/>

          <div style="padding: 10px;  ">
          <div style="color: #000000;  font-size: 24px;">  <?php echo $row['yearVehicle'] . " " . $row['makeVehicle'] . " " . $row['modelVehicle']; ?></div>
          <div style="font-size: 14px; padding-top: 10px; padding-bottom: 3px;">  $<?php echo $row['sellingPriceVehicle']; ?></div>
          <div style="font-size: 12px; padding-top: 10px; padding-bottom: 3px; color: black;"><?php echo $row['descriptionVehicle']; ?></div>
          </div>
        </div>


    <?php
        }
      }

    ?>

  </div>


</div>

<div id="indBottom" style=" ">

<?php include ('bottom.php') ?>
</div>

</body>
</html>


<?php
}else {
  // code...
  // Return to search page if the vehicleID doesn't exist
?>
<script> window.location.href = '../search.php'; </script>
<?php
}
?>
