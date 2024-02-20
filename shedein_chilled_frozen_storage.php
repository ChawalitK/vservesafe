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
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- <h2 class="page-title"> -->
            <h3 class="page-title" style="font-size:16px;color:#333333;">
              Home / SHEDEIN / Food Safety Management / Chilled/Frozen Storage Form
            <!-- </h3> -->
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">

      <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Chilled/Frozen Storage</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">List Records</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Activity</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                        <h1 class="">Chilled/Frozen Storage Form</h1>
                        <div>

                        <form class="row g-3">
    
                        <div class="col-md-6">
    <label for="inputCity" class="form-label">Department</label>

    <select id="inputState" class="form-select">
      <option selected>Select Department</option>
      <option>FB-IRD</option>
      <option>FB-Amaya</option>
      <option>FB-Banquet</option>
      <option>FB-Aqua Bar</option>
      <option>FB-Prego</option>
    </select>
    </div>
    <div class="col-md-6">
      <label for="inputState" class="form-label">Reporter</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Reporter">
    </div>


  <div class="col-md-3">
    <label for="inputState" class="form-label">Date</label>
    <input type="text" class="form-control" id="inputCity" placeholder="Date">
  </div>
  <div class="col-md-1">
    <label for="inputZip" class="form-label">Hours *</label>
    <select id="inputState" class="form-select">
      <option selected>HH</option>
      <option>00</option>
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
    </select>
  </div>
  <div class="col-md-1">
    <label for="inputZip" class="form-label">Minutes *</label>
    <select id="inputState" class="form-select">
    <option selected>MM</option>
      <option>00</option>
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
      <option>24</option>
      <option>25</option>
      <option>26</option>
      <option>27</option>
      <option>28</option>
      <option>29</option>
      <option>30</option>

    </select>
  </div>


    <div class="col-md-6 offset-md-1">
    <label for="inputCity" class="form-label">No. Freezer / Refrigerator *</label>

    <select id="inputState" class="form-select">
      <option selected>Select freezer/refrigerator</option>
      <option>AOP-KITC-067</option>
      <option>AOP-KITC-068</option>
      <option>AOP-KITC-069</option>
      <option>AOP-KITC-070</option>
    </select>


  </div>


  <div class="col-md-3">
    <!-- <label for="inputEmail4" class="form-label">Type of food *</label>
    <input type="email" class="form-control" id="inputEmail4"> -->

    <!-- <div class="mb-3"> -->
    <div class="form-label">Type of food *</div>
    <div style='padding-top:10px;'>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline" checked="">
        <span class="form-check-label">Chilled Food</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline">
        <span class="form-check-label">Frozen Food</span>
      </label>
    </div>
                          <!-- </div> -->

  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Display Internal *</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="Display Internal">
  </div>
  <div class="col-md-3">
    <label for="inputAddress" class="form-label">Display External *</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Display External">
  </div>
 
  <div class="col-lg-12">
    <label class="form-label">Corrective Action <span class="form-label-description">56/100</span></label>
    <textarea class="form-control" name="example-textarea-input" rows="3" placeholder="Corrective Action"></textarea>
  </div>

  <div class="col-lg-12">
    <label class="form-label">Remark<span class="form-label-description">56/100</span></label>
    <textarea class="form-control" name="example-textarea-input" rows="3" placeholder="Remark"></textarea>
  </div>
 



  <!-- <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </div>
</form>


                        </div>
                      </div>
                      <div class="tab-pane fade" id="tabs-profile-8" role="tabpanel">
                        <h4>List Records</h4>
                        <div>



                        </div>
                      </div>
                      <div class="tab-pane fade" id="tabs-activity-8" role="tabpanel">
                        <h4>Activity tab</h4>
                        <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



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