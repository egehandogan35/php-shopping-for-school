<?php


function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                Some sample text.
                            </p>
                            <h5>                                
                                <span class=\"price\">$productprice TL</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>                                
                                <h5 class=\"pt-2\">$productprice TL</h5>                                
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js\"></script>

<form action=\"cart.php?action=minus_button&id=$productid>\"method=\"post\" class=\"cart-items\">
         <button type=\"submit\" class=\"btn bg-light border rounded-circle minus_button\"  name=\"minus_button\" ><i class=\"fa fa-minus\"></i></button>

  <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline quantity\" id=\"quantity\" data-id=\"$productid\">
  
<form action=\"cart.php?action=plus_button&id=$productid>\"method=\"post\" class=\"cart-items\">
         <button type=\"submit\" class=\" btn bg-light border rounded-circle plus_button\"  name=\"plus_button\" ><i class=\"fa fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
    
    ";



    echo  $element;
}

















