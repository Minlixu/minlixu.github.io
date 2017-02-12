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


    if (!isset($_SESSION['boughtProduct']))
    {
        $_SESSION['boughtProduct'] = [];
    }
    
    
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

        if(($_SESSION['boughtProduct']) && (in_array($id,$_SESSION['boughtProduct'])))
            {
                $productBoughtstring= "<div class=\"productBoughtstring\">
                                            <span class=\"myboughtitem\">köpt </span>
                                        </div>";
            }else
            {
                $productBoughtstring= "<div class=\"productBoughtstring\">
                                            <span class=\"btn btn-primary mybuybutton\">
                                            <a href= \"purchase.php?id=$id\"class=\"mypurchasebutton\" >köp</a>
                                            <span>
                                       </div>";
             }    


        return "       <div class=\"col-md-3\">
                            <div class=\"imgclass\">
                                <img class=\"img-fluid d-block mx-auto\" src=\"$image\" >
                            </div>
                            <div class=\"produktinfo\">
                                <span class=\"name\">$name</span>
                                <span class=\"price\"> | Pris:$price kr </span>
                                <p class=\"productBoughtstring\">$productBoughtstring</p>
                            </div>                        
                        </div>";
    
       }


    
    $dbc = mysqli_connect("maria_db", "root","admin", "webbteknik");
    $query = "SELECT * FROM products";
    $result= mysqli_query ($dbc, $query);

    $products = [];

    while ($databaseRow = mysqli_fetch_array($result))
    {
        // add each database row (an article) to our list of articles. 
        $products[] = $databaseRow;
        //print_r($databaseRow);
        
    }

    // $row is a variable that represents the currently open (Bootstrap) row.
    $row    = NULL;

    // $html is a variable that represents the entire HTML string for the Bootstrap grid we want to display.
    $html   = "<div class=\"container\">";

    // loop for as many columns that you want in your grid. In this example, we want to create an X * 3 grid,
    // where X is the number of rows, with 3 columns in each row.
    //
    // loop for all articles that were retrieved from the database.
    foreach ($products as $i => $product)
    {
        if ($i % 4 == 0)
        {
            // if we end up here, it means that we have to open a new row. 
            // We check if there is already an open row that we have added columns to.
            if ($row)
            {
                // yes, there is an open row, so close it.
                $html .= $row . "</div>";
            }

            // now, open a new row to which we will add columns.
            $row = "<div class=\"row\">";
        }

        // makeHtml() is our function (see above) that creates a single column for us.
        // Call the function with the current article.
        $row .= makeHtml($product);
    }

    // we have finished our loop, now we close up our last row.
    $html .= $row . "</div>";

    // and we also close the entire <div> the covers our entire grid.
    $html .= "</div>";

    // print the grid on the web page.
    print $html;

   
    ?>
    </div>

        <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '722520394568825',
        xfbml      : true,
        version    : 'v2.8'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <!-- Scripts -->





<?php
    require("footer.html");
?>
