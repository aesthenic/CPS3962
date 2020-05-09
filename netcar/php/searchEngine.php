
<script>
//
// $(document).ready(function(){
//   //alert("test");
//
// });

</script>
<?php
// If input received then search inside the DB
// if(strlen($_POST['topSearchInput']) > 1){
if(isset($_POST['topSearchInput'])){
  // Get the search input value
  $inputValue = trim(htmlentities ($_POST['topSearchInput'], ENT_QUOTES));
?>

<?php
  // Script to display limited vehicle browsing experience
  include ('phpFunctions.php');
  $searchVehicle = new Vehicle();
  $data = $searchVehicle->searchVehicle($inputValue);

  // If data is returned or not.
  if(!$data){
    // If no vehicle listed yet
?>

<div class="" style=" background: whitesmoke; border: 1px solid gainsboro; border-radius: 3px; border-bottom: 1px solid gray; width: 98%; ">

  <div class="" style="width: 100%; margin: auto; padding-top: 15px; padding-bottom: 15px; color: white; background: #0099FF; text-align: center; ">
    No result found :(
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

              <label style="color: black; font-weight: bold; font-size: 11px ; ">Search result</label>

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
<br/><br/>
<?php
}
?>
