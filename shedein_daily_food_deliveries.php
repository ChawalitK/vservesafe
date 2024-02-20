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
              Home / SHEDEIN / Food Safety Management / Daily Food Deliveries Form
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
                        <h1 class="">Daily Food Deliveries Form</h1>
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
    <label for="inputCity" class="form-label">Supplier *</label>

    <select id="inputState" class="form-select">
      <option selected>Select Supplier</option>
      <option>3CFARM CO.,LTD</option>
      <option>A-ONE FOOD PRODUCT CO.,LTD.</option>
      <option>AMERICAN-EUROPEAN PRODUCTS CO.,LTD.</option>
      <option>BEERTINI CO.,LTD.</option>
      <option>BETAGRO AGRO INDUSTRY CO.,LTD</option>
      <option>BIG C SUPERCENTER PUBLIC CO.,LTD.</option>
      <option>BLUE OCEAN INTER GROUP CO.,LTD</option>
    </select>


  </div>


  <div class="col-md-6">
    <!-- <label for="inputEmail4" class="form-label">Type of food *</label>
    <input type="email" class="form-control" id="inputEmail4"> -->

    <!-- <div class="mb-3"> -->
    <div class="form-label">Type of food *</div>
    <div style='padding-top:10px;'>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline" checked="">
        <span class="form-check-label">GENERAL FOOD</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline">
        <span class="form-check-label">CHILLED FOOD</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline">
        <span class="form-check-label">FROZEN FOOD</span>
      </label>

    </div>
                          <!-- </div> GENERAL FOOD
CHILLED FOOD
FROZEN FOOD-->

  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Purchase Order Number [PO No.] *</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="Display Internal">
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Description of Products *</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Display External">
  </div>

  <div class="col-md-3">
    <label for="inputAddress" class="form-label">Date Produced Slaughter *</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Display External">
  </div>

  <div class="col-md-3">
    <label for="inputAddress" class="form-label">Expire Date *</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Display External">
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">FOOD TEMP. AT RECEIVING (1) *</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="Display Internal">
  </div>

  <div class="col-md-6">
  <div class="form-label">Food Quality/Safety *</div>
    <div style='padding-top:10px;padding-bottom:5px;'>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline1" checked="">
        <span class="form-check-label">Accept</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline1">
        <span class="form-check-label">Reject</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline1">
        <span class="form-check-label">Accept With Condition</span>
      </label>

    </div>
  </div>



  <!-- <div class="col-md-12 bg-indigo text-indigo-fg p-2 text-center">
    bg-blue text-blue-fg -->

  <div class="col-md-12 bg-indigo text-indigo-fg p-2 text-center">    
    <span style="font-size:19px;">Vechicle Inspection</span>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">VEHICLE TEMP. C (2) *</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="Display Internal">
  </div>


  <div class="col-md-6">
    <!-- <label for="inputEmail4" class="form-label">Type of food *</label>
    <input type="email" class="form-control" id="inputEmail4"> -->

    <!-- <div class="mb-3"> -->
    <div class="form-label">VISUAL CONDITION (3) *</div>
    <div style='padding-top:10px;'>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline3" checked="">
        <span class="form-check-label">ACCEPT</span>
      </label>
      <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="radios-inline3">
        <span class="form-check-label">UNACCEPTABLE</span>
      </label>
    </div>
                          <!-- </div> GENERAL FOOD
CHILLED FOOD
FROZEN FOOD-->

  </div>





  <div class="col-lg-12">

    <label class="form-label">Corrective Action CORRECTIVE ACTIONS REQUIRED (IF NECESSARY/CONDITION)</label>
    <textarea class="form-control" name="example-textarea-input" rows="3" placeholder="Corrective Action"></textarea>
  </div>

  <div class="col-lg-12">
    <label class="form-label">Remark</label>
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

                        <table id="example" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011-04-25</td>
                      <td>$320,800</td>
                  </tr>
                  <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td>$170,750</td>
                  </tr>
                  <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009-01-12</td>
                      <td>$86,000</td>
                  </tr>
                  <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012-03-29</td>
                      <td>$433,060</td>
                  </tr>
                  <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008-11-28</td>
                      <td>$162,700</td>
                  </tr>
                  <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012-12-02</td>
                      <td>$372,000</td>
                  </tr>
                  <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012-08-06</td>
                      <td>$137,500</td>
                  </tr>
                  <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010-10-14</td>
                      <td>$327,900</td>
                  </tr>
                  <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009-09-15</td>
                      <td>$205,500</td>
                  </tr>
                  <tr>
                      <td>Sonya Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008-12-13</td>
                      <td>$103,600</td>
                  </tr>
                  <tr>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008-12-19</td>
                      <td>$90,560</td>
                  </tr>
                  <tr>
                      <td>Quinn Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013-03-03</td>
                      <td>$342,000</td>
                  </tr>
                  <tr>
                      <td>Charde Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008-10-16</td>
                      <td>$470,600</td>
                  </tr>
                  <tr>
                      <td>Haley Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>43</td>
                      <td>2012-12-18</td>
                      <td>$313,500</td>
                  </tr>
                  <tr>
                      <td>Tatyana Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>19</td>
                      <td>2010-03-17</td>
                      <td>$385,750</td>
                  </tr>
                  <tr>
                      <td>Michael Silva</td>
                      <td>Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012-11-27</td>
                      <td>$198,500</td>
                  </tr>
                  <tr>
                      <td>Paul Byrd</td>
                      <td>Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010-06-09</td>
                      <td>$725,000</td>
                  </tr>
                  <tr>
                      <td>Gloria Little</td>
                      <td>Systems Administrator</td>
                      <td>New York</td>
                      <td>59</td>
                      <td>2009-04-10</td>
                      <td>$237,500</td>
                  </tr>
                  <tr>
                      <td>Bradley Greer</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>41</td>
                      <td>2012-10-13</td>
                      <td>$132,000</td>
                  </tr>
                  <tr>
                      <td>Dai Rios</td>
                      <td>Personnel Lead</td>
                      <td>Edinburgh</td>
                      <td>35</td>
                      <td>2012-09-26</td>
                      <td>$217,500</td>
                  </tr>
                  <tr>
                      <td>Jenette Caldwell</td>
                      <td>Development Lead</td>
                      <td>New York</td>
                      <td>30</td>
                      <td>2011-09-03</td>
                      <td>$345,000</td>
                  </tr>
                  <tr>
                      <td>Yuri Berry</td>
                      <td>Chief Marketing Officer (CMO)</td>
                      <td>New York</td>
                      <td>40</td>
                      <td>2009-06-25</td>
                      <td>$675,000</td>
                  </tr>
                  <tr>
                      <td>Caesar Vance</td>
                      <td>Pre-Sales Support</td>
                      <td>New York</td>
                      <td>21</td>
                      <td>2011-12-12</td>
                      <td>$106,450</td>
                  </tr>
                  <tr>
                      <td>Doris Wilder</td>
                      <td>Sales Assistant</td>
                      <td>Sydney</td>
                      <td>23</td>
                      <td>2010-09-20</td>
                      <td>$85,600</td>
                  </tr>
                  <tr>
                      <td>Angelica Ramos</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2009-10-09</td>
                      <td>$1,200,000</td>
                  </tr>
                  <tr>
                      <td>Gavin Joyce</td>
                      <td>Developer</td>
                      <td>Edinburgh</td>
                      <td>42</td>
                      <td>2010-12-22</td>
                      <td>$92,575</td>
                  </tr>
                  <tr>
                      <td>Jennifer Chang</td>
                      <td>Regional Director</td>
                      <td>Singapore</td>
                      <td>28</td>
                      <td>2010-11-14</td>
                      <td>$357,650</td>
                  </tr>
                  <tr>
                      <td>Brenden Wagner</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>28</td>
                      <td>2011-06-07</td>
                      <td>$206,850</td>
                  </tr>
                  <tr>
                      <td>Fiona Green</td>
                      <td>Chief Operating Officer (COO)</td>
                      <td>San Francisco</td>
                      <td>48</td>
                      <td>2010-03-11</td>
                      <td>$850,000</td>
                  </tr>
                  <tr>
                      <td>Shou Itou</td>
                      <td>Regional Marketing</td>
                      <td>Tokyo</td>
                      <td>20</td>
                      <td>2011-08-14</td>
                      <td>$163,000</td>
                  </tr>
                  <tr>
                      <td>Michelle House</td>
                      <td>Integration Specialist</td>
                      <td>Sydney</td>
                      <td>37</td>
                      <td>2011-06-02</td>
                      <td>$95,400</td>
                  </tr>
                  <tr>
                      <td>Suki Burks</td>
                      <td>Developer</td>
                      <td>London</td>
                      <td>53</td>
                      <td>2009-10-22</td>
                      <td>$114,500</td>
                  </tr>
                  <tr>
                      <td>Prescott Bartlett</td>
                      <td>Technical Author</td>
                      <td>London</td>
                      <td>27</td>
                      <td>2011-05-07</td>
                      <td>$145,000</td>
                  </tr>
                  <tr>
                      <td>Gavin Cortez</td>
                      <td>Team Leader</td>
                      <td>San Francisco</td>
                      <td>22</td>
                      <td>2008-10-26</td>
                      <td>$235,500</td>
                  </tr>
                  <tr>
                      <td>Martena Mccray</td>
                      <td>Post-Sales support</td>
                      <td>Edinburgh</td>
                      <td>46</td>
                      <td>2011-03-09</td>
                      <td>$324,050</td>
                  </tr>
                  <tr>
                      <td>Unity Butler</td>
                      <td>Marketing Designer</td>
                      <td>San Francisco</td>
                      <td>47</td>
                      <td>2009-12-09</td>
                      <td>$85,675</td>
                  </tr>
                  <tr>
                      <td>Howard Hatfield</td>
                      <td>Office Manager</td>
                      <td>San Francisco</td>
                      <td>51</td>
                      <td>2008-12-16</td>
                      <td>$164,500</td>
                  </tr>
                  <tr>
                      <td>Hope Fuentes</td>
                      <td>Secretary</td>
                      <td>San Francisco</td>
                      <td>41</td>
                      <td>2010-02-12</td>
                      <td>$109,850</td>
                  </tr>
                  <tr>
                      <td>Vivian Harrell</td>
                      <td>Financial Controller</td>
                      <td>San Francisco</td>
                      <td>62</td>
                      <td>2009-02-14</td>
                      <td>$452,500</td>
                  </tr>
                  <tr>
                      <td>Timothy Mooney</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>37</td>
                      <td>2008-12-11</td>
                      <td>$136,200</td>
                  </tr>
                  <tr>
                      <td>Jackson Bradshaw</td>
                      <td>Director</td>
                      <td>New York</td>
                      <td>65</td>
                      <td>2008-09-26</td>
                      <td>$645,750</td>
                  </tr>
                  <tr>
                      <td>Olivia Liang</td>
                      <td>Support Engineer</td>
                      <td>Singapore</td>
                      <td>64</td>
                      <td>2011-02-03</td>
                      <td>$234,500</td>
                  </tr>
                  <tr>
                      <td>Bruno Nash</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>38</td>
                      <td>2011-05-03</td>
                      <td>$163,500</td>
                  </tr>
                  <tr>
                      <td>Sakura Yamamoto</td>
                      <td>Support Engineer</td>
                      <td>Tokyo</td>
                      <td>37</td>
                      <td>2009-08-19</td>
                      <td>$139,575</td>
                  </tr>
                  <tr>
                      <td>Thor Walton</td>
                      <td>Developer</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2013-08-11</td>
                      <td>$98,540</td>
                  </tr>
                  <tr>
                      <td>Finn Camacho</td>
                      <td>Support Engineer</td>
                      <td>San Francisco</td>
                      <td>47</td>
                      <td>2009-07-07</td>
                      <td>$87,500</td>
                  </tr>
                  <tr>
                      <td>Serge Baldwin</td>
                      <td>Data Coordinator</td>
                      <td>Singapore</td>
                      <td>64</td>
                      <td>2012-04-09</td>
                      <td>$138,575</td>
                  </tr>
                  <tr>
                      <td>Zenaida Frank</td>
                      <td>Software Engineer</td>
                      <td>New York</td>
                      <td>63</td>
                      <td>2010-01-04</td>
                      <td>$125,250</td>
                  </tr>
                  <tr>
                      <td>Zorita Serrano</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>56</td>
                      <td>2012-06-01</td>
                      <td>$115,000</td>
                  </tr>
                  <tr>
                      <td>Jennifer Acosta</td>
                      <td>Junior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>43</td>
                      <td>2013-02-01</td>
                      <td>$75,650</td>
                  </tr>
                  <tr>
                      <td>Cara Stevens</td>
                      <td>Sales Assistant</td>
                      <td>New York</td>
                      <td>46</td>
                      <td>2011-12-06</td>
                      <td>$145,600</td>
                  </tr>
                  <tr>
                      <td>Hermione Butler</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2011-03-21</td>
                      <td>$356,250</td>
                  </tr>
                  <tr>
                      <td>Lael Greer</td>
                      <td>Systems Administrator</td>
                      <td>London</td>
                      <td>21</td>
                      <td>2009-02-27</td>
                      <td>$103,500</td>
                  </tr>
                  <tr>
                      <td>Jonas Alexander</td>
                      <td>Developer</td>
                      <td>San Francisco</td>
                      <td>30</td>
                      <td>2010-07-14</td>
                      <td>$86,500</td>
                  </tr>
                  <tr>
                      <td>Shad Decker</td>
                      <td>Regional Director</td>
                      <td>Edinburgh</td>
                      <td>51</td>
                      <td>2008-11-13</td>
                      <td>$183,000</td>
                  </tr>
                  <tr>
                      <td>Michael Bruce</td>
                      <td>Javascript Developer</td>
                      <td>Singapore</td>
                      <td>29</td>
                      <td>2011-06-27</td>
                      <td>$183,000</td>
                  </tr>
                  <tr>
                      <td>Donna Snider</td>
                      <td>Customer Support</td>
                      <td>New York</td>
                      <td>27</td>
                      <td>2011-01-25</td>
                      <td>$112,000</td>
                  </tr>
              </tbody>
          </table>



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

<link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>



<script>
  $(document).ready(function() {
      $('#example').DataTable();
  });
</script>


</body>
</html>