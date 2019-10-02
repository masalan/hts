<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/plugins/fontawesome-free/css/all.min.css') ?>">
        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">


        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/dist/css/adminlte.min.css') ?>">
        <title>Admin</title>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <?php $this ->load ->view('admin/template/navbar.php') ?>
        <?php $this ->load ->view('admin/template/sidebar.php') ?>

        <div class="content-wrapper">



