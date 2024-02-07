<?php
#error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("php/login.php");
?>
<!doctype html>
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
  .navbar-brand-image{
    height: 3.2rem;
    width: auto;
  }
  
</style>
</head>
  <body  class=" d-flex flex-column">
    <script src="dist/js/demo-theme.min.js"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">

        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">

            <a href="index.html" class="navbar-brand navbar-brand-autodark">
            <img src="img/logo2.png" height="50" alt="Tabler" class="navbar-brand-image">
          </a>
            </h2>

            <form action="" method="post" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Your Username" autocomplete="off">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    <a href="forgot-password.html">I forgot password</a>
                  </span>
                </label>
                <div class="input-group input-group-flat">
                  <input name="password" type="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                </div>
              </div>



              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input"/>
                  <span class="form-check-label">Remember me on this device</span>
                </label>
              </div>

              <div class="mb-0 text-center">
                <label class="text-center text-red">
                  <?=$error_message;?>
                </label>
              </div>

              <div class="form-footer" style="margin-top:1rem;">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>

        </div>
        <div class="text-center text-secondary mt-3">
          Don't have account yet? <a href="sign-up.html" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="dist/js/tabler.min.js" defer></script>
    <script src="dist/js/demo.min.js" defer></script>
  </body>
</html>
