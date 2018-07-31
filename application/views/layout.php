<!DOCTYPE html>
<html>
<?php $this->load->view('header'); ?>
<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper" style="display: block">
        <div class="loader">
            <img src="<?=  base_url()."assets/img/logo/title_logo.png";?>" width="100px" height="100px"><br>
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <?php $this->load->view('top_bar'); ?>
    <section>
        <?php $this->load->view('left_bar'); ?>
        <section class="content">
            <?php $this->load->view($view); ?>
        </section>
        <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
    </section>
    <?php $this->load->view('common_js') ?>
</body>
</html>