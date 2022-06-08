<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';


if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $insert = "INSERT INTO `usertype` VALUES (NULL ,'$title')";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Bank Type");
}


$title = '';

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `usertype` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $title = $row['title'];

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
     
        $update = "UPDATE `usertype` SET `title` = '$title'  where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Bank Type");
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-warning"> usertype Update page </h1>
        <?php else : ?>
            <h1 class="display-1 text-center text-info">usertype Add page </h1>
        <?php endif; ?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">add usertype</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">

            <div class="row">
                <div class="card col-lg-9">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label> User Job  : </label>
                                <input class="form-control" value="<?php echo $title ?>" name="title" type="text">
                            </div>
                                <?php if ($update) : ?>
                                    <button name="update" class="mt-4 btn btn-primary btn-block w-50 mx-auto">Update Data </button>
                                <?php else : ?>
                                    <button name="send" class=" mt-4 btn btn-info btn-block w-50 mx-auto">Send Data</button>
                                <?php endif; ?>
                        </form>
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