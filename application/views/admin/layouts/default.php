<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/assets/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/assets/favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/assets/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/assets/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/assets/favicons/manifest.json">
	<link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/assets/favicons/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
  <title><?php out($rec['site_title']); ?> | admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- ../bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="/assets/plugins/iCheck/flat/red.css">
	<!-- datepicker -->
	<link rel="stylesheet" href="/assets/plugins/datepicker/datepicker3.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="/assets/dist/css/skins/skin-<?php out($rec['skin']); ?>.min.css">
  <link rel="stylesheet" href="/assets/dist/css/common.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php
// ページごとの追加js
if(!empty($add_css)) {
	foreach($add_css as $css) {
?>
	<link rel="stylesheet" href="<?php out($css); ?>">
<?php 
	}
}
?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body id="<?php out($body_class); ?>" class="hold-transition skin-<?php out($rec['skin']); ?> sidebar-mini">
<div class="wrapper">

  <?php echo $header; ?>

  <?php echo $menu; ?>

  <?php echo $content; ?>

  <?php echo $footer; ?>

  <?php echo $side; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- bootstrap 3.3.6 -->
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/assets/plugins/iCheck/icheck.min.js"></script>
<!-- datepicker -->
<script src="/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick ../plugins.
     Both of these ../plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script type="text/javascript" src="/assets/dist/js/common.js"></script>
<?php
// ページごとの追加js
if(!empty($add_js)) {
	foreach($add_js as $js) {
?>
<script type="text/javascript" src="<?php out($js); ?>"></script>
<?php 
	}
}
?>

<?php if($page_js) { // ページごとのjs ?>
<script type="text/javascript" src="<?php out($page_js); ?>"></script>
<?php } ?>

</body>
</html>
