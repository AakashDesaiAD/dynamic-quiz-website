<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  session_start();
  if (isset($_SESSION['email'])) {
    header("location: ./index.php");
  }
  include 'backend/User.php';
  $user = new User();
  $response = [];
  $response['status'] = true;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['password'])) {
        $response = $user->signUp($_POST);
    } else {
        $response['status'] = false;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include.php' ?>
</head>

<body>
<section class="position-relative py-4 py-xl-5" style="
    width: 100%;
    height: 100%;
    border-radius: 100px;
    border-style: none;
    border-color: #a9a5c6;
  ">
    <h1 class="text-center" style="border-color: #2327a3;color: #2327a3;">Sign Up&nbsp;</h1>
    <h1 class="text-center" style="border-color: #2327a3;color: #2327a3;font-size: 25px;">Welcome to Quiz Master&nbsp;</h1>
    <div class="container" style="width: 100%; height: 100%">
        <div class="row d-flex justify-content-center justify-content-xl-center align-items-xl-center" style="width: 100%; height: 100%">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5" style="border-style: none">
                    <div class="card-body d-flex flex-column align-items-center" style="border-style: none">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background: #2327a3;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                              <?php
                                if ($response['status'] == false) {
                                  echo '<p class="alert alert-danger">Something went wrong.</p>';
                                }
                              ?>
                            </div>
                        <form class="text-center" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            <div class="mb-3">
                                <input class="form-control" type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password" />
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="login" value="Sign Up" style="background: #2327a3;border-radius: 15px;" class="btn btn-primary active d-block w-100">
                            </div>
                            <a href="login.php">Log In</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4" style="margin-left: 100px">
                <img src="assets/img/sign-up-form.png" style="width: 100%; height: 100%" />
            </div>
        </div>
    </div>
</section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>