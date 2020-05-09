<?php
/*
List of Classes so far
DBConnection - Vehicle - Customer - Dealer
*/

?>

<?php
// Class that gets connect to the DB
class DBConnection{

  // Private members
  private $server = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "netcardb";
  private $conn;

    // Protected methods
    // Method connecting to the database
    protected function dbConnect(){

      try{
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);

      } catch (Exception $e){

        //echo $e->getMessage();
  ?>
      <script> alert("Connection failed, please check your Internet connection.");</script>
  <?php
      }

      return  $this->conn;
    }

    protected function dbClose(){

      // Close the DB Connection
      mysqli_close($this->conn);
    }

}
?>

<?php
// Class
class Vehicle extends DBConnection{
  // Private members




  // Public members
  // Method allowing a car Dealer to list a Car
  public function listACar($yearCar, $nameCar, $modelCar, $typeCar, $extcolorCar, $intColorCar, $sellPriceCar, $vinCar, $descripCar, $hiddenDataCar, $dealerID){
    // 3 queries here: $sql1 - $sql2
    $statusVehicle = 1;
    //
    // echo $yearCar .'<br>';
    // echo $nameCar .'<br>';
    // echo $modelCar .'<br>';
    // echo $typeCar .'<br>';
    // echo $extcolorCar .'<br>';
    // echo $intColorCar .'<br>';
    // echo $sellPriceCar .'<br>';
    // echo $vinCar .'<br>';
    // echo $descripCar .'<br>';
    // echo $hiddenDataCar .'<br>';
    // echo  $dealerID .'<br>';
    //
    $sql1 = "INSERT INTO `vehicle`( `vinVehicle`, `yearVehicle`, `makeVehicle`, `modelVehicle`, `typeVehicle`, `exteriorColorVehicle`, `interiorColorVehicle`, `sellingPriceVehicle`, `desriptionVehicle`, `statusVehicle`, `dealerPostingVehicle`)
    VALUES ('$vinCar', '$yearCar', '$nameCar', '$modelCar', '$typeCar', '$extcolorCar','$intColorCar', '$sellPriceCar', '$descripCar', '$statusVehicle', '$dealerID')";
    // Method dbConnect of the class DBConnection
    $result1 = $this->dbConnect()->query($sql1);
    // Close the DB Connection
    $this->dbClose();
    // If the query was successful, then we insert the files name and insert in the file table
    if($result1){
      // Get the vehicle just list ID dba_firstkey
      $sql2 = "SELECT * FROM `vehicle` WHERE `dealerPostingVehicle` = '$dealerID' ORDER BY  `vehicleID` DESC";
      //
      $result2 = $this->dbConnect()->query($sql2);
      $numRows = $result2->num_rows;
      // Close the DB Connection
      $this->dbClose();
      // In case the user already exists
      if($numRows > 0){
        // Now that we have the last car posted ID, we insert its files names in the file table
        if($row = $result2->fetch_assoc()){

          $thisVehicleID = $row['vehicleID'];

              //Make sure that the session $hiddenDataCar variable actually exists!
              if($hiddenDataCar){

                //explode function breaks an string into array
                // Break the long string into array based on the coma
                   $hiddenDataCarArr =explode(",", $hiddenDataCar);
                //Loop through it like any other array.
                for($i=0; $i < sizeof($hiddenDataCarArr) - 1; $i++){

                  //echo $hiddenDataCarArr[$i] .'<br>';
                    //Call the method that insert each file into the file table.
                    $this->insertThisFile($hiddenDataCarArr[$i], $thisVehicleID, $dealerID);
                }
                  // Then clear pictures ession value
                  $_SESSION['thisCarPictures'] = '';
                  // return true;
              }
        }
    }
}else {
  // code...
  ?>
          <script> alert("Something went wrong! Please check your Internet connection"); </script>
  <?php
      }
}

    // Method to save a file of a specific car in the DB
    public function insertThisFile($fileVehicle, $thisVehicleID, $dealerID){

      //
      $sql = "INSERT INTO `filevehicle`(`nameFileVehicle`, `vehicleID`, `dealerID`) VALUES ('$fileVehicle', '$thisVehicleID', '$dealerID')";
      // Method dbConnect of the class DBConnection
      $this->dbConnect()->query($sql);
      // Close the DB Connection
      // I didn't close this connection because of multiple persistence request.
      //$this->dbClose();
    }


    // Method to fetch this dealer cars from DB
    public function thisDealerCars($dealerID){
      //
      $data = null;
      //
      $sql1 = "SELECT DISTINCT *
              FROM `dealer`, `vehicle`,`filevehicle`
              WHERE fileVehicle.dealerID = dealer.dealerID
              AND vehicle.vehicleID = filevehicle.vehicleID
              AND dealer.`dealerID` = '$dealerID'
              ORDER BY RAND()
              LIMIT 0, 200";
      //
      $result = $this->dbConnect()->query($sql1);
      $numRows = $result->num_rows;
      // Close the DB Connection
      $this->dbClose();
      // In case a row is found
      if($numRows > 0){
        //
        while($row = $result->fetch_assoc()){
        $data[] = $row;
        // return $data;
      }
      }

      return $data;
    }


    // Method to fetch limited cars browsing from the DB
    public function vehiclesLimitedView(){
      //
      $data = null;
      //
      $sql1 = "SELECT DISTINCT *
              FROM `dealer`, `vehicle`,`filevehicle`
              WHERE fileVehicle.dealerID = dealer.dealerID
              AND vehicle.vehicleID = filevehicle.vehicleID
              ORDER BY RAND()
              LIMIT 0, 100";
      //
      $result = $this->dbConnect()->query($sql1);
      $numRows = $result->num_rows;
      // Close the DB Connection
      $this->dbClose();
      // In case a row is found
      if($numRows > 0){
        //
        while($row = $result->fetch_assoc()){
        $data[] = $row;
        // return $data;
      }
      }

      return $data;
    }


// Method to fetch limited cars browsing from the DB
public function searchVehicle($inputValue){
  // Var declaration
  $data = null;
  $yearCar = '';
  $makeCar = '';
  $modelCar = '';
  // Retrieve from the input values
  $arr = explode(" ",$inputValue);
  $yearCar = $arr[0];
  //
  if(isset($arr[1])){  $makeCar = $arr[1]; }

  if(isset($arr[2])){  $modelCar = $arr[2]; }
  //
  $sql1 = "SELECT DISTINCT *
          FROM dealer, `vehicle`,`filevehicle`
          WHERE fileVehicle.dealerID = dealer.dealerID
          AND vehicle.vehicleID = filevehicle.vehicleID
          AND `vehicle`.`yearVehicle` LIKE '$yearCar%'
          AND `vehicle`.`makeVehicle` LIKE '$makeCar%'
          AND `vehicle`.`modelVehicle` LIKE '$modelCar%'
          LIMIT 0, 100";
  //
  $result = $this->dbConnect()->query($sql1);
  $numRows = $result->num_rows;
  // Close the DB Connection
  $this->dbClose();
  // In case a row is found
  if($numRows > 0){
    //
    while($row = $result->fetch_assoc()){
    $data[] = $row;
    // return $data;
  }
  }

  return $data;
}

    // Method to retrieve a specific car details
    public function getThisCarDetails($vehicleID){
                //
                $data = null;
                //
                $sql1 = "SELECT *
                          FROM `dealer`, `vehicle`,`filevehicle`
                          WHERE fileVehicle.dealerID = dealer.dealerID
                          AND vehicle.vehicleID = filevehicle.vehicleID
                          AND `vehicle`.`vehicleID` = '$vehicleID'";
                //
                $result = $this->dbConnect()->query($sql1);
                $numRows = $result->num_rows;
                // Close the DB Connection
                $this->dbClose();
                // In case a row is found
                if($numRows > 0){
                  //
                  if($row = $result->fetch_assoc()){
                  $data[] = $row;
                  // return $data;
                }
                }

                return $data;
    }

}
?>


<?php
// Class
class Customer extends DBConnection{

  // Private members




  // Public members
  // Create a new customer
  public function signUpCustomer($username, $email, $pwd){
    //echo $username. ' ' .$email. ' ' .$pwd;
    //if(isset($_POST['signUp'])){
        // // Check and Get the input values
        // //if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['pwdCheck']) isset($_POST['type'])){
        //   //
        //   //if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdCheck']) !empty($_POST['type'])){
        //     // Check the input values are ok
        //     if(strlen($_POST['name']) > 1 && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", ($_POST['email'])) &&  strlen($_POST['pwd']) > 3 && ($_POST['pwd']) == ($_POST['pwdCheck'])){
        //       //
        //       $username = trim(htmlentities ($_POST['name'], ENT_QUOTES));
        //       $email = trim(htmlentities ($_POST['email'], ENT_QUOTES));
        //       $pwd = htmlentities ($_POST['pwd'], ENT_QUOTES);
        //       $pwdCheck = htmlentities ($_POST['pwdCheck'], ENT_QUOTES);
        //       $type = trim(htmlentities ($_POST['type'], ENT_QUOTES));
              //Check if user already exists
              $sql1 = "SELECT * FROM `customer` WHERE `emailCust` = '$email'";
              //
              $result1 = $this->dbConnect()->query($sql1);
              $numRows = $result1->num_rows;
              // Close the DB Connection
              $this->dbClose();
              // In case the user already exists
              if($numRows > 0){
                //echo "test";
                // Redirect to register.php
                //header("Location: register.php");

?>
                <script> alert("Sorry! This account already exists"); </script>
<?php
              }else {
                  // In case the account doesn't exist, we create one using the input values
                  //$sql2 = "INSERT INTO `customer`(`customerID`, `nameCust`, `emailCust`, `passwordCust`) VALUES ('', '$username', '$email', '$pwd')";
                  //$sql2 = "INSERT INTO `customer`(`nameCust`, `emailCust`, `passwordCust`) VALUES ('$username', '$email', '$pwd')";
                  $sql2 = "INSERT INTO `customer`(`nameCust`, `emailCust`, `passwordCust`, `avatarCust`, `adrCust`, `townCust`, `stateCust`, `countryCust`, `phoneNumCust`)
                  VALUES ('$username', '$email', '$pwd', '', '', '', '', '', '')";
                  // Method dbConnect of the class DBConnection
                  $result2 = $this->dbConnect()->query($sql2);
                  // Close the DB Connection
                  $this->dbClose();
                  // If the query was successful, then prepare and load the profile page
                  if($result2){
                    //we'll start the sessions informations here
                    $userCustomer = $this->SignInCustomer($email, $pwd);
                    //var_dump($userCustomer);
                    if($userCustomer){
                      // Initialiaze Customer session
                      //var_dump($userCustomer);
                       foreach ($userCustomer as $row) {
                        // code...
                        //echo $row['customerID']."<br>";
                        //we'll start the sessions informations here
                        $_SESSION['customerID'] = $row['customerID'];
                        $_SESSION['nameCust'] = $row['nameCust'];
                      }
?>
                       <script> window.location.href = 'profile.php'; </script>
<?php
                   }
                    // Return profile
                    //echo "ACCOUNT CREATED";
                    //header("Location: profile.php");
?>
                    <script> //window.location.href = 'profile.php'; </script>
<?php
                  }else{
?>
                      <script> alert("We were unable to create your account. Please check your Internet connection"); </script>
<?php
                  }
              }
        //    }
        //  }
      //  }
    //  }
  }

    // Method to signIn a customer
    public function SignInCustomer($email, $pwd){
      //
      $data = null;
      //
      $sql1 = "SELECT * FROM `customer` WHERE `emailCust` = '$email' AND `passwordCust` = '$pwd'";
      //
      $result = $this->dbConnect()->query($sql1);
      $numRows = $result->num_rows;
      // Close the DB Connection
      $this->dbClose();
      // In case a row is found
      if($numRows > 0){
        //
        if($row = $result->fetch_assoc()){
        $data[] = $row;
        // return $data;
      }
      }

      return $data;
    }

    // Method to retrieve customer row information from the DB
    public function getCustomerInfo(){
      //
      $data = null;
      $sql = "SELECT * FROM `customer`";
      // Method dbConnect of the class DBConnection
      $result = $this->dbConnect()->query($sql);
      $numRows = $result->num_rows;
      // Close the DB Connection
      $this->dbClose();
      //
      if($numRows > 0){
        //
        while($row = $result->fetch_assoc()){

          $data[] = $row;
/*
          //
          foreach ($data as $value) {
            // code...
            echo $value['nameCust']."<br>";
            echo $value['adrCust']."<br>";
          }
*/
        }
        // Return the data of the customer info
        return $data;
      }
    }



}
 ?>


 <?php
 // Class
 class Dealer extends DBConnection{

   // Private members




   // Public members
   // Method to sign up a new dealer
   public function signUpDealer($username, $email, $pwd){
     //echo $username. ' ' .$email. ' ' .$pwd;
     //if(isset($_POST['signUp'])){
         // // Check and Get the input values
         // //if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['pwdCheck']) isset($_POST['type'])){
         //   //
         //   //if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdCheck']) !empty($_POST['type'])){
         //     // Check the input values are ok
         //     if(strlen($_POST['name']) > 1 && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", ($_POST['email'])) &&  strlen($_POST['pwd']) > 3 && ($_POST['pwd']) == ($_POST['pwdCheck'])){
         //       //
         //       $username = trim(htmlentities ($_POST['name'], ENT_QUOTES));
         //       $email = trim(htmlentities ($_POST['email'], ENT_QUOTES));
         //       $pwd = htmlentities ($_POST['pwd'], ENT_QUOTES);
         //       $pwdCheck = htmlentities ($_POST['pwdCheck'], ENT_QUOTES);
         //       $type = trim(htmlentities ($_POST['type'], ENT_QUOTES));
               //Check if user already exists
               $sql1 = "SELECT * FROM `dealer` WHERE `emailDealer` = '$email'";
               //
               $result1 = $this->dbConnect()->query($sql1);
               $numRows = $result1->num_rows;
               // Close the DB Connection
               $this->dbClose();
               // In case the user already exists
               if($numRows > 0){
                 //echo "test";
                 // Redirect to register.php
                 //header("Location: register.php");

 ?>
                 <script> alert("Sorry! This account already exists"); </script>
 <?php
               }else {
                   // In case the account doesn't exist, we create one using the input values
                   //$sql2 = "INSERT INTO `customer`(`customerID`, `nameCust`, `emailCust`, `passwordCust`) VALUES ('', '$username', '$email', '$pwd')";
                   //$sql2 = "INSERT INTO `customer`(`nameCust`, `emailCust`, `passwordCust`) VALUES ('$username', '$email', '$pwd')";
                   $sql2 = "INSERT INTO `dealer`(`nameDealer`, `emailDealer`, `passwordDealer`, `avatarDealer`, `adrDealer`, `townDealer`, `stateDealer`, `countryDealer`, `phoneNumDealer`)
                   VALUES ('$username', '$email', '$pwd', '', '', '', '', '', '')";
                   // Method dbConnect of the class DBConnection
                   $result2 = $this->dbConnect()->query($sql2);
                   // Close the DB Connection
                   $this->dbClose();
                   // If the query was successful, then prepare and load the profile page
                   if($result2){
                     //we'll start the sessions informations here
                     $userDealer = $this->SignInDealer($email, $pwd);
                     //var_dump($userDealer);
                      if($userDealer){
                        // Initialiaze Dealer session
                        //var_dump($userDealer);
                         foreach ($userDealer as $row) {
                          // code...
                          //echo $row['dealerID']."<br>";
                          //we'll start the sessions informations here
                          $_SESSION['dealerID'] = $row['dealerID'];
                          $_SESSION['nameDealer'] = $row['nameDealer'];
                        }
?>
                        <script> window.location.href = 'dealer.php'; </script>
<?php
                      }
                     // Return profile
                     //echo "ACCOUNT CREATED";
                     //header("Location: profile.php");
 ?>
                     <script> //window.location.href = 'dealer.php'; </script>
 <?php
                   }else{
 ?>
                       <script> alert("We were unable to create your account. Please check your Internet connection"); </script>
 <?php
                   }
               }
         //    }
         //  }
       //  }
     //  }
   }

   // Method to sign In a Car Dealer
   public function SignInDealer($email, $pwd){

     //
     $data = null;
     //
     $sql1 = "SELECT * FROM `dealer` WHERE `emailDealer` = '$email' AND `passwordDealer` = '$pwd'";
     //
     $result = $this->dbConnect()->query($sql1);
     $numRows = $result->num_rows;
     // Close the DB Connection
     $this->dbClose();
     // In case a row is found
     if($numRows > 0){
       //
       if($row = $result->fetch_assoc()){
       $data[] = $row;
     }
     }
     // Return the data of the dealer info
     return $data;
   }


}
?>
