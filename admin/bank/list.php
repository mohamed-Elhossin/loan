<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `bank`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM bank where id = $id";
  $d =  mysqli_query($conn, $delete);
  header('LOCATION: /loan/admin/bank/list.php');
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Bank Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Bank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container  mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table ">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Interst Rate</th>
                <th>Location</th>
            
                <th colspan="2">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['ir'] ?> </th>
                  <th> <?php echo $data['location'] ?> </th>
                  <th> <a class="btn btn-warning" href="/loan/admin/bank/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/loan/admin/bank/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>