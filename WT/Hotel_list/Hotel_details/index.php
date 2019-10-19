<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hotel Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <script>
    function checkCookie(cname) {
      var username = getCookie(cname);
      if (username != "") {
      document.getElementById('logout').innerHTML='<img src="images/logoot.png" onclick="rec()" align="right" title="Logout" style="width:40px; height:40px;">';

      }
      else {
      document.getElementById('logout').innerHTML="";
      }

      forRef(username);
      }


      function getCookie(cname) {
      	var name = cname + "=";
      	var decodedCookie = document.cookie;
      //        alert("dcdc"+decodedCookie);
      	var ca = decodedCookie.split(';');
      	for(var i = 0; i <ca.length; i++) {
      		var c = ca[i];

      		while (c.charAt(0) == ' ') {
      			c = c.substring(1);
      		}
      		if (c.indexOf(name) == 0) {
      			return c.substring(name.length, c.length);
      			}
      	}
      	return "";
      }


      function forRef(username){
      		if (username != "") {
      			document.getElementById('aNavig').innerHTML='<a href="http://localhost/WT/Hotel_list/" >Go Booking !</a><a href="http://localhost/WT/Bookings/">History</a><a href="#"data-toggle="modal" data-target="#myModal" >Feedback</a>';

      		}
      		else{
      		document.getElementById('aNavig').innerHTML='<a href="../jsss.html?var=1">Register</a><a href="../jsss.html?var=2">Log in</a>';

      }
      }

      function rec() {
        $.ajax({
             type: "GET",
             url: "../delcookie.php",
             success:function(){location.reload();}, error:function(){}
         });
         window.location.replace("https://localhost/WT/HomePage/");
       }

    </script>
<style>

.navigbar {
      overflow: hidden;
      background-color: black;
      }
      .navigbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      }
      .drpdwn {
      float: left;
      overflow: hidden;
      }
      .drpdwn .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
      }
      .navigbar a:hover, .drpdwn:hover .dropbtn {
      background-color: red;
      }
      }


</style>
    </head>

    <body id="top" onload="checkCookie('user')">

<div class="navigbar">
         <a href="http://localhost/WT/HomePage/">Home</a>
         <a href="http://localhost/WT/AboutFolder/">About</a>
         <div class="aNavig" id="aNavig">

         </div>
         <div id="logout" class="log">
         </div>
      </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="./images/rooms-0.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="./images/rooms-1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="./images/rooms-2.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    $query = "SELECT hotel_name,city,accomodation,room_facilities,hotel_facilities,point_of_interest,price FROM hotel_details WHERE hotel_id=" . $_POST['h_id'];
    $result = $db_handle->runQuery($query);
    if(!empty($result)) 
    {   ?>
        <?php
        foreach($result as $resdata) 
        { ?>
            <?php 
            $hotel_name = $resdata['HOTEL_NAME'];
            $city = $resdata['CITY'];
            $accomodation = $resdata['ACCOMODATION'];
            $str = '<div class="row"><u>Room Facilities</u></div><div class="row"><div class="col-md-4"><ul style="list-style-type:disc;  padding: 0;">';
            $str_arr = explode("|",  $resdata['ROOM_FACILITIES']);
            for ($i = 0, $l = 0; $i < count($str_arr) && $i < 15; $i++, $l++) {
                if ($l > 5) {
                    $l = 0;
                    $str .= '</ul></div><div class="col-md-4"><ul style="list-style-type:disc;">';
                }
                $str .= '<li>' . $str_arr[$i] . '</li>';
            }
            $room_facilities = $str . "</ul></div></div>";
            if ($str_arr[0] == "") {
                $room_facilities = "";
            }
            $price = $resdata['PRICE'];
            $str_arr = explode("|",  $resdata['HOTEL_FACILITIES']);
            $str = '<div class="row"><u>Hotel Facilities</u></div><div class="row"><div class="col-md-4"><ul style="list-style-type:disc;  padding: 0;">';
            for ($i = 0, $l = 0; $i < count($str_arr) && $i < 15; $i++, $l++) {
                if ($l > 5) {
                    $l = 0;
                    $str .= '</ul></div><div class="col-md-4"><ul style="list-style-type:disc;">';
                }
                $str .= '<li>' . $str_arr[$i] . '</li>';
            }
            $hotel_facilities = $str . "</ul></div></div>";
            if ($str_arr[0] == "") {
                $hotel_facilities = "";
            }
            $pi = str_replace("|", ", ", $resdata['POINT_OF_INTEREST']);
            $map = "https://maps.google.com/maps?q=" . str_replace(" ", "%2C", $resdata['HOTEL_NAME']) . "%2C" . str_replace(" ", "%2C", $resdata['CITY']) . "r&t=&z=13&ie=UTF8&iwloc=&output=embed";
            echo '<br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <u id="h_name">' . $hotel_name . " , " . $city . '</u>  
                        </div>
                        <div class="col-md-6"><u>Accomodation Type:</u> ' . $accomodation . '</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4" style="overflow:hidden;">
                            <br>
                            <div class="row"><div class="col-md-12"><u>Location:</u></div></div>
                            <iframe width="360px" height="300px" id="gmap_canvas" src="' . $map . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                        <div class="col-md-8" style="padding-left:30px;">     
                            <br>
                            ' . $room_facilities . $hotel_facilities . '
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-12"><u>Points of Interest:</u></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">' . $pi . '</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                    <u>Book room: </u>
                </div>
            </div>
            <br>
            <div class="row">'; ?>
            <?php
                    $typee = "";
                    for ($i = 0; $i < 6; $i++) {
                        switch ($i) {
                            case 0:
                                $typee = "Luxury Double Suite";
                                break;
                            case 1:
                                $typee = "Luxury Single Room";
                                break;
                            case 2:
                                $typee = "Luxury Double Suite";
                                break;
                            case 3:
                                $typee = "Family Room";
                                break;
                            case 4:
                                $typee = "Classic Room";
                                break;
                            case 5:
                                $typee = "Budget Room";
                                break;
                            default:
                                break;
                        };
                        echo '      <div class="card col-md-4" style="padding:0px;">
                            <img class="card-img-top" src="images/room_' . ($i + 1) . '.jpg" alt="Room image description">
                            <div class="card-body">
                                <div class="rooms_title">
                                    <h2 id="typee_'.$i.'">' . $typee . '</h2>
                                </div>
                                <div class="rooms_text">
                                    <p>Maecenas sollicitudin tincidunt maximus. Morbi tempus malesuada erat sed pellentesque. Donec pharetra mattis nulla, id laoreet neque scelerisque at.</p>
                                </div>
                                <div class="rooms_list">
                                    <ul>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <img src="images/check.png" alt="">
                                            <span>Morbi tempus malesuada erat sed</span>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <img src="images/check.png" alt="">
                                            <span>Tempus malesuada erat sed</span>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <img src="images/check.png" alt="">
                                            <span>Pellentesque vel neque finibus elit</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rooms_price"><i class="fa fa-inr" ariahiddenn="true"></i><span id="price_' . $i . '" style="font-size:40px;">' . ($price * (7 - $i) / 2) . '</span>/<span>Night</span></div>
                                <p>
                                </p>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[' . $i . ']">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quant[' . $i . ']" id="quan_' . $i . '" class="form-control input-number" value="0" min="0" max="10">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[' . $i . ']">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        ';
                    } ?>
            <?php echo '</div><br><a name="" id="subb" class="btn btn-primary" href="#" role="button">Book Now</a></div>';
            ?><?php 
        }   ?><?php 
    } 
    ?>
    <br>
<br>


<footer class="jumbotron bg-dark" style="color:white; margin-bottom:0">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 col-lg-6">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">We strive hard to serve you the best of us !</h2>
          <p><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Lobortis mattis aliquam faucibus purus in massa tempor nec feugiat.
               </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Contact</h2>
          <ul class="list-unstyled open-hours">
            <li class="d-flex"><span>Email - abc@xyz.com</span></li>
            <li class="d-flex"><span>Contact - +91123456789</span></li>
            <li class="d-flex"><span>Fax - 4345 2342</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        function abc() {
            if (($('#quan_0').val() + $('#quan_1').val() + $('#quan_2').val() + $('#quan_3').val() + $('#quan_4').val() + $('#quan_5').val() >= 1)) {
                $('#subb').show();
            } else {
                $('#subb').hide();
            }
        };
        $('#subb').hide();
        $('#quan_0').change(function() {
            abc();
        })
        $('#quan_1').change(function() {
            abc();
        });
        $('#quan_2').change(function() {
            abc();
        });
        $('#quan_3').change(function() {
            abc();
        });
        $('#quan_4').change(function() {
            abc();
        });
        $('#quan_5').change(function() {
            abc();
        });
        $("#subb").on("click", function() {
            let price=parseInt($('#price_0').html())*$('#quan_0').val()+parseInt($('#price_1').html())*$('#quan_1').val()+parseInt($('#price_2').html())*$('#quan_2').val()+parseInt($('#price_3').html())*$('#quan_3').val()+parseInt($('#price_4').html())*$('#quan_4').val()+parseInt($('#price_5').html())*$('#quan_5').val();
            let statement = `${$('#typee_0').html()} * ${$('#quan_0').val()} , 
            ${$('#typee_1').html()} * ${$('#quan_1').val()} , 
            ${$('#typee_2').html()} * ${$('#quan_2').val()} , 
            ${$('#typee_3').html()} * ${$('#quan_3').val()} , 
            ${$('#typee_4').html()} * ${$('#quan_4').val()} , 
            ${$('#typee_5').html()} * ${$('#quan_5').val()}`;
            let today = new Date();
            let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            let dateTime = date+' '+time;
                $.ajax({
                    type: "POST",
                    url: "record.php",
                    data: 'statement=' + statement + '&time=' + dateTime + '&price=' + price + '&h_name='+ $('#h_name').html(),
                    success: function(data) {
                        alert("booking sucessfull");
                        window.location.replace("https://localhost/WT/HomePage/");
                    }
                });
        });
    })
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
</script>

</html>