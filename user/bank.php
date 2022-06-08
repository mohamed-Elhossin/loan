<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
$select = "SELECT * FROM `bank`";
$s = mysqli_query($conn, $select);
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>Bank</h3>
        </header>
        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) { ?>
                <div class="col-xs-12 col-lg-4">
                    <div class="card mt-5">
                        <img height="300" src="/loan/admin/bank/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                            <h3><span class="currency">%</span><?php echo $data['ir'] ?><span class="period"></span></h3>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">
                                Bank: <?php echo $data['name'] ?>
                            </h4>
                            <p>
                                Location: <?php echo $data['location'] ?>
                            </p>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <a href="/loan/user/payment.php?booking=<?php echo $data['id'] ?>" class="btn ">interest calculation</a>
                            <?php else : ?>
                                <a href="/loan/user/pages-login.php" class="btn">interest calculation</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>