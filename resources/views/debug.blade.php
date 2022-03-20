<!DOCTYPE html>
<html>
    <head>
        <?php
            use Illuminate\Support\Facades\Session;
        ?>
    </head>
    <body>
        <?php
            $brands = Session::get('brands');

            if($brands){
                foreach($brands as $item){
                    echo "<h1> " . $item->brand_id . "</h1>";
                }
            }
        ?>
        
    </body>
</html>