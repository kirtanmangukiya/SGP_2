<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>A1 Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
   @keyframes fade {

 0% {
  opacity: 0;
 }
 100% {
  opacity: 1;
 }

 }

 * {
 padding: 0;

 border: 0;

 box-sizing: border-box;

 }

 body {
  height: 60%;
 }
 .slide-container {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 400px;
  margin: auto;
  position: relative;
 }

 .slide-container .slide {
  display: none;
  width: 100%;
 }

 .slide-container .slide.fade {
  animation: fade 0.5s cubic-bezier(0.55, 0.085, 0.68, 0.53) both;
 }

 .slide-container .slide img {
  width: 100%;
  }
  .slide-container .prev,
  .slide-container .next {
   cursor: pointer;
   position: absolute;
   top: 50%;
   width: auto;
   margin-top: -22px;
   padding: 16px;
   color: white;
   font-weight: bold;
   font-size: 20px;
   transition: all 0.6s ease;
   border-radius: 0 3px 3px 0;
   user-select: none;

  }
  .slide-container .prev:hover,

  .slide-container .next:hover {
   background-color: rgba(0, 0, 0, 0.8);
   color: white;

  }
  .slide-container .prev {
   left: 2px;
  }
  .slide-container .next {
   right: 2px;
  }

 .dots-container {
   display: flex;
   justify-content: center;
   align-items: center;
   padding: 0px;
  }

  .dots-container .dot {
   cursor: pointer;
   margin: 0px;
   width: 00px;
   height: 00px;
   color: #333; 
   border-radius: 00%;
   background-color: #dfd6ce;
  }
  .dots-container .dot.active {
   border: 2px solid green;
  }
  </style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">A1 Store</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge" >0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Login/Register</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<input type="submit" class="btn btn-warning" value="Login">
										<a href="customer_registration.php?register=1" style="color:white; text-decoration:none;">Create Account Now</a>
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				
				<div id="get_brand">
				</div>
				
			</div>
			<div class="col-md-8 col-xs-12">  

			<div class="slide-container">
      <div class="slide fade">
       <img src='1.png' alt=''>
      </div>
      <div class="slide fade">
       <img src='2.jpg' alt=''>
      </div>
      <a href="#" class="prev" title="Previous">&#10094</a>
      <a href="#" class="next" title="Next">&#10095</a>
      </div>
      <div class="dots-container">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      </div>

				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading">Top Products</div>
					<div class="panel-body">
						<div id="get_product">
							>
						</div>
						
					</div>


					<div class="panel-footer">&copy; <?php echo date("Y"); ?> &nbsp; &nbsp; &nbsp; &nbsp; A1 Store Team (Charusat) </div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>

<script>
  var currentSlide = 0;

 const slides = document.querySelectorAll(".slide")

 const dots = document.querySelectorAll('.dot')

 const init = (n) => {

  slides.forEach((slide) => {

  slide.style.display = "none"

  dots.forEach((dot) => {

  dot.classList.remove("active")

  })

 })

 slides[n].style.display = "block"

 dots[n].classList.add("active")

 }

 document.addEventListener("DOMContentLoaded", init(currentSlide))
  const next = () => {

  currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++

  init(currentSlide)

 }

 const prev = () => {

 currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--

 init(currentSlide)

 }

 document.querySelector(".next").addEventListener('click', next)

 document.querySelector(".prev").addEventListener('click', prev)
 dots.forEach((dot, index) => {

 dot.addEventListener("click", () => {

 init(index)

 currentSlide = i

 })

 })
 setInterval(() => {

 next()

 }, 9000);
  </script>
</html>
















































