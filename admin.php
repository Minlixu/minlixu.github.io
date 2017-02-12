<?php

 session_start();

 if(!isset($_SESSION["username"]))
 {

     header("Location: signin.php");
     exit;
 }       

?>











































?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>

    <?php

        print "<p>Logged in as {$_SESSION["username"]}</p>";

        print "<p><a href=\"addproduct.php\"> Lägg Till Produkter</a></p>";

        print "<p><a href=\"deleteproduct.php\">Ta Bort Produkter</a></p>";

        Print '<p><a href="signout.php">Sign Out</a>';
    ?>


</body>
</html>