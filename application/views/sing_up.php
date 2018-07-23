<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jio ProCase</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=  base_url()?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=  base_url()?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=  base_url()?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=  base_url()?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=  base_url()?>assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?=  base_url()."assets/img/logo/title_logo.png"?>"  /></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="<?=  base_url('login/register_user');?>">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="userName" placeholder="User Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">smartphone</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="phone_no" minlength="10" maxlength="12" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">call_split</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="referral_code"  placeholder="Referral Code" required>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>-->

<!--                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>-->
                    <input type="submit" name="sign_up" value="SIGN UP" class="btn btn-block btn-lg bg-pink waves-effect" >
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?=  base_url('login')?>">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=  base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=  base_url()?>assets/js/admin.js"></script>
    <script type="text/javascript">
    $(function () {
        $('#sign_up').validate({
            rules: {
                'userName': {
                    remote: {
                        url: "<?php echo base_url('login/check_username'); ?>",
                    }
                },
                'confirm': {
                    equalTo: '[name="password"]'
                },
                'referral_code': {
                    remote: {
                        url: "<?php echo base_url('login/check_referral_code'); ?>",
                    }
                }
            },
             messages: {
                'userName': {
                     remote: 'This User Name alredy exist..'
                },
                'confirm':{
                    equalTo:'Confirm Password is not Match Please Try again ...'
                },
                'referral_code': {
                     remote: 'This Referral Code Is Not Existe .. Please Check Referral code...'
                }
             },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
                $(element).parents('.form-group').append(error);
            }
        });
    });
    </script>
</body>

</html>