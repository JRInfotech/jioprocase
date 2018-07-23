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
            <form id="forgot_password" method="POST" action="<?=  base_url('login/otpVerification');?>">
                <div class="card-header card-header-rose text-center">
                    <h4 class="card-title">OTP Verification</h4>
                </div>
                <div class="msg">
                    Please Enter the OTPs Sent to <br>Your Mobile Number <?=$phoneNo;?>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="otp" placeholder="One Time Password" required autofocus>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <input class="btn btn-block btn-lg bg-pink waves-effect" name="confirm"  value="CONFIRM" type="submit">
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