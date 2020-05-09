
<?php
// Inialize session
session_start();

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
 #mainBody3 .left{
   width: 75%;
   margin: auto;
   float: left;

 }
 #mainBody3 .right{
   width: 25%;
   margin: auto;
   float: left;

 }



#indBottom{
  float: left;
  width: 100%;

}
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
// When doc is ready
  $(document).ready(function(){
    //alert("test");

    // Car search to input function
        $('#topSearchInput').keypress(function(event){
          //alert("test");

        // get the value from the form
    		var topSearchInput = $('#topSearchInput').val();
        //var hiddenDataCar = $('#hiddenDataCar').val();

        // if ENTER key is pressed
    	//	if (event.keyCode == 13) {
        // check that all entries are good to go
    			if (topSearchInput.length > -1 || event.keyCode == 13){
    				//alert("");
          $.post('php/searchEngine.php',{topSearchInput: topSearchInput},
    	     function(output){
    		       $('.left').html(output).show();
    					});
            // Upon success
          // JQuery Effects here
          //$('#hiddenDataCar').val('');
    		}

      });
    // End
  });

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
  <div class="left">
    <br/>
    <?php
    // // If input received from index.php page exists
    // if(strlen($_POST['searchInput']) > 1){
    //   //
    //
    //   echo 'searchInput Exists' . $_POST['searchInput'];
    // } else {
    //   // code...
    //   echo 'no exists';
    //
    // }
    ?>
    <?php
      // Script to display limited vehicle browsing experience
      $vehiclesLimitedView = new Vehicle();
      $data = $vehiclesLimitedView->vehiclesLimitedView();

      // If data is returned or not.
      if(!$data){
        // If no vehicle listed yet
    ?>

    <div class="" style=" background: whitesmoke; border: 1px solid gainsboro; border-radius: 3px; border-bottom: 1px solid gray; width: 98%; ">

      <div class="" style="width: 100%; margin: auto; padding-top: 15px; padding-bottom: 15px; color: white; background: #0099FF; text-align: center; cursor: pointer; ">
        It's unfortunate no car is listed yet. A little patience and we'll all get there
      </div>

      <img src="img/thisDealerCarPlaceHolder.png" style="width: 100%; "/>
      <br/><br/>
    </div>


    <?php
      }else {
        // If this listed at list one car

    ?>
            <table width="100%" style="">
                <td width="75%">

                  <label style="color: black; font-weight: bold; font-size: 11px ; ">Some cars you might interested in</label>

                </td>
                <td width="25%">
                  <class style="visibility: hidden; text-align: right; float: right; margin-right: 10px;"><a href="" title="Filter" style="color: black; font-weight: bold; font-size: 10px ; ">Filter</a></class>
                </td>
            </table>

            <br/>
    <?php
        foreach ($data as $row) {
          // code...
          //echo $vehicleID = $row['vehicleID'].'<br>';
    ?>


    <a href="carDetails.php?q=<?php echo $row['vehicleID']; ?>" style="text-decoration: none; ">
    <div class="" style="float: left; margin: 5px; background: white; border: 1px solid gainsboro; border-radius: 5px; border-bottom: 1px solid gray; width: 45%; ">
      <img src="php/upload/<?php echo $row['nameFileVehicle']; ?>" style="width: 100%; "/>
      <div style="padding: 10px;  ">
      <div style="color: #000000;  ">  <?php echo $row['yearVehicle'] . " " . $row['makeVehicle'] . " " . $row['modelVehicle']; ?></div>
      <div style="font-size: 9.5px; padding-top: 10px; padding-bottom: 3px; color: dimgray; ">  $<?php echo $row['sellingPriceVehicle']; ?></div>
      </div>
    </div>
    </a>


    <?php
        }
      }

    ?>

  </div>




  <div class="right">
    <br/>
    <label style="color: black; font-weight: bold; font-size: 11 ; ">Ads</label>
    <br/><br/>

    <div class="" style="border: 1px solid whitesmoke; border-radius: 0; border-bottom: 1px solid gray; background: white; ">
      <img src="img/ad.jpg" style="width: 100%; "/>
      <br/><br/>
      <div style=" font-size: 10; padding: 10; padding-bottom: 10; ">Get a new rim today for a 15% off. Hurry up and call +1(999) 999 9999</div>
    </div>

  </div>





</div>

<div id="indBottom" style=" ">

<?php include ('bottom.php') ?>
</div>

</body>
</html>
