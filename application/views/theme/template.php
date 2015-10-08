<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{pagetitle} - <?php echo $this->config->item('company'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{base_url}css/style.css">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{base_url}packages/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" rev="stylesheet" href="{base_url}packages/font-awesome/css/font-awesome.css"/>
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="{base_url}packages/theme/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="{base_url}packages/theme/dist/css/skins/skin-yellow.css">
    <link rel="stylesheet" href="{base_url}packages/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="{base_url}packages/pace/themes/yellow/pace-theme-loading-bar.css">
    <link rel="stylesheet" href="{base_url}packages/blueimp-file-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="{base_url}packages/css-spinners/css/spinner/dots.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{base_url}packages/jQuery/dist/jQuery.min.js"></script>
    <script src="{base_url}packages/bootstrap/dist/js/bootstrap.js"></script>
    <script src="{base_url}packages/datatables/media/js/jquery.dataTables.js"></script>
    <script src="{base_url}packages/datatables/media//js/dataTables.bootstrap.js"></script>
    <script src="{base_url}packages/notify/dist/bootstrap-notify.js"></script>
    <script src="{base_url}packages/bootbox.js/bootbox.js"></script>
    <script src="{base_url}packages/pace/pace.js"></script>
    <script src="{base_url}packages/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="{base_url}packages/blueimp-file-upload/js/jquery.fileupload.js"></script>
    <script src="{base_url}packages/theme/dist/js/app.min.js"></script>
    <script src="{base_url}packages/jquery-validation/dist/jquery.validate.js"></script>
    <script src="{base_url}packages/handlebars/handlebars.js"></script>

    <script src="{base_url}app/core/app.js"></script>
    <script src="{base_url}app/core/app.route.js"></script>
    <script src="{base_url}app/core/app.loader.js"></script>
    <script src="{base_url}app/core/app.modalform.js"></script>
    <script src="{base_url}app/core/app.tablegrid.js"></script>
    <script src="{base_url}app/core/app.form.js"></script>
    <script src="{base_url}app/core/service/app.http.js"></script>
    <script src="{base_url}app/core/service/app.notify.js"></script>

    <script src="{base_url}app/config.js"></script>
    <script src="{base_url}app/home/dashboard.controller.js"></script>
    <script src="{base_url}app/home/dashboard.template.js"></script>
    <script src="{base_url}app/people/customer.controller.js"></script>
    <script src="{base_url}app/item/item.controller.js"></script>
    <script src="{base_url}app/language/en.js"></script>

</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    {header}
    {menubar}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <app-view>Loading...</app-view>
    </div>
    <!-- /.content-wrapper -->

    {footer}
    {control_sidebar}
</div>
<!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>
</html>
