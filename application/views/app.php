<!DOCTYPE html>
<html lang="en">
    <?=$this->load->view('templates/header', '', TRUE)?>
    <body class="header-fixed">
        <!-- partial:partials/_header.html -->
        <?=$this->load->view('templates/headernav.php', '', TRUE)?>
        <!-- partial -->
        <div class="page-body">
            <!-- partial:partials/_sidebar.html -->
            <?=$this->load->view('templates/sidebar.php', '', TRUE)?>

                <!-- partial -->
            <div class="page-content-wrapper">
                <div class="page-content-wrapper-inner">
                    <div class="content-viewport">
                        <div class="row">
                            <div class="col-12 py-5">
                                <h4><?=$title?></h4>
                                <!-- <p class="text-gray">Welcome aboard, Allen Clerk</p> -->
                            </div>
                        </div>
                        <div class="row">
                            <!------------------ Content ------------------- -->
                            <?=$this->load->view(!empty($page)?$page:'contents/home/home','',TRUE)?>
                        </div>
                    </div>
                </div>
                <!-- content viewport ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="row">
                        <div class="col-sm-6 text-center text-sm-right order-sm-1">
                            <ul class="text-gray">
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                            <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
                            <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        <!-- page content ends -->
        </div>
        <!--page body ends -->
        <!-- SCRIPT LOADING START FORM HERE /////////////-->
        <!-- plugins:js -->
        <script src="<?php echo base_url()?>Asset/label/vendors/js/core.js"></script>
        <!-- endinject -->
        <!-- Vendor Js For This Page Ends-->
        <script src="<?php echo base_url()?>Asset/label/vendors/apexcharts/apexcharts.min.js"></script>
        <script src="<?php echo base_url()?>Asset/label/vendors/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url()?>Asset/label/js/charts/chartjs.addon.js"></script>
        <!-- Vendor Js For This Page Ends-->
        <!-- build:js -->
        <script src="<?php echo base_url()?>Asset/label/js/template.js"></script>
        <script src="<?php echo base_url()?>Asset/label/js/dashboard.js"></script>
        <!-- endbuild -->
    </body>
</html>