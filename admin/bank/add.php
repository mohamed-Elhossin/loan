<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$selectt = "SELECT * FROM `banktype`";
$banksType = mysqli_query($conn, $selectt);

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $ir = $_POST['ir'];
    $locationn = $_POST['location'];
    $banktype = $_POST['banktype'];
    $adminId = $_SESSION['adminId'];
    $years = $_POST['years'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `bank` VALUES (NULL , '$name',  $ir,$years , '$locationn', '$image_name' , $adminId,$banktype )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert To Bank");
}

$name = '';
$locationn = '';
$ir = "";
$image = "";
$years = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `bank` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $locationn = $row['location'];
    $ir = $row['ir'];
    $image = $row['image'];
    $years = $row['years'];

    $role = $row['role'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $locationn = $_POST['location'];
        $ir = $_POST['ir'];
        $years = $_POST['years'];
        // Image Code
        $image_name = $image;

        $update = "UPDATE `bank` SET `name` = '$name' ,  `location` = '$locationn' ,  `ir` = '$ir' ,`years`= $years ,`image`='$image_name' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Bank");
        path("bank/list.php");
    }
}
if ($_SESSION['role'] == 0) {

    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="display-1 text-center text-info">Bank Add page </h1>
            <nav>
                <?php if ($update): ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Update admin </li>
                    </ol>
                <?php else: ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">add admin </li>
                    </ol>
                <?php endif;?>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container">
                <div class="container text-center col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Bank Name</label>
                                    <input name="name" value="<?php echo $name ?>" type="text" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Bank location</label>
                                    <input name="location" value="<?php echo $locationn ?>" type="text" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Bank Intresst Rate</label>
                                    <input name="ir" value="<?php echo $ir ?>" type="number" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Number of Years</label>
                                    <input name="years" value="<?php echo $years ?>" type="number" required class="form-control">
                                </div>
                                <div class="form-group my-3">
                                    <select name="banktype" required class="form-control" id="">
                                        <?php foreach ($banksType as $data) {?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <?php if (!$update): ?>
                                    <div class="form-group">
                                        <label> Image prfile :<?php echo $image ?></label>
                                        <input name="image" type="file" required class="form-control">
                                    </div>
                                <?php endif;?>

                                <?php if ($update): ?>
                                    <button name="update" class="btn btn-primary btn-block w-50 mx-auto"> Update Data </button>

                                <?php else: ?>
                                    <button name="send" class="btn btn-info btn-block w-50 mx-auto"> Send Data </button>
                                <?php endif;?>
                            </form>
                        </div>
                    </div>
                </div>

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