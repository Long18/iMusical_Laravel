<!DOCTYPE html>
<html>
    <head>
        <?php
            use Illuminate\Support\Facades\Session;
        ?>

    </head>
    <body style="background-color: black; color:gainsboro">
        <?php
            $brands = Session::get('Product');

            if($brands){
                foreach($brands as $item){
                    echo "<h1> " . $item->brand_id. "</h1>";
                }
            }
        ?>
        
    </body>
</html>