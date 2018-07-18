<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title> Jio Pro Case </title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="<?=  base_url('assets/css/font-awesome.min.css');?>">
<link href="<?=  base_url('assets/css/material.min.css');?>" rel="stylesheet" />
<link href="<?=  base_url('assets/css/demo.css');?>" rel="stylesheet" />

<body class="off-canvas-sidebar">
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?=base_url('assets/img/login.jpg');?>'); background-size: cover; background-position: top center;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="post" action="<?=  base_url('admin/Login/dologin')?>">
                        <div class="card card-login card-hidden">
                            <div class="card-header card-header-rose text-center">
                                <h4 class="card-title">Admin Login</h4>
                            </div>
                            <div style="width: 100%;text-align: center;">
                                <span style="color:#FF0000 ;"><?php if(isset($msg)){echo $msg;} ?></span>
                                <?php if ($this->session->flashdata('notification')): ?>
                                    <tr>
                                        <td class="successMsg">
                                            <?php echo $this->session->flashdata('notification');?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </div>
                            <div class="card-body ">
                                <span class="bmd-form-group">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                      </span>
                                      </div>
                                      <input type="text" class="form-control" name="username" placeholder="User Name..." required="">
                                  </div>
                                </span>
                                <span class="bmd-form-group">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                      </span>
                                      </div>
                                      <input type="password" class="form-control" name="password" placeholder="Password..." required="">
                                  </div>
                                </span>
                            </div>
                            <div class="card-footer justify-content-center">
                                <input type="submit" name="submit" id="submit"  class="btn btn-rose btn-round mt-4" onclick="md.showNotification('bottom','center')" value="Lets Go">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/jquery.min.js');?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/popper.min.js');?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/bootstrap-material-design.min.js');?>" type="text/javascript"></script>

<script src="<?= base_url('assets/plugins/perfect-scrollbar.jquery.min.js');?>" ></script>


<!-- Plugin for the momentJs  -->
<script src="<?= base_url('assets/plugins/moment.min.js');?>"></script>

<!--  Plugin for Sweet Alert -->
<script src="<?= base_url('assets/plugins/sweetalert2.js');?>"></script>

<!-- Forms Validations Plugin -->
<script src="<?= base_url('assets/plugins/jquery.validate.min.js');?>"></script>

<!--  Notifications Plugin    -->
<script src="<?= base_url('assets/plugins/bootstrap-notify.js');?>"></script>

<!-- App cation js -->
<script src="<?= base_url('assets/js/app.js');?>"></script>

<script>
  $(document).ready(function(){
    app.checkFullPageBackgroundImage();
    setTimeout(function(){
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 100);
  });
</script>
</body>
</html>