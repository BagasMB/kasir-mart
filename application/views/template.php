<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title; ?></title>

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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/icon-font.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">
    <!-- Fancybox -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/fancybox/dist/jquery.fancybox.css">
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/switchery/switchery.min.css">
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">

    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/apexcharts-setting.js"></script>

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

<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <!-- aaa -->
        </div>
        <div class="header-right">
            <!-- <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div> -->
            <div class="user-info-dropdown mr-5">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url('assets/images/profile/' . $user['image']); ?>" alt="">
                        </span>
                        <span class="user-name"><?= $user['nama']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="<?= base_url('Profile'); ?>"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="<?= base_url('Setting-Website'); ?>"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <!-- <div class="github-link">
                <a href="https://github.com/BagasMB" target="_blank"><img src="<?= base_url('assets/deskap/'); ?>vendors/images/github.svg" alt=""></a>
            </div> -->
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/images/4.png'); ?>" alt="" class="dark-logo">
                <img src="<?= base_url('assets/images/5.png'); ?>" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <?php $menu = $this->uri->segment(1);
                    $menu2 = $this->uri->segment(2); ?>
                    <li>
                        <a href="<?= base_url(''); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'dashboard') {
                                                                                            echo "active";
                                                                                        } elseif ($menu == '') {
                                                                                            echo "active";
                                                                                        } ?>">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('pelanggan'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'pelanggan') {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <span class="micon dw dw-id-card2"></span><span class="mtext">Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('barang'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'barang') {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <span class="micon dw dw-box"></span><span class="mtext">Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('pembelian'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'pembelian') {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <span class="micon dw dw-food-cart"></span><span class="mtext">Pembelian</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('penjualan'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'penjualan') {
                                                                                                    echo "active";
                                                                                                } ?>">
                            <span class="micon dw dw-shopping-cart"></span><span class="mtext">Penjualan</span>
                        </a>
                    </li>
                    <?php if ($user['level'] == 'Admin') : ?>
                        <!-- <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <div class="sidebar-small-cap">Pemilu</div>
                        </li>
                        <li>
                            <a href="<?= base_url('suarapemilu'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'suarapemilu') {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                <span class="micon dw dw-email-1"></span><span class="mtext">Suara pemilu</span>
                            </a>
                        </li> -->

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <div class="sidebar-small-cap">Admin Page</div>
                        </li>
                        <li>
                            <a href="<?= base_url('user'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'user') {
                                                                                                    echo "active";
                                                                                                } ?>">
                                <span class="micon dw dw-user1"></span><span class="mtext">User</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kategori'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'kategori') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <span class="micon dw dw-table1"></span><span class="mtext">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('voucher'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'voucher') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <span class="micon icon-copy fi-ticket"></span><span class="mtext">Voucher</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('supplier'); ?>" class="dropdown-toggle no-arrow <?php if ($menu == 'supplier') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <span class="micon dw dw-id-card1"></span><span class="mtext">Supplier</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20  xs-pd-20-10">

            <div id="alert-succeed" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div id="alert-wrong" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

            <?= $contents; ?>
            <div class="footer-wrap pd-20 mb-20 card-box">
                By <a href="https://github.com/BagasMB" target="_blank">BagasMB</a> Copyright &copy; Your Website <span id="copy-year"></span>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/core.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/script.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/process.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/dashboard.js"></script>

    <!-- Data Table -->
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/datatable-setting.js"></script>

    <!-- fancybox Popup Js -->
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/fancybox/dist/jquery.fancybox.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>

    <!-- switchery js -->
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/switchery/switchery.min.js"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <!-- bootstrap-touchspin js -->
    <script src="<?= base_url('assets/deskap/'); ?>src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="<?= base_url('assets/deskap/'); ?>vendors/scripts/advanced-components.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('#barang').autocomplete({
                source: "<?= site_url('barang/get_autofill/?'); ?>"
            })
        })

        const flashData = $("#alert-succeed").data("flashdata"),
            flash = $("#alert-wrong").data("flashdata");
        if (flashData) {
            swal.fire({
                icon: "success",
                title: "Selamat",
                text: flashData,
                type: "success",
            });
        }
        if (flash) {
            swal.fire({
                icon: "error",
                title: "Gagal Kenapa?",
                text: flash,
            });
        }

        $(document).on("click", "#btn-hapus", function(e) {
            e.preventDefault();
            const href = $(this).attr("href");

            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data Akan DiHapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus Data!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = href;
                }
            });
        });

        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</body>

</html>