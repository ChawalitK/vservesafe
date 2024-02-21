<?php
session_start();

if(!isset($_SESSION['firstname'])){
  header("Location:login.php");
}
// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("php/html_head.php");?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:ital@0;1&display=swap" rel="stylesheet"> 

<style type="text/css">
  body{
    font-family: 'Sarabun', sans-serif;
  }

  .breadcrumb.wizard {
    padding: 0px;
	background: #D4D4D4;
	list-style: none;
	overflow: hidden;
    margin-top: 20px;
  font-size: 10px;
}
.breadcrumb.wizard>li+li:before {
	padding: 0;
}
.breadcrumb.wizard li {
	float: left;
}
.breadcrumb.wizard li.active a {
	background: brown;                   /* fallback color */
	background: #ffc107 ;
}
.breadcrumb.wizard li.completed a {
	background: brown;                   /* fallback color */
	background: hsla(153, 57%, 51%, 1);
}
.breadcrumb.wizard li.active a:after {
	border-left: 30px solid #ffc107 ;
}
.breadcrumb.wizard li.completed a:after {
	border-left: 30px solid hsla(153, 57%, 51%, 1);
}

.breadcrumb.wizard li a {
	color: white;
	text-decoration: none;
	padding: 10px 0 10px 45px;
	position: relative;
	display: block;
	float: left;
}
.breadcrumb.wizard li a:after {
	content: " ";
	display: block;
	width: 0;
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid hsla(0, 0%, 83%, 1);
	position: absolute;
	top: 50%;
	margin-top: -50px;
	left: 100%;
	z-index: 2;
}
.breadcrumb.wizard li a:before {
	content: " ";
	display: block;
	width: 0;
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid white;
	position: absolute;
	top: 50%;
	margin-top: -50px;
	margin-left: 1px;
	left: 100%;
	z-index: 1;
}
.breadcrumb.wizard li:first-child a {
	padding-left: 15px;
}
.breadcrumb.wizard li a:hover { background: #ffc107  ; }
.breadcrumb.wizard li a:hover:after { border-left-color: #ffc107   !important; }



  
</style>
</head>
<body>
<script src="js/demo-theme.min.js"></script>
<div class="page">
  <!-- Navbar -->
  <?php include_once("php/html_menu.php");?>
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">



      <div class="col-md-12 col-lg-12 p-3" style="background-image: url(./img/bg-banner.png);opacity: 0.8;">
      <!-- <div class="col-md-12 col-lg-12"> -->

        <div class="col text-center text-white">
          <!-- Page pre-title -->
          <h2 class="page-title" style="display:contents;">
            Food Safety Management
          </h2>
          <div class="page-pretitle text-white">
            Services Form
          </div>

        </div>
      </div>

 

      <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav> -->

<!-- <div class="row">
		<ul class="breadcrumb wizard">
			<li class="completed"><a href="javascript:void(0);">Personal Contact</a></li>
			<li class="completed"><a href="javascript:void(0);">Educational/Experience</a></li>
			<li><a href="javascript:void(0);">Photo Upload</a></li>
			<li class=""><a href="javascript:void(0);">Payment</a></li>
		</ul>
	</div> -->


        <!-- <div class="row g-2 align-items-center">
          <div class="col">
            <h3 class="page-title" style="font-size:15px;color:#333333;">
              Home / SHEDEIN / Food Safety Management
            </h3>
          </div>
        </div> -->
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <!-- <div class="container-xl">
        <div class="card">
          <div class="card-body">
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasStart" role="button" aria-controls="offcanvasStart">
              Toggle start offcanvas
            </a>
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">
              Toggle end offcanvas
            </a>
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasTop" role="button" aria-controls="offcanvasTop">
              Toggle top offcanvas
            </a>
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasBottom">
              Toggle bottom offcanvas
            </a>
          </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasStartLabel">Start offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">End offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasTopLabel">Top offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasBottomLabel">Bottom offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
      </div> -->


      <div class="container-xl">

<div class="col-12">
  <div class="row row-cards">

    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <a href="shedein_chilled_frozen_storage.php">
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/ChillFrozenTemForm.jpg)"></div>
        </a>
      </div>
    </div>
                    

    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/CoolingForm.jpg)"></div>
      </div>
    </div>


    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <a href="shedein_daily_food_deliveries.php">
          <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/DailyFoodDeliveriesForm.jpg)"></div>
        </a>
      </div>
    </div>


    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/FoodPlatingForm.jpg)"></div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/FoodThawingForm.jpg)"></div>
      </div>
    </div>


    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/HealthCheckForm.jpg)"></div>
      </div>
    </div>
                    

    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/HotColdHoldingService.jpg)"></div>
      </div>
    </div>


    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/InternalCookingTempForm.jpg)"></div>
      </div>
    </div>


    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <!-- Photo -->
        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./img/ReheatingForm.jpg)"></div>
      </div>
    </div>


  </div>
</div>

<br>
<br>
<br>

<!-- <div class="card">
  <div class="card-body">
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasStart" role="button" aria-controls="offcanvasStart">
      Toggle start offcanvas
    </a>
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">
      Toggle end offcanvas
    </a>
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasTop" role="button" aria-controls="offcanvasTop">
      Toggle top offcanvas
    </a>
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasBottom">
      Toggle bottom offcanvas
    </a>
  </div>
</div> -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title" id="offcanvasStartLabel">Start offcanvas</h2>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing 
elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque 
laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis 
repellat sit soluta unde. Aut!
    </div>
    <div class="mt-3">
      <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
        Close offcanvas
      </button>
    </div>
  </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title" id="offcanvasEndLabel">End offcanvas</h2>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing 
elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque 
laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis 
repellat sit soluta unde. Aut!
    </div>
    <div class="mt-3">
      <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
        Close offcanvas
      </button>
    </div>
  </div>
</div>
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title" id="offcanvasTopLabel">Top offcanvas</h2>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing 
elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque 
laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis 
repellat sit soluta unde. Aut!
    </div>
    <div class="mt-3">
      <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
        Close offcanvas
      </button>
    </div>
  </div>
</div>
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title" id="offcanvasBottomLabel">Bottom offcanvas</h2>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing 
elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque 
laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis 
repellat sit soluta unde. Aut!
    </div>
    <div class="mt-3">
      <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
        Close offcanvas
      </button>
    </div>
  </div>
</div>
</div>


    </div>
    <?php include_once("php/html_footer.php");?>
  </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="js/tabler.min.js" defer></script>
<script src="js/demo.min.js" defer></script>
</body>
</html>