<?php
include 'config.php';

$comment= $_POST['comment'];
$nimi= $_POST['nimi'];
$sahkoposti= $_POST['sahkoposti'];
$arvosana= $_POST['arvosana'];

$lisaus = $database->prepare(
"insert into nf_comments (comment, nimi, sahkoposti, arvosana) values (?,?,?,?)");

$lisaus->bind_param (
"ssss", $comment, $nimi, $sahkoposti, $arvosana);

$lisaus->execute();

$database->close();
header("Location: ./");
die();
?>