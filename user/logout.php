<?php
session_start();
$idd=$_SESSION['id'];
unset($_SESSION['id']);
session_destroy();
header("location:../?".$idd."");
?>