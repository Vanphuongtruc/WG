<!DOCTYPE html>
<html lang="en">
<head>
  <title>EllisDee</title>
  <?php
  session_start();
  include 'tools.php';
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="font/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
  
</head>
<style>
.error{
  color:red;
}
</style>
<!-- validate the inputs from user -->
<?php

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialChars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if( empty($_POST["username"])){
      $nameErr = "Name is required";
  }elseif(!preg_match("/^[a-zA-Z ]*$/",$name=test_input($_POST["username"]))){
      $nameValue= $_POST["username"];
      $nameErr="only letters and space allowed";
  }else{
      $color1= "green";
      $nameValue= $_POST["username"];

  }
  if( empty($_POST["email"])){
    $emailErr = "Email is required";
}elseif(!filter_var($email = test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)){
    $emailValue= $_POST["email"];
    $emailErr="Invalid email format";
}else{
    $color2= "green";
    $emailValue= $_POST["email"];

}
if( empty($_POST["mobile"])){
  $mobileErr = "Mobile is required";
}elseif(!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$mobile=test_input($_POST["mobile"]))){
  $mobileValue= $_POST["mobile"];
  $mobileErr="Australian mobile only.";
}else{
  $color3= "green";
  $mobileValue= $_POST["mobile"];

}
if( empty($_POST["creditcard"])){
  $creditcardErr = "Creditcard is required";
}elseif(!preg_match("/^[0-9]{14,19}$/",$creditcard=test_input($_POST["creditcard"]))){
  $creditValue= $_POST["creditcard"];
  $creditErr="invalid creditcard.";
}else{
  $color4= "green";
  $creditValue= $_POST["creditcard"];

}

$STAvalue= $_POST["STA"];
$STPvalue= $_POST["STP"];
$STCvalue= $_POST["STC"];
$FCAvalue= $_POST["FCA"];
$FCPvalue= $_POST["FCP"];
$FCCvalue= $_POST["FCC"];
$STA = 0;
$STP = 0;
$STC = 0;
$FCA = 0;
$FCP = 0;
$FCC = 0;
function totalPrice($number,$string){
  if(!empty($number)){
    $string = $number;
  }
}
totalPrice($STAvalue,$STA);
totalPrice($STPvalue,$STP);
totalPrice($STCvalue,$STC);
totalPrice($FCAvalue,$FCA);
totalPrice($FCPvalue,$FCP);
totalPrice($FCCvalue,$FCC);

$valueArray = array('STA', 'STP', 'STC', 'FCA', 'FCP', 'FCC');
foreach($valueArray as $value){
  if(!empty($_POST[$value])){
    $priceErr = "";
    $color5 = "green";
  }elseif($color5 != "green"){
    $priceErr = "specific number of people needed to be clarified";
  }
}
if(!empty($_POST['movieName'])){
  $color6="green";
  $movieErr ="";
}else{
  $movieErr = "choose your movie first";
}

    if($color1 =="green" && $color2 =="green" && $color3 =="green" && $color4 =="green" && $color5 =="green" && $color6="green"){
      $_SESSION = $_POST;
      header('location: receipt.php');
      


} 
} 

?>

<body>




  <!--go to top button-->
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <div class="icon">
      <span class="flaticon-up-arrow"></span>
    </div>
  </button>
<!--end-->

    <!--Navigator-->
    <nav class="navbar navbar-expand-md   bg-light sticky-top">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse-target">
          <i class="fa fa-caret-square-o-down" style="font-size:36px"></i>
      </button>
      <div class="collapse navbar-collapse navigation" id="collapse-target">
          <a class="navbar-brand"><img style="height: 55px;"src="img/ellisdee.jpg"></a>  
          <ul class="navbar-nav" id="navlink">
            
              <li class="nav-item">
                  <a class="nav-link scroll" href="#about-us-section">About us</a>
              </li>
            
           
              <li class="nav-item">
                  <a class="nav-link scroll" href="#price-section">Price Section</a>
              </li>
            
            
              <li class="nav-item">
                  <a class="nav-link scroll" href="#now-showing-section">Now showing</a>
              </li>
            
           
            
              <li class="nav-item">
                  <a class="nav-link scroll" href="#synopsis-area-section">Synopsis Area</a>
              </li>
            
            
              <li class="nav-item">
                  <a class="nav-link scroll" href="#booking-area-section">Booking Area</a>
              </li>
            
             
          </ul>
          <ul>
            <a href="https://www.w3schools.com/icons/fontawesome_icons_webapp.asp">
              <button type="button" class="btn btn-secondary border rounded">Contact us</button>
            </a>
          </ul>
      </div>
  </nav>
  <!--end navigator-->

  <!--about us section-->
   <div id="about-us-section"class="about-us ">
        <div class="container bg1">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 ">
                    <div class="section-tittle bgplus">
                        <h1>About us</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 ">
                <div class="single-do text-center mb-30">
                    <div class="icon">
                        <span class="flaticon-tools"></span>
                    </div>
                    <div class="do-caption" >
                        <h3>Improvement</h3>
                        <p>The cinema has reopened after 6 months of extensive improvements and renovations. We have upgraded our facilities in order to provide customers with best movies experiences.</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  ">
                
                    <div class="single-do text-center mb-30">
                        <div class="icon ">
                            <span class="flaticon-armchair "></span>
                        </div>
                        <div class="do-caption">
                            <h3>New seat</h3>
                            <p>There are new seats: standard seats and reclinable first class seats. Customers can now feel more comfortable while enjoying the movie. Seat Prices are provided below.</p>
                        </div>
                    </div>
                
            </div>
            <div class="col-lg-3 col-md-6 ">
                
                    <div class="single-do text-center mb-30">
                        <div class="icon ">
                            <span class="flaticon-cinema "></span>
                        </div>
                        <div class="do-caption bgplus">
                            <h3>Sound upgraded</h3>
                            <p>The projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos sound, provide the best sound, picture and environment for any movie - letting customers into another reality and surender to the story. See <a href="https://www.dolby.com/us/en/cinema ">Dolby</a> for more information.</p>
                        </div>
                    </div>
                
            </div>
        </div>
        <br>
        
        <br>
        <br>
        <!--new seats pictures-->
        <div class="bg3"></div>
        <div class="container " id="About-us">
              <div class="row d-flex align-items-end justify-content-center text-center bg1">
                <div class="col-lg-12 col-md-12 ">
                    <div class="standard-seats-cap bg2">
                        <h4>Images for our new seat</h4>
                        <p>Design-led aesthetics, supreme comfort and ultimate luxury.</p>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row viewport70 bg3">
                      <div class="col-sm-12">
                        <div id="slide" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px; margin: auto;">
                                        <img class="card-img-top"src="https://www.profurn.com.au/static/uploads/images/paragon-755-wfdvvithdlib.jpg?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body">
                                          <h5>Standard Adult</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px;">
                                        <img class="card-img-top"src="https://www.profurn.com.au/static/uploads/images/paragon-918-wfytxehcfjuv.jpg?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body">
                                          <h5>Standard Concession</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px;">
                                        <img class="card-img-top"src="https://www.profurn.com.au/static/uploads/images/ariel-3-wfxcaxqodbei.jpg?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body">
                                          <h5>Standard Child</h5>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                
                            <div class="carousel-item">
                              <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px;margin: auto;">
                                        <img class="card-img-top"src="https://www.profurn.com.au/static/uploads/images/eva-wfkuumyspytw.jpg?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body r">
                                          <h5>First Class Adult</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px;">
                                        <img class="card-img-top "src="https://www.profurn.com.au/static/uploads/images/paragon-755-wfdvvithdlib.jpg?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body">
                                          <h5>First Class Conssesion</h5>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                      <div class="card viewport50" style="width: 300px;">
                                        <img class="card-img-top"src="https://www.profurn.com.au/static/uploads/images/dory-wfqfotvqxrog.JPG?mode=max&upscale=false&width=255" alt="">
                                        <div class="card-body">
                                          <h5>First Class Child</h5>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            
                          <a href="#slide" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon pink"></span>
                          </a>
                          <a href="#slide" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon pink"></span>
                          </a>
                
                        </div>
                      </div>
                    </div>
                 </div>
              </div>
              
            </div>
          </div>
    <!--end aboutus section-->
    <div class="container">
      <div class="parallex1"></div>
    </div>
    <!--price section area--> 
   <div id="price-section"class="price-section-area ">
    <div class="container bg3">
      <div class="row d-flex  justify-content-center  bg2">
        <div class="col-lg-10">
          <div class="section-tittle bgplus">
            <h1>Price Section</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex viewport150 bg2">
      <table class="table table-bordered viewport70">
        <tr class="table-bordered">
            <td class="table_cell1 border-dark"><h5>Seat Type<h5></td>
            <td class="table_cell2 border-dark"><h5>Seat Code</h5></td>
            <td class="table_cell3 border-dark"><h5>All day Monday and Wednesday AND 12pm on Weekdays</h5></td>
            <td class="table_cell4 border-dark"><h5>All other times</h5></td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">Standard Adult</td>
            <td class="table_cell1_data border-dark">STA</td>
            <td class="table_cell1_data border-dark">12.00</td>
            <td class="table_cell1_data border-dark">19.80</td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">Standard Concession</td>
            <td class="table_cell1_data border-dark">STP</td>
            <td class="table_cell1_data border-dark">11.50</td>
            <td class="table_cell1_data border-dark">	
                17.50</td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">Standard Child            </td>
            <td class="table_cell1_data border-dark">STC</td>
            <td class="table_cell1_data border-dark">14.00</td>
            <td class="table_cell1_data border-dark">	
                15.30</td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">First Class Adult</td>
            <td class="table_cell1_data border-dark">	
                FCA</td>
            <td class="table_cell1_data border-dark">24.00</td>
            <td class="table_cell1_data border-dark">	
                30.00</td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">First Class Concession</td>
            <td class="table_cell1_data border-dark">	
                FCP</td>
            <td class="table_cell1_data border-dark">22.50</td>
            <td class="table_cell1_data border-dark">	
                27.00</td>
        </tr>
        <tr class="table-bordered">
            <td class="table_cell1_data border-dark">First Class Child</td>
            <td class="table_cell1_data border-dark">	FCA</td>
            <td class="table_cell1_data border-dark">21.00</td>
            <td class="table_cell1_data border-dark">24.00</td>
        </tr>
      </table>
      <div class="row bgplus">
        <span style="margin-left: 10cm;"><h5 class="text-center border rounded border-dark bg-warning"><span style="padding: 1cm;">Make a booking for Weekdays-12pm  to get a DISCOUNT right now!!</span></h5></span>
      </div>
    </div>
    </div>
    
    <div class="container">
        <div class="parallex2"></div>
      </div>
      
    <!--now showing section-->
    <div class="nowshowing-area" id="now-showing-section" onload="todayDate()">
      <div class="container bg3 justify-content-between" style="background-position: 5cm;">
        <div class="row d-flex justify-content-center bg1">
          <div class="col-lg-10 "> 
              <div class="section-tittle ">
                  <h1>Now Showing</h1>
              </div>
          </div>
      </div>
      <div class="row d-flex justify-content-start">
        <div class="col-lg-6">
          <table class="border border-dark">
            <tr>
                <td rowspan="2">
                    <div id="table-card "class="card">
                        <a href = #synopsis-area-section id='button1' onclick="myFunction1()"><img src="img/end game1.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction1()" > More details</a>
                    </div>
                </td>
                <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-Avengers">Avengers: Eng Game-T18</h4>
                    <br>
                    
                    <ul><button type="button" class="btn btn-primary">12:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">15:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">18:30</button></ul>
                    <ul><button type="button" class="btn btn-primary">21:00</button></ul>
                   
                </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6">
          <table class="border border-dark">
              <tr>
                  <td rowspan="2">
                      <div id="table-card "class="card">
                        <a href = #synopsis-area-section id='button2' onclick="myFunction2()"><img src="img/dumbo.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction2()"> More details</a>
                      </div>
                  </td>
                  <td class="border-top border-right border-bottom border-dark " ><h4 id='movie-Dumbo'>Dumbo-T12</h4>
                      <br>
                      <br>
                      <ul><button type="button" class="btn btn-primary">12:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">15:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">18:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">21:00</button></ul>
                  </td>
              </tr>
          </table>
        </div>
      </div>
      <br>
      <div class="row d-flex justify-content-start">
        <div class="col-lg-6">
          <table class="border border-dark">
            <tr>
                <td rowspan="2">
                    <div id="table-card "class="card">
                      <a href = #synopsis-area-section onclick="myFunction3()"><img src="img/frozenII.png" alt="Avatar" style="height: 8cm;" onclick="myFunction3()"> More details</a>
                    </div>
                </td>
                <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-FrozenII">Frozen II-T9</h4>
                    <br>
                    <br>
                    <ul><button type="button" class="btn btn-primary">12:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">15:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">18:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">21:00</button></ul>
                </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6">
          <table class="border border-dark">
              <tr>
                  <td rowspan="2">
                      <div id="table-card "class="card">
                        <a href = #synopsis-area-section onclick="myFunction4()"><img src="img/birdsofprey.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction4()"> More details</a>
                      </div>
                  </td>
                  <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-BirdsOfPrey">Birds Of Prey-T16</h4>
                      <br>
                      <br>
                      <ul><button type="button" class="btn btn-primary">12:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">15:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">18:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">21:00</button></ul>
                  </td>
              </tr>
          </table>
        </div>
      </div>
      <br>  
      <div class="row d-flex justify-content-start">
        <div class="col-lg-6">
          <table class="border border-dark">
            <tr>
                <td rowspan="2">
                    <div id="table-card "class="card">
                        <a href="#synopsis-area-section" onclick="myFunction5()"><img src="img/joker.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction5()">More details</a>
                    </div>
                </td>
                <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-Joker">Joker-R</h4>
                    <br>
                    <br>
                    <ul><button type="button" class="btn btn-primary">Fri - 11:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 14:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 19:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 20:00</button></ul>
                </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6">
          <table class="border border-dark">
              <tr>
                  <td rowspan="2">
                      <div id="table-card "class="card">
                          <a href="#synopsis-area-section" onclick="myFunction6()"><img src="img/parasite.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction6()">More details</a>
                      </div>
                  </td>
                  <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-Parasite">Parasite-R</h4>
                      <br>
                      <br>
                      <ul><button type="button" class="btn btn-primary">Fri - 13:45</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 19:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 19:45</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 20:00</button></ul>
                  
                  </td>
              </tr>
          </table>
        </div>
      </div> 
      <br> 
      <div class="row d-flex justify-content-start">
        <div class="col-lg-6">
          <table class="border border-dark">
            <tr>
                <td rowspan="2">
                    <div id="table-card " class="card">
                        <a href="#synopsis-area-section" onclick="myFunction7()"><img src="img/invisibleman.jpg" alt="Avatar" style="height: 8cm;" onclick="myFuction7()">More details</a>
                    </div>
                </td>
                <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-TheInvisibleMan">The Invisible Man-R</h4>
                    <br>
                    <br>
                    <ul><button type="button" class="btn btn-primary">Fri - 10:30</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 15:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 16:00</button></ul>
                    <ul><button type="button" class="btn btn-primary">Fri - 19:00</button></ul>
                </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6">
          <table class="border border-dark">
              <tr>
                  <td rowspan="2">
                      <div id="table"class="card">
                          <a href="#synopsis-area-section" onclick="myFunction8()" ><img src="img/weatheringwithyou.jpg" alt="Avatar" style="height: 8cm;" onclick="myFunction8()">More details</a>
                      </div>
                  </td>
                  <td class="border-top border-right border-bottom border-dark " ><h4 id="movie-WeatheringWithYou">Weathering With You-NR</h4>
                      <br>
                      
                      <ul><button type="button" class="btn btn-primary">Fri - 10:00</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 13:30</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 15:30</button></ul>
                      <ul><button type="button" class="btn btn-primary">Fri - 17:00</button></ul>
                      
                  </td>
              </tr>
          </table>
        </div>
      </div>        
                    
            
    </div>
    </div>
    <!--end now showing-->
    
  
    <!--synopsis area section-->
  <div class="container">
    <div class="parallex4"></div>
  </div>
  <div id="synopsis-area-section"class="synopsis-area viewport150">
    <div class="container bg3">
      <div class="row d-flex  justify-content-center  bg2">
        <div class="col-lg-10 ">
          <div class="section-tittle  bgplus">
            <h1>Synopsis Area</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 offset-md-1">
          <h3 id='movie0'>Joker</h3>
          
        </div>
        <div class="col-md-5 offset-md-1">
          <p style="display: inline; font-size: x-large;" >Rating:    </p> 
          <h3 id="rating" style="display: inline;">R</h3>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4  ">
        <h4>Plot Description <div class="icon bg2 "> <span style="font-weight: 400;"class="flaticon-popcorn"></span></div></h4>
        <p id="description">
          "Joker" centers around the iconic arch nemesis and is an original, standalone fictional story not seen before on the big screen. Phillips' exploration of Arthur Fleck, who is indelibly portrayed by Joaquin Phoenix, is of a man struggling to find his way in Gotham's fracturedsociety. A clown-for-hire by day, he aspires to be a stand-up comic at night...but finds the joke always seems to be on him. Caught in a cyclical existence between apathy and cruelty, Arthur makes one bad decision that brings about a chain reaction of escalating events in this gritty character study.
        </p>
      </div>
      <div class="col-md-4 offset-md-1 bg4 align-items-start">
        <iframe style="margin-top: 1cm" width="500" height="275" src="https://www.youtube.com/embed/zAGVQLHvwOY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="trailer" embedded=true></iframe>  
        <p><span id= 'comment' style="font-style: italic;">*strong bloody violence, disturbing behavior, language and brief sexual images)</p>
          </span>
      </div>
    <div class="row">
      <div class="col-md-5">
        <h3 class="text-start" style="display: inline;">Make a booking on:
          <form type="hidden" name="date" class="text-start"> 
            <select id="mySelect" >
            <option id="1" >Monday</option>
            <option >Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>       
            <option>Saturday</option>
            <option>Sunday</option>
           </select>
          </form>
          </h3>
      </div>
      <div class="col-md-7 align-items-end">
        <div class="btn-group btn-group-lg" type="hidden" role="group" aria-label="Basic example">
          <button  onclick="discountedPrice1()" class="btn  btn-secondary border rounded" target="_blank" id="">12pm</button>
          <button type="button" class="btn btn-secondary border rounded" onclick="discountedPrice2()" id="" >15pm</button>
          <button type="button" class="btn btn-secondary border rounded" onclick="discountedPrice3()" id="">18pm</button>
          <button type="button" class="btn  btn-secondary border rounded" onclick="discountedPrice4()" id="">21pm</button>
          
        </div>
      </div>
    </div>
  </div>
  </div>
    <!--end synopsis area section-->
    <br>
    <br>
    <br>
    <!--booking area section-->
    <div id="booking-area-section" class="booking-area-section ">
      <div class="container bg3">
        <div class="row d-flex  justify-content-center  bg1">
          <div class="col-lg-10">
            <div class="section-tittle">
              <h1>Booking Area</h1>
              <br>
            </div>
            
          </div>
        </div>
      </div>
      <h1><span style="text-align: center; margin-left: 5cm; font-weight: 400;"id="movieName"><?php echo $_POST['movieName'];?></span><span style="text-align: center; font-weight: 400;" id="today"></span></h1>
      <span class="error" style="color:<?php echo $color6?>; font-size:20px; margin-left:5cm">*<?php echo $movieErr;?></span>

      <div class="row">
          <div class="col-2 offset-1">
              <h3>Standard</h3>
              <form class="form-horizontal"  role="form" enctype="multipart/form-data" id="form2" name="inputForm" novalidate method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="well">
                  <div class="form-group">
                      <label class="col-xs-3 control-label"><strong>Adult</strong>&nbsp;</label>
                      <div class="col-xs-2">
                          <select class="form-control" id="seats-STA" onchange="totalPrice()" name="STA" value="<?php echo $STAvalue?>">
                              <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($STAvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($STAvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($STAvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($STAvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($STAvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($STAvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($STAvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($STAvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($STAvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($STAvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-xs-3 control-label"><strong>Concession</strong>&nbsp;</label>
                      <div class="col-xs-2">
                          <select class="form-control" id="seats-STP" onchange="totalPrice()" name="STP"  value="<?php echo $STPvalue?>">
                          <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($STPvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($STPvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($STPvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($STPvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($STPvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($STPvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($STPvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($STPvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($STPvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($STPvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-xs-3 control-label"><strong>Child</strong>&nbsp;</label>
                      <div class="col-xs-2">
                          <select class="form-control" id="seats-STC" onchange="totalPrice()" name="STC"  value="<?php echo $STCvalue?>">
                          <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($STCvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($STCvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($STCvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($STCvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($STCvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($STCvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($STCvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($STCvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($STCvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($STCvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                          </select>
                      </div>
                  </div>
                  </div>
              
          </div>
          <div class="col-2">
              <h3>First class</h3>
              
                  <div class="well">
                      <div class="form-group">
                          <label class="col-xs-3 control-label"><strong>Adult</strong>&nbsp;</label>
                              <div class="col-xs-2">
                                  <select class="form-control" id="seats-FCA" onchange="totalPrice()" name="FCA"  value="<?php echo $FCAvalue?>">
                                  <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($FCAvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($FCAvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($FCAvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($FCAvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($FCAvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($FCAvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($FCAvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($FCAvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($FCAvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($FCAvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                                  </select>
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-xs-3 control-label"><strong>Concession</strong>&nbsp;</label>
                              <div class="col-xs-2">
                                  <select class="form-control" id="seats-FCP" onchange="totalPrice()" name="FCP"  value="<?php echo $FCPvalue?>">
                                  <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($FCPvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($FCPvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($FCPvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($FCPvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($FCPvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($FCPvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($FCPvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($FCPvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($FCPvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($FCPvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                                  </select>
                              </div>
                      </div>
                      <div class="form-group">
                          <label class="col-xs-3 control-label"><strong>Child</strong>&nbsp;</label>
                              <div class="col-xs-2">
                                  <select class="form-control" id="seats-FCC" onchange="totalPrice()" name="FCC"  value="<?php echo $FCCvalue?>">
                                  <option onchange="totalPrice()" value=''>--Please Select--</option>
                              <option onchange="totalPrice()"value="1" <?php if($FCCvalue=="1"){echo "selected=\"selected\"";} ?>>1</option>
                              <option onchange="totalPrice()"value="2"<?php if($FCCvalue=="2"){echo "selected=\"selected\"";} ?>>2</option>
                              <option onchange="totalPrice()"value="3"<?php if($FCCvalue=="3"){echo "selected=\"selected\"";} ?>>3</option>
                              <option onchange="totalPrice()"value="4"<?php if($FCCvalue=="4"){echo "selected=\"selected\"";} ?>>4</option>
                              <option onchange="totalPrice()"value="5"<?php if($FCCvalue=="5"){echo "selected=\"selected\"";} ?>>5</option>
                              <option onchange="totalPrice()"value="6"<?php if($FCCvalue=="6"){echo "selected=\"selected\"";} ?>>6</option>
                              <option onchange="totalPrice()"value="7"<?php if($FCCvalue=="7"){echo "selected=\"selected\"";} ?>>7</option>
                              <option onchange="totalPrice()"value="8"<?php if($FCCvalue=="8"){echo "selected=\"selected\"";} ?>>8</option>
                              <option onchange="totalPrice()"value="9"<?php if($FCCvalue=="9"){echo "selected=\"selected\"";} ?>>9</option>
                              <option onchange="totalPrice()"value="10"<?php if($FCCvalue=="10"){echo "selected=\"selected\"";} ?>>10</option>
                                  </select>
                              </div>
                              <br>
                             
                          <div class="form-group">
                          <label for="username"><strong>Price</strong></label>
                          <h3 class="border"id="totalPrice" name="totalprice" value="" ><?php if(empty($_POST["price"])){
                            echo "$0.00";
                          }else{
                            echo $_POST["price"];
                          }
                          ?></h3>
                          <span class="error" style="color:<?php echo $color5?>; font-size:15px;">*<?php echo $priceErr;?></span>
                          <input type="hidden" name="price" value="<?php echo $STA*19.8 + $STC*17.5 + $STP*15.3 + $FCA*30 + $FCP*27 + $FCC*24?>" id="slider_input"/>
                          <input type="hidden" name="movieName" value="" id="MOVIE"/>
                          
                 

                      </div></div>
                  </div>
              
          </div>
          
          
     
         <div class="col-lg-5 offset-1 align-item-start justify-content-start">
              
      
         <div class="form-control">
                      <label for="username">Name</label>
                      <input type="text" placeholder="Enter your name" id="username" name="username" value='<?php echo $nameValue?>' />
                      <i class="fa fa-check-circle"></i>
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                      <span class="error" style="color:<?php echo $color1?>">*<?php echo $nameErr;?></span>
                  </div>
                  <div class="form-control">
                      <label for="username">Email</label>
                      <input type="email" placeholder="Ex: abc@def.com" id="email" name="email"  value="<?php echo $emailValue?>"/>
                      <i class="fa fa-check-circle"></i>
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                      <span class="error" style="color:<?php echo $color2?>">*<?php echo $emailErr;?></span>
                  <div class="form-control">
                  <label for="username">Mobile</label>
                      <input type="tel" placeholder="Enter mobile number" id="mobile" name="mobile"  value="<?php echo $mobileValue?>"/>
                      <i class="fa fa-check-circle"></i>
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                      <span class="error" style="color:<?php echo $color3?>">*<?php echo $mobileErr;?></span>
                  </div>
                  <div class="form-control">
                  <label for="username">Credit card</label>
                      <input type="text" placeholder="Enter credit card" id="creditcard" name="creditcard"  value="<?php echo $creditValue?>"/>
                      <i class="fa fa-check-circle"></i>
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                      <span class="error" style="color:<?php echo $color4?>">*<?php echo $creditcardErr;?></span>
                  </div>
                  <input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
 
                  <br>
                  <br>
                  <button type="submit" value="submit" name="submit" onclick="submitForms()"class="btn btn-lg">Order</button>
              </form>
          </div>
          
      </div>
  </div>
    
  <script src="script.js">
  
  </script>
    <!--end section-->
</body>
<br><br><br><br>
<!--Footer-->
<footer>
  <div class="footer-main" style="background-image: url(img/footer_bg.png);">
    <div class="footer-area footer-padding">
        <div class="container device-width">
            <div class="row d-flex justiy-content-between">
                <div class="col-lg-4 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-logo">
                                <img src="img/ellisdee.jpg" alt="">
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">
                                        123B ABCD street, Ben Nghe, District 1
                                        <br>
                                        Ho Chi Minh, Vietnam
                                    </p>
                                    <p class="info2">ellisdee@gmail.com</p>
                                </div>
                            </div>
                            <div class="footer-social">
                                <a href="#">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-behance"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-globe"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-7">
                    <div class="single footer-caption mb-50">
                        <div class="footer-tittle">
                             <h4>Contact 1</h4>
                            <p>Full name: Nguyen Tien Dat</p>
                            <p>Contact email: s3826227@rmit.edu.vn</p>
                            <p>Phone number: 0908387273</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-7">
                    <div class="single footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Contact 2</h4>
                            <p>Full name: Van Phuong Truc</p>
                            <p>Contact email: s3818484@rmit.edu.vn</p>
                            <p>Phone number: 0587145437</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-12">
                    <div class="footer-link text-center">
                        <p> This is the link to our Github <i class="fa fa-github"></i> reposity: <a href="https://github.com/Vanphuongtruc/wp">Github repository</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</footer>
<h3> test my post </h3>

<?php 

preShow($_POST); 
php2js($_POST,'pricesArrayJS');
echo $STAvalue;

?>
<h3> My code </h3>
<?php printMyCode()?>

<form>
<input type='submit' name='session-reset' value='Reset the session' >
</form>
