<?php
include './shared/head.php';
include './sharedFunc/db.php';

if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];


  $select  = "SELECT * FROM `admin` where  `name` = '$name' and `password`= '$password'";
  $s =  mysqli_query($conn, $select);

  $numOfRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numOfRows > 0) {
    $_SESSION['admin'] = $name;
    $_SESSION['adminId'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['role'] = $row['role'];
    header("LOCATION:/loan/admin/");
  } else {
    echo "<div class='mt-5  alert alert-warning mx-auto w-25'>
    <p> 404 Not found your Email </p>
        </div>";
  }
}
print_r($_SESSION);
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="/NiceAdmin/index.php" class="logo d-flex align-items-center w-auto">
   
                <span class="d-none d-lg-block">loan Gate</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Logint </h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
      
                  <div class="col-12">
                    <button name="login" class="btn btn-dark w-25" type="submit">Login</button>
                  </div>
             
                </form>
              </div>
            </div>
            <div class="credits">
              Designed by <a href="">loan</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main><!-- End #main -->
<?php
