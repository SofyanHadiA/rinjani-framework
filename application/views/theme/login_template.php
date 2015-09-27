<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{pagetitle} - <?php echo $this->config->item('company'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{base_url}packages/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" rev="stylesheet" href="{base_url}packages/font-awesome/css/font-awesome.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{base_url}packages/theme/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{base_url}packages/theme/dist/css/skins/skin-yellow.min.css">
    <link rel="stylesheet" href="{base_url}packages/pace/themes/yellow/pace-theme-loading-bar.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <span>Rinjani<b>POS</b> <?php //echo $this->config->item('company'); ?></span>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?php echo $this->lang->line('login_welcome_message'); ?></p>

        <?php echo form_open('login') ?>
        <div id="login_form" class="form-group">

            <?php if (validation_errors()) { ?>
                <div class="bg-danger"></i><?php echo validation_errors(); ?></div>
            <?php } ?>

            <?php
            echo form_input(array('name' => 'username',
                'size' => '20',
                'class' => 'form-control',
                'placeholder' => $this->lang->line('login_username')));
            ?>

            <br/>

            <?php
            echo form_password(array(
                'name' => 'password',
                'size' => '20',
                'class' => 'form-control',
                'placeholder' => 'Password'));
            ?>

            <br/>

            <button type="submit" class="btn btn-primary btn-block">Login</button>

        </div>
        <?php echo form_close(); ?>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in
                using Google+</a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<script src="{base_url}packages/pace/pace.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
