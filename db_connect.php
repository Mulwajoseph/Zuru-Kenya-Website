<?php
$connect=mysqli_connect("localhost","root","","tour");
if(!$connect){
  echo'<script>alert("not connected to the database");history.back();</script>';
}
?>