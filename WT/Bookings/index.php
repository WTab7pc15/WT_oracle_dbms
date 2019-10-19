<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css" />
    
<style>
      .navigbar {
      overflow: hidden;
      background-color: black;
      margin-top: -3.3%;
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
   <script>
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



      function checkCookie(cname) {
      var username = getCookie(cname);
      if (username != "") {
      document.getElementById('logout').innerHTML='<img src="logoot.png" onclick="rec()" align="right" title="Logout" style="width:40px; height:40px;">';

      }
      else {
      document.getElementById('logout').innerHTML="";
      }

      forRef(username);
      }
      function forRef(username){
      		if (username != "") {
      			document.getElementById('aNavig').innerHTML='<a href="../Hotel_list/" >Go Booking !</a><a href="#"data-toggle="modal" data-target="#myModal" >Feedback</a>';
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
</head>


    <body class="is-preload" onload="checkCookie('user')">


<!-- Modal -->
       <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title" style="margin-right:20%;"><b>Write to us...</b></h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               
             </div>
             <form class="contact2-form validate-form" action="../feedback.php" method="post">
     					<br><br>

              <h4><b>Subject:</b></h4>
     					<div class="wrap-input2" style="width:70%; margin-left:20%; margin-top:-6%;" >
     						<input class="input2" type="text" name="subject">
     						<span class="focus-input2"></span>
     					</div>

              <br><br>

              <h5>Feedback:</h5>
     					<div class="wrap-input2 validate-input" data-validate = "Message is required">
     						<textarea rows="5" class="input2" style="width:70%; margin-left:20%; margin-top:-5%;" name="message"></textarea>
     						<span class="focus-input2" data-placeholder="MESSAGE"></span>
     					</div>
              <br><br>
              <button style="margin-left:45%;" type="submit" class="btn btn-success">Send</button>
     				</form>
           </div>

         </div>
       </div>


<div class="navigbar">
         <a href="../HomePage">Home</a>
         <a href="../AboutFolder">About</a>
         <div class="aNavig" id="aNavig">
         </div>
         <div id="logout" class="log">
         </div>
      </div>

<br>

        <div class="container">
            <div class="row">
                <h4>Bookings</h4>
            </div>
            <div class=" table-responsive  text-nowrap">
                        <table class="alt table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Hotel</th>
                                    <th>Statement</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("dbcontroller.php");
                                $db_handle = new DBController();
                                $query = "SELECT Time,Statement,Price,hotel_name FROM bookings WHERE user_id = '".$_COOKIE['user']."' ORDER BY TIME DESC";
                                $result = $db_handle->runQuery($query);
                                if(!empty($result)) 
                                {   ?>
                                    <?php
                                    foreach($result as $resdata) 
                                    { ?>
                                        <?php 
                                        $stat = str_replace(",","<br>",$resdata['STATEMENT']);
                                        echo '<tr>
                                            <td>'.$resdata['TIME'].'</td>
                                            <td>'.$resdata['HOTEL_NAME'].'</td>
                                            <td>'.$stat.'</td>
                                            <td>'.$resdata['PRICE'].'</td>
                                        </tr>'
                                        ?><?php 
                                    }   ?><?php 
                                } ?>
                        </table>
                    </div>
        </div>
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
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>