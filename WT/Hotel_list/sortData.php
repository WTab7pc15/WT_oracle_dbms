<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) 
{
    $query ="SELECT hotel_id,hotel_name,star_rating,address,public_rating,review_count,price,hotel_image FROM hotel_details WHERE (( UPPER(hotel_name) like UPPER('" . $_POST["keyword"] . "%') or  UPPER(city) like UPPER('" . $_POST["keyword"] . "%') or UPPER(state) like UPPER('" . $_POST["keyword"] . "%') ) and hotel_details.accomodation = '" . $_POST['accomodation'] . "' and hotel_details.price < " . $_POST['price'] . " ) AND ROWNUM <= 30 ". $_POST['order'] ;
    $result = $db_handle->runQuery($query);
    if(!empty($result)) 
    {   ?>
        <?php
        foreach($result as $resdata) 
        { ?>
            <?php 
                $hotel_name = $resdata['HOTEL_NAME'];
                $star_rating = $resdata['STAR_RATING'];
                $color_star = "";
                $empty_star = "";
                $address_details = $resdata['ADDRESS'];
                $distance = "12km from City Center";
                $public_rating = $resdata['PUBLIC_RATING'] / 10;
                $outStr = "";
                $reviews = $resdata['REVIEW_COUNT'];
                $price = $resdata['PRICE'];
                $hotel_id = $resdata['HOTEL_ID'];
                $hotel_image = $resdata['HOTEL_IMAGE'];
                for ($i = 0; $i < $star_rating; $i++) {
                    $color_star .= '<i class="fa fa-star starColor" ariahiddenn="true"></i>';
                }
                for ($i = 0; $i < (5 - $star_rating); $i++) {
                    $empty_star .= '<i class="fa fa-star-o" ariahiddenn="true"></i>';
                }
                switch (round($public_rating)) {
                    case 0:
                        $outStr = "No rating";
                        break;
                    case 1:
                    case 2:
                        $outStr = "Worst";
                        break;
                    case 3:
                    case 4:
                        $outStr = "Bad";
                        break;
                    case 5:
                    case 6:
                        $outStr = "Good";
                        break;
                    case 7:
                    case 8:
                        $outStr = "Best";
                        break;
                    case 9:
                    case 10:
                        $outStr = "Excellent";
                        break;
                }

                if ($public_rating < 5) {
                    $a = 255;
                    $b = 51 * ($public_rating);
                } else {
                    $a = 255 - (51 * ($public_rating - 5));
                    $b = 255;
                }
                echo '<div class="row border border-primary" style="padding:10px;">
                            <div class="col-md-4">
                                <img class="img-fluid" style="max-height: 200px;" src="./img/hotels/hotel_' . $hotel_image . '.jpg">
                            </div>
                            <div class="col-md-5" class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">' . $hotel_name . '</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">' . $color_star . $empty_star . '</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">' . $address_details . '</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">' . $distance . '</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-8">' . $outStr . '</div>
                                    <div class="col-md-4" style="color:white; background:rgb(' . $a . ',' . $b . ', 0);">' . number_format($public_rating, 1) . '</div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">' . $reviews . ' Reviews</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="font-size:30px;"><i class="fa fa-inr" ariahiddenn="true"></i>' . $price . '</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <form action="Hotel_details/index.php" method="POST">
                                            <input class="btn btn-primary" type="submit" value="More Info">
                                            <input type="text" name="h_id" id="mmit" style="display:none;" value="' . $hotel_id . '">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
            ?>
            <?php 
        }   ?> <?php 
    } 
} ?>
