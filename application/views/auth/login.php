<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Login | Dulu</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/deskap/'); ?>vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/deskap/'); ?>vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/deskap/'); ?>vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url('assets/deskap/'); ?>vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Kasir Mart</h2>
                        </div>
                        <div id="ngilang">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <form action="<?= base_url('Auth'); ?>" method="post">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autocomplete="off" autofocus>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="**********" autocomplete="off">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/core.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/script.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/process.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/layout-settings.js"></script>
    <script>
        $('#ngilang').delay('slow').slideDown('slow').delay(4000).slideUp(600)
    </script>
</body>

</html>