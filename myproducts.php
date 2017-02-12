<?php

session_start();
require ("header.html");

?>



<!DOCTYPE html>

    <div class="page-content">  

        <?php

            function makeHtml($product)
            { 
                $id     = $product['id'];
                $name   = $product['name'];
                $price = $product['price'];
                $image = $product['image'];

                if(!$image)
                        { 
                            $IMAGE_NOT_AVAILABLE_UR ='http://placehold.it/236x324';
                            $image = $IMAGE_NOT_AVAILABLE_UR;
                        } 
            
                return "<div class=\"col-md-3\">
                        <img class=\"img-fluid d-block mx-auto\" src=\"$image\" height=\"255\"/>
                        <p class=\"name\">$name</p>
                        <p>$price Kr </p>                      
                        </div>";
            } 


            $products = [];
            $boughtProducts= $_SESSION['boughtProduct'];
            
            if (!empty($boughtProducts))
            {
                $dbc = mysqli_connect("maria_db", "root","admin", "webbteknik");
                            
                $allProducts = implode(',',$boughtProducts);
                $query = "SELECT * FROM products WHERE id IN ($allProducts)";
                $result= mysqli_query ($dbc, $query);
                 
                while ($databaseRow =mysqli_fetch_array($result))
                { 
                    $products[] = $databaseRow;
                } 
            }
            
            $row    = NULL;
            $html   = "<div class=\"container\">";

            
            foreach ($products as $i => $product)
            { 
                if ($i % 4 == 0)
                { 
                    
                    if ($row)
                    { 
                        
                        $html .= $row . "</div>";
                    } 

                    
                    $row = "<div class=\"row\">";
                } 


                
                $row .= makeHtml($product);
            } 
            

            
    $html .= $row . "</div>";

            
    $html .= "</div>";

            
    print $html;

        

    ?>

    </div>

   <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>



<?php
    require("footer.html");
?>


