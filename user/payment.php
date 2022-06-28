<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
$loan = "";
$totalIRofallYears = "";
$irByYear = "";
$totalPayment = "";
$payemntByMonth = "";
if (isset($_GET['booking'])) {
    $bankId = $_GET['booking'];
    $userId = $_SESSION['adminId'];
    $select = "SELECT * FROM `bank` where id =$bankId ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    if (isset($_POST['pay'])) {
        $loan = $_POST['loan'];
        $ir = $_POST['ir'];
        $years = $_POST['years'];
        $irByYear = $loan * ($ir / 100);
        $totalIRofallYears = $irByYear * $years;
        $totalPayment = $totalIRofallYears + $loan;
        $payemntByMonth = $totalPayment / ($years * 12);
    }
}

?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info"> Payment Page </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Amount Of Loan </label>
                                <input name="loan" value="<?php echo $loan ?>" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Interest Rate </label>
                                <input name="ir" readonly value="<?php echo $row['ir'] ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Number Of years </label>
                                <input name="years" readonly value="<?php echo $row['years'] ?>" class="form-control">

                            </div>
                            <button name="pay" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Calc Now </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class=" text-info"> Interest payment / year </h3>
                                <h3> <?php echo $irByYear ?>$ </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class=" text-info"> Total Interest payment </h3>
                                <h3> <?php echo $totalIRofallYears ?>$ </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class=" text-info"> Total payment </h3>
                                <h3> <?php echo $totalPayment ?>$ </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <h3 class=" text-info"> Total payment/month </h3>
                                <h3> <?php echo $payemntByMonth ?>$ </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>