<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `admin` VALUES (NULL , '$name',  '$password' , '$email', '$image_name' , $role)";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Insert To Admin");
}

$name = '';
$email = '';
$password = '';
$image = '';
$role = '';
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `admin` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $image = $row['image'];
    $role = $row['role'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];

        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        // Image Code
        $image_name = $image;

        $update = "UPDATE `admin` SET `name` = '$name' ,  `email` = '$email' ,  `password` = '$password' ,`image`='$image_name', `role` = $role where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated category");
        // header('LOCATION: http://localhost/loan/admin/travelAgenecy/list.php');
    }
}
if ($_SESSION['role'] == 0) {

?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="display-1 text-center text-info">Admin Add page </h1>
            <nav>
                <?php if ($update) : ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Update admin </li>
                    </ol>
                <?php else : ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">add admin </li>
                    </ol>
                <?php endif; ?>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container">
                <div class="container text-center col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Admin Name</label>
                                    <input name="name" value="<?php echo $name ?>" type="text" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Admin Email </label>
                                    <input name="email" value="<?php echo $email ?>" type="email" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Admin password</label>
                                    <input name="password" value="<?php echo $password ?>" type="password" required class="form-control">
                                </div>
                                <?php if (!$update) :  ?>
                                    <div class="form-group">
                                        <label> Image prfile :<?php echo $image ?></label>
                                        <input name="image" type="file" required class="form-control">
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mt-3">
                                    <select name="role" required class="form-control" id="">
                                        <option value="0">All Access </option>
                                        <option value="1">Sime Access </option>
                                    </select>
                                </div>
                                <?php if ($update) : ?>
                                    <button name="update" class="btn btn-primary btn-block w-50 mx-auto"> Update Data </button>

                                <?php else : ?>
                                    <button name="send" class="btn btn-info btn-block w-50 mx-auto"> Send Data </button>
                                <?php endif; ?>
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