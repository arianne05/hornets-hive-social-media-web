<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
?>
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Change Password</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
  </head>

<body>

     
  
  <!--header-->
  <!--header-->
  <header class="main-header clearfix" role="header" style="background-color: #077a3b ">
    <div class="logo">
      <a href="index.php"><img src="assets/images/hornet.PNG" style="width: 15%;height: 15%;"></a>
    </div>
 
<div class="dropdown" 
style="position: absolute; 
left: 55%;
top: 20%; 
font-family: Lucida Console, Courier New, monospace;
">
      <button class="dropbtn" style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:15px; '>JOIN</button>
      <div class="dropdown-content">
      <a href="signin.php">Log In</a>
      <a href="signup.php">Sign Up</a>
      </div>
      </div>



      <button class="dropbtn"><a href="index.php" 
        style="position: absolute; 
              left: 61%; top: 37%; 
              font-family: Lucida Console, Courier New, monospace;">
              <img src="assets/images/home.ico" style="width: 15%;height: 15%;"> 
              HOME
              </a>
              </button>

        
          <div class="dropbtn">
          <a href="index.php" 
          style="position: absolute; 
          left: 75%; top: 37%; 
          font-family: Lucida Console, Courier New, monospace;">
          <img src="assets/images/contact.ico" style="width: 13%;height: 13%;">
          CONTACT
          </a>
        </div>
        


      
          <div class="dropbtn">
          <a href="index.php" 
          style="position: absolute; 
          left: 85%; top: 37%; 
          font-family: Lucida Console, Courier New, monospace;">
          <img src="assets/images/aboutus.ico" style="width: 13%;height: 13%;">
          ABOUT US
          </a>
        </div>
        
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">

<!--navigation-->
      
    </nav>
  </header>







  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/Cavite State University Main Campus Virtual Tour.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
             
             <div class="row">

 
<div class="row">
  <div class="col-sm-12">
    <div class="main-content">
      <div class="header">
        <h3 style="text-align: center; color: #facb0f;"><strong>Change Your Password.</strong></h3><hr>
      </div>
      <div class="l_pass">
        <form action="" method="post">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="pass" placeholder="New Password" required>
          </div><br>          
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" placeholder="Re-enter New Password" name="pass1" required>
          </div><br>
          <center><button id="signup" class="btn btn-info btn-lg" name="change" style="background-color: #facb0f;color:black;">Change Password</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
          </div>
      </div>
  </section>


  <footer>
    <div class="container" style="background-color:  #077a3b;">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2021 by Hornets Hive 
          
           | Design: <a href="https://www.facebook.com/john.lois.floro" rel="sponsored" target="_parent">Floro</a>
             <a href="https://www.facebook.com/arianne.quimpo" target="_parent">Quimpo</a> 
             <a href="https://itsmeellelanuza.github.io/" target="_parent">Lanuza</a> 
             <a href="https://www.facebook.com/dennise.siona" rel="sponsored" target="_parent">Siona</a> 
             <a href="https://www.facebook.com/janmcrae.soriano" rel="sponsored" target="_parent">Soriano</a> </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          if($(e.target).hasClass('external')) {
            return;
          }
          e.preventDefault();
          $('#menu').removeClass('active');
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>
</html>

<?php
  if(isset($_POST['change'])){

    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_id = $row['user_id'];
    
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

    if($pass == $pass1){
      if(strlen($pass) >= 6 && strlen($pass) <= 60){
        $update = "update users set user_pass='$pass' where user_id='$user_id'";

        $run = mysqli_query($con, $update);
        echo"<script>alert('Your Password is changed a moment ago')</script>";
        echo"<script>window.open('home.php', '_self')</script>";
      }
      else{
        echo"<script>alert('Your Password should be greater than 6 words')</script>";
      }
    }
      else{
        echo"<script>alert('Your Password did not match')</script>";
        echo"<script>window.open('change_password.php', '_self')</script>";
      }
    }
?>

<!--STYLE FOR NEW NAVIGATION-->
<style>
.dropbtn {
  background-color: #077a3b;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn a{
  color: white;

}

.dropbtn a:hover {
  color:  #fdd144;
}

.scroll-to-section{
  color: white;
}

.scroll-to-section a:hover{
 color:  #fdd144;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #fdd144}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3CB371;
}

.logo{
  position: absolute;
  top: -30%;
  left: -2%;
}

  
  .main-content{   
    border-style: none;
    padding: 30px 60px;
    margin: : 5px;
    height: 97%;
    background-color: rgba( 7 ,122 ,59, 0.5);
    
  }

  

  #signin{
    width: 40%;
    border-radius: 10px;
  }
  .overlap-text{
    position: relative;
  }
  .overlap-text a{
    position: absolute;
    top: 8px;
    right: 10px;
    font-size: 14px;
    text-decoration: none;
    font-family: 'Overpass Mono', monospace;
    letter-spacing: -1px;
  }
  .well {
    background-color: #077a3b;
    padding: 8px 10px;
    font-family: Arial, Baskerville, monospace;
    font-size: 18px;
      font-weight: 500;

  }




</style>