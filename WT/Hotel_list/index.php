<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bookings</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            $("#search-button").on("click", function() {
                if($('#search-box').val()!='')
                {
                $.ajax({
                    type: "POST",
                    url: "readData.php",
                    data: 'keyword=' + $("#search-box").val(),
                    success: function(data) {
                        $("#filterbox").show();
                        $("#sortBox").show();
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
                };
            });
            $("#search-box").on("keyup", function() {
                $.ajax({
                    type: "POST",
                    url: "readSearch.php",
                    data: 'keyword=' + $(this).val(),
                    success: function(data) {
                        $("#suggestions").show();
                        $("#suggestions").html(data);
                    }
                });
            });
            $("#myRange").on("change", function() {
                let b;
                let a = document.getElementById('datad').value;
                switch (a) {
                    case 'Price':
                        b = " ORDER BY price DESC";
                        break;
                    case 'Stars':
                        b = " ORDER BY star_rating DESC";
                        break;
                    case 'Price and Stars':
                        b = " ORDER BY price,star_rating DESC";
                        break;
                    case 'Reviews':
                        b = " ORDER BY review_count DESC";
                        break;
                    case ' ':
                        b = " ";
                        break;
                    default:
                        b = " ";
                        break;
                }
                $.ajax({
                    type: "POST",
                    url: "sortData.php",
                    data: 'keyword=' + $('#search-box').val() + '&price=' + $('#myRange').val() + '&order=' + b + '&accomodation=' + $("#accomodation").val(),
                    success: function(data) {
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
            $("#accomodation").on("change", function() {
                let b;
                let a = document.getElementById('datad').value;
                switch (a) {
                    case 'Price':
                        b = " ORDER BY price DESC";
                        break;
                    case 'Stars':
                        b = " ORDER BY star_rating DESC";
                        break;
                    case 'Price and Stars':
                        b = " ORDER BY price,star_rating DESC";
                        break;
                    case 'Reviews':
                        b = " ORDER BY review_count DESC";
                        break;
                    case ' ':
                        b = " ";
                        break;
                    default:
                        b = " ";
                        break;
                }
                $.ajax({
                    type: "POST",
                    url: "sortData.php",
                    data: 'keyword=' + $('#search-box').val() + '&price=' + $('#myRange').val() + '&order=' + b + '&accomodation=' + $("#accomodation").val(),
                    success: function(data) {
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
            $("#datad").on("change", function() {
                let b;
                let a = document.getElementById('datad').value;
                switch (a) {
                    case 'Price':
                        b = " ORDER BY price DESC";
                        break;
                    case 'Stars':
                        b = " ORDER BY star_rating DESC";
                        break;
                    case 'Price and Stars':
                        b = " ORDER BY price,star_rating DESC";
                        break;
                    case 'Reviews':
                        b = " ORDER BY review_count DESC";
                        break;
                    case ' ':
                        b = " ";
                        break;
                    default:
                        b = " ";
                        break;
                }
                $.ajax({
                    type: "POST",
                    url: "sortData.php",
                    data: 'keyword=' + $('#search-box').val() + '&price=' + $('#myRange').val() + '&order=' + b + '&accomodation=' + $("#accomodation").val(),
                    success: function(data) {
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
        });

        function selectName(val) {
            $("#search-box").val(val);
            $("#suggestions").hide();
        }



function checkCookie(cname) {
      var username = getCookie(cname);
      if (username != "") {
      document.getElementById('logout').innerHTML='<img src="img/logoot.png" onclick="rec()" align="right" title="Logout" style="width:40px; height:40px;">';

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
    <div class="searchbox">
        <div class="container">
            <br>
            <form>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input id="search-box" type="text" class="form-control" placeholder="Enter name of city, area or hotel">
                        <div id="suggestions" style="display: block; position: absolute; width:100%; background: white; color: black; z-index: 3;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label>Check In</label>
                            <input id="checkin" type="date" class="form-control text-center">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label>Check Out</label>
                            <input id="checkout" type="date" class="form-control text-center">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label>Persons</label>
                            <label class="wrap">
                                <select id="persons" class="form-control dropdown">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <label style="color:transparent;">*</label>
                        <div class="form-group right-icon">
                            <input id="search-button" class="btn btn-success col-md-12" type="button" value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="container" id="filterbox" style="display:none;">
        <form>
            <div class="row filterbox">
                <div class="col-md-6">
                    <div class="form-group slidercontainer">
                        <label id="slideVal"></label>
                        <input type="range" min="2000" max="13000" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Accomodation</label>
                        <label class="filterdrop">
                            <select id="accomodation" class="form-control dropdown">
                                <?php 
                                require_once("dbcontroller.php");
                                $db_handle = new DBController();
                                $query ="SELECT type FROM accomodations";
                                $result = $db_handle->runQuery($query);
                                if(!empty($result)) 
                                {   ?>
                                <?php
                                foreach($result as $resdata) 
                                    { ?>
                                    <?php 
                                        echo '<option>'.$resdata['TYPE'].'</option> ';
                                    ?>
                                    <?php 
                                    }?><?php 
                                } ?>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="container" id="sortBox" style="display:none;">
        <div class="row">
            <div class="col-md-12">
                <label>Sort By:</label>
            </div>
        </div>
        <div class="row">
            <select name="datad" id="datad">
                <option hidden> </option>
                <option>Price</option>
                <option>Stars</option>
                <option>Price and Stars</option>
                <option>Reviews</option>
            </select>
        </div>
    </div>
    <br>
    <div id="DBResult" name="results" class="container hotelTable">
    </div>
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="./js/main.js">
    </script>

</html>