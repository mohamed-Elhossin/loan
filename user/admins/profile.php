<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
$userId = $_SESSION['adminId'];
$select = "SELECT * from users where id =$userId ";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$select2 = "SELECT posts.id id ,posts.title title ,posts.image image , posts.description description , users.name author FROM `posts` JOIN users ON posts.userId = users.id where `status` ='done' and users.id = $userId";
$ss = mysqli_query($conn, $select2);
if (isset($_SESSION['admin'])) {
} else {
    header("location:/pets/user/pages-login.php");
}

?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container-fluid">

        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <div class="col-xs-12 col-lg-3 ">
                <div class="card  bg-dark mt-5">
                    <img height="300" src="/pets/user/posts/upload/<?php echo $row['image'] ?>" class="img-top" alt="Eror">
                    <div class="card-header">
                    </div>
                    <div class="card-block">
                        <h4 class="card-title text-info">
                            Name: <?php echo $row['name'] ?>
                        </h4>
                        <p>
                            Email: <?php echo $row['email'] ?>
                        </p>
                        <p>
                        </p>
                        Phone: <p> <?php echo $row['phone'] ?>
                        </p>
                        <a class="btn btn-info" href="./add.php?edit=<?php echo $userId?>"> Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-9">
                <h1 class="text-center">Your Posts</h1>
                <?php foreach ($ss as $data) { ?>
                    <div class="card mx-auto w-50 bg-dark mt-5">
                        <img height="300" src="/pets/user/posts/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <h4 class="card-title text-info">
                                Title: <?php echo $data['title'] ?>
                            </h4>
                            <p>
                                Description: <?php echo $data['description'] ?>
                            </p>
                            <p>
                            </p>
                            Author: <p> <?php echo $data['author'] ?>
                            </p>
                            <a class="btn btn-danger" href="/pets/user/posts/add.php?edit=<?php echo $data['id'] ?>"> Edit Post </a>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include '../shared/footer.php';
include '../shared/script.php';

?>