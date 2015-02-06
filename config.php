<?php
$database= new mysqli("localhost:3306", "nuislyfed", "", "nuislyfeddb");

if(mysqli_connect_errno()) {printif ("yhteys on epäonnistunut", mysqli_connect_error()); 
exit;}
?>