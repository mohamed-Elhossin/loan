<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `admin`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `admin` where id = $id";
    $d = mysqli_query($conn, $delete);
    header("/loan/admin/admins/list.php");
}
if ($_SESSION['role'] == 0) {

    ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>List admins Page </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">List admins</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="container mt-5 text-center">
          <div class="card">
            <div class="card-body">
              <table class="table ">
                <tr>
                  <th>ID</th>
                  <th>Name</th>

                  <th>ِEmail</th>
                  <th>Image</th>
                  <th>Role</th>
                  <th colspan="3">Action</th>
                </tr>
                <?php foreach ($s as $data) {?>
                  <tr>
                    <th> <?php echo $data['id'] ?> </th>
                    <th> <?php echo $data['name'] ?> </th>

                    <th> <?php echo $data['email'] ?> </th>
                    <th> <img width="30" src="./upload/<?php echo $data['image'] ?>" alt=""> </th>
                    <th> <?php echo $data['role'] ?> </th>
                    <th> <a class="btn btn-info" href="/loan/admin/admins/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>

                    <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/loan/admin/admins/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                  </tr>
                <?php }?>
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
} else {
    echo "<script>
  window.location.replace('http://localhost/loan/admin/pages-error-404.php')
</script>";
}
?>