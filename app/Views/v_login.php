<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?? 'Login' ?> | MYKasir-INF24</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/dist/css/adminlte.min.css') ?>">
    
    <style>
        body.login-page {
            background: linear-gradient(-45deg, #0057b8, #e31b23, #ffd400, #0057b8) !important;
            background-size: 400% 400% !important;
            animation: bgMarketLogin 12s ease infinite !important;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes bgMarketLogin {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            width: 400px;
        }

        /* Card bergaya transparan premium (Glassmorphism) */
        .card-premium-login {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(10px);
            border-radius: 20px !important;
            border: 2px solid rgba(255, 255, 255, 0.5) !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
            overflow: hidden;
        }

        .card-premium-login .card-header {
            background: linear-gradient(90deg, #0057b8, #e31b23);
            border-bottom: none;
            padding: 20px;
        }

        .card-premium-login .card-header a {
            color: #fff !important;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .form-control {
            border-radius: 10px !important;
            border: 1px solid #cbd5e1;
            padding: 12px 15px;
            height: auto;
        }

        .form-control:focus {
            border-color: #0057b8;
            box-shadow: 0 0 0 3px rgba(0, 87, 184, 0.15);
        }

        .input-group-text {
            border-radius: 0 10px 10px 0 !important;
            background-color: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-left: none;
        }

        .btn-premium-login {
            background: #ffd400 !important;
            color: #000 !important;
            font-weight: 700;
            border: none;
            border-radius: 10px !important;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(255, 212, 0, 0.4);
            transition: 0.2s ease;
        }

        .btn-premium-login:hover {
            background: #e6be00 !important;
            transform: translateY(-1px);
        }

        .alert {
            border-radius: 12px !important;
            border: none;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-premium-login">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1"><b>MY</b>Kasir</a>
            </div>
            <div class="card-body" style="padding: 30px;">
                <p class="login-box-msg font-weight-bold text-muted" style="font-size: 16px;">Selamat Datang, Silakan Login</p>
                
                <?php $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <h6 class="font-weight-bold"><i class="fas fa-exclamation-triangle"></i> Periksa Kembali:</h6>
                        <ul class="mb-0 pl-3 small">
                            <?php foreach ($errors as $key => $error) { ?>
                                <li><?= esc($error) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php if (session()->getFlashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <small class="font-weight-bold"><i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan') ?></small>
                    </div>
                <?php } ?>

                <?php if (session()->getFlashdata('gagal')) { ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <small class="font-weight-bold" style="color: #000;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('gagal') ?></small>
                    </div>
                <?php } ?>

                <?php echo form_open('public/home/CekLogin') ?>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope text-primary"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember" class="text-muted small font-weight-bold">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-block btn-premium-login">
                            Sign In <i class="fas fa-sign-in-alt ml-1"></i>
                        </button>
                    </div>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>

    <script src="<?= base_url('public/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>