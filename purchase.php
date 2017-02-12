<?php
session_start();

require ("header.html");

?>



<!DOCTYPE html>
    <!-- 
        This is HTML specific to Twitter. 
     
        REMEMBER: Change "data-url" to match YOUR localtunnel address everytime it changes!
     -->
   



   
    <div class="page-content">  

<?php

$id = $_GET["id"];

$_SESSION['boughtProduct'][] = $id;



$dbc = mysqli_connect("maria_db", "root","admin", "webbteknik");
        if ($dbc)
        {    
        
        $query = "SELECT * FROM products  where id= '$id'";
        $result = mysqli_query($dbc, $query);

        $row =mysqli_fetch_array($result);

        $productName =($row['name']);

        };

print " <div class=\"col-md-12\">
                <p class=\"mythanks\">Stort tack för din beställning! Din beställning  $productName har mottagits.</p>
        </div>";

mysqli_close ($dbc);

?>