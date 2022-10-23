<?php

if(isset($_GET['ga']) && isset($_GET['ut']))
{
    $g = $_GET['ga'];
    $u = $_GET['ut'];
    $conn = mysqli_connect('localhost', 'root', '', 'garage1');
    
    $sq = "Delete from garage Where IdGarage=$g";
    $result = mysqli_query($conn, $sq);
    
    
    header("Location:Compte.php?it=$u");
    exit();

}

?>