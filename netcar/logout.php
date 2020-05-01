
<?php
// Inialize session
session_start();
// Remember One user at the time

// Script used to sign a customer / a car dealer out
?>
<?php
// If both Customer and Dealer session does not exit -> login.php
if (!isset($_SESSION['customerID']) && !isset($_SESSION['dealerID'])){
?>

<script> window.location.href = 'login.php'; </script>

<?php
}else{
  // In case both customer and dealer sessions exist
  // If only the customer session exists -> kill existing sessions then return to login.php
  if(isset($_SESSION['customerID']) && !isset($_SESSION['dealerID'])){
    // Destroy the existing sessions of the customer
    unset($_SESSION['customerID']);
    unset($_SESSION['nameCust']);

?>

<script> window.location.href = 'login.php'; </script>

<?php
  }
  // If only the dealer session exists -> kill existing sessions then return to login.php
  if(!isset($_SESSION['customerID']) && isset($_SESSION['dealerID'])){
    // Destroy the existing sessions of the dealer
    unset($_SESSION['dealerID']);
    unset($_SESSION['nameDealer']);
?>

<script> window.location.href = 'login.php'; </script>

<?php
  }
}
?>
