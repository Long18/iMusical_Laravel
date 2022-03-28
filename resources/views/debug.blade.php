<!DOCTYPE html>
<html>
    <head>
        <?php
            use Illuminate\Support\Facades\Session;
        ?>

    </head>
    <body style="background-color: black; color:gainsboro">
        <?php
            $carts = Session::get('carts');

            if($carts){
                foreach($carts as $item){
                    echo "<h1> " . $item->product_id. "</h1>";
                }
            }
        ?>

    </body>
</html>
