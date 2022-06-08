<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/loan/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">Loan Gate
      </a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/loan/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/loan/user/bank.php">banks</a></li>
        <li><a class="nav-link scrollto" href="/loan/user/#about">About</a></li>
        <li><a class="nav-link scrollto" href="/loan/user/#footer">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-danger"> Log Out </button>
        </form>
      <?php else : ?>
        <a href="/loan/user/admins/add.php" class="btn btn-dark p-3 "> Sign up </a>
        <a href="/loan/user/pages-login.php" class="btn btn-dark p-3">Login</a>
      <?php endif; ?>
    </div>
  </div>
</header><!-- End Header -->