<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/plugins/fontawesome-free/css/all.min.css') ?>"  type="text/css">
        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>"  type="text/css">
        <link rel="stylesheet" href="<?php echo latestFile('assets/admin/dist/css/adminlte.min.css') ?>"  type="text/css">


        <title>Admin</title>
         <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo latestFile('assets/'.$currentThemeName.'js/html5shiv.min.js'); ?>"></script>
      <script src="<?php echo latestFile('assets/'.$currentThemeName.'js/respond.min.js'); ?>"></script>
    <![endif]-->
    </head>
    <body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>HTS</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Connexion</p>

                <form method="post" action="<?php echo base_url('admin/sign_in') ?>">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Adresse email">
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
                </form>
            </div>
        </div>
    </div>

        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/dist/js/adminlte.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/dist/js/demo.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/raphael/raphael.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/jquery-mapael/maps/world_countries.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin/dist/js/pages/dashboard2.js') ?>"></script>
    </body>
</html>