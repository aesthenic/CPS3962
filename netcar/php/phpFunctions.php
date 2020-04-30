
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

      // Close the DB fann_get_total_connections
      mysqli_close($this->conn);
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
                    //$_SESSION['userID'] = $donnees['customerID'];
                    //$_SESSION['username'] = $donnees['name'];
                    //$_SESSION['date_notif_news'] = '0000-00-00 00:00:00';

                    // Return profile
                    //echo "ACCOUNT CREATED";
                    //header("Location: profile.php");
?>
                    <script> window.location.href = 'profile.php'; </script>
<?php
                  }else{
?>
                      <script> alert("We were unable to create your account. Please check your Internet connection and retry"); </script>
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
        return $data;
      }
      }
    }

    // Method to retrieve customer row information from the DB
    public function getCustomerInfo(){

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
                     //$_SESSION['userID'] = $donnees['customerID'];
                     //$_SESSION['username'] = $donnees['name'];
                     //$_SESSION['date_notif_news'] = '0000-00-00 00:00:00';

                     // Return profile
                     //echo "ACCOUNT CREATED";
                     //header("Location: profile.php");
 ?>
                     <script> window.location.href = 'dealer.php'; </script>
 <?php
                   }else{
 ?>
                       <script> alert("We were unable to create your account. Please check your Internet connection and retry"); </script>
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
       return $data;
     }
     }
   }


}
?>
