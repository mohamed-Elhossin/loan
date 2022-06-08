<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * from usertype";
$s = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $usertype = $_POST['usertype'];
    $insert = "INSERT INTO `users` VALUES (NULL , '$name' ,$age , '$email','$password' ,'$address' , '$phone',$usertype )";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Confirm Registration");
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="bg-dark  text-center text-light">Welecome At Registration page </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label> Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> age</label>
                                <input name="age" type="text" class="form-control">
                            </div>


                            <div class="form-group">
                                <label> user Email </label>
                                <input name="email" type="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> user password</label>
                                <input name="password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> user Address</label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> phone</label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Your Job</label>
                                <select name="usertype" class="form-control">
                                    <?php foreach ($s as $data) { ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['title'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button name="send" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Send Data </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>