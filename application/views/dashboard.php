<!-- <div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4 mb-10">
            <img src="<?= base_url('assets/deskap/'); ?>vendors/images/banner-img.png" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back <div class="weight-600 font-30 text-blue"><?= $user['nama']; ?>!</div>
            </h4>
            <p class="font-18 max-width-600">Selamat datang di Kasir Mart.</p>
        </div>
    </div>
</div> -->

<div class="row clearfix progress-box">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
        <div class="card-box pd-30 height-100-p">
            <div class="progress-box text-center">
                <h5 class="text-blue padding-top-10 h5">Penjualan Hari Ini</h5>
                <h4 class="d-block">Rp. <?= number_format($hari_ini, 0, ',', '.'); ?></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
        <div class="card-box pd-30 height-100-p">
            <div class="progress-box text-center">
                <h5 class="text-light-green padding-top-10 h5">Penjualan Bulan Ini</h5>
                <h4 class="d-block">Rp. <?= number_format($bulan_ini, 0, ',', '.'); ?></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
        <div class="card-box pd-30 height-100-p">
            <div class="progress-box text-center">
                <h5 class="text-light-orange padding-top-10 h5">Transaksi Hari Ini</h5>
                <h4 class="d-block"><?= $transaksi; ?> Penjualan</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
        <div class="card-box pd-30 height-100-p">
            <div class="progress-box text-center">
                <h5 class="text-light-purple padding-top-10 h5">Barang</h5>
                <h4 class="d-block"><?= $barang; ?> Produk</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Activity</h2>
            <div id="mychart"></div>
        </div>
    </div>
    <div class="col-md-4 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Top List Produk</h2>
            <div class="card-body">
                <table class="table table-borderless table-thead-border ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="border-top border-bottom">
                        <?php foreach ($jumlah_barang as  $value) : ?>
                            <tr>
                                <td class="text-dark font-weight-bold"><?= $value->nama; ?></td>
                                <td class="text-right"><?= $value->jumlah; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="border-top text-right">
                        <tr>
                            <td></td>
                            <td><a href="<?= base_url('penjualan'); ?>" class="text-uppercase">See All</a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

$bulan_now = date('M');
$nb_1 = date('M', strtotime('-1 Months'));
$nb_2 = date('M', strtotime('-2 Months'));
$nb_3 = date('M', strtotime('-3 Months'));
$nb_4 = date('M', strtotime('-4 Months'));
$nb_5 = date('M', strtotime('-5 Months'));
$nb_6 = date('M', strtotime('-6 Months'));

$mounth = date('Y-m');
$mounth_now = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $mounth)->count_all_results();
$pembelian_now = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $mounth)->count_all_results();

$tanggal_1 = date('Y-m', strtotime('-1 Months'));
$pembelian_1 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_1)->count_all_results();
$bulan_1 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_1)->count_all_results();

$tanggal_2 = date('Y-m', strtotime('-2 Months'));
$bulan_2 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_2)->count_all_results();
$pembelian_2 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_2)->count_all_results();

$tanggal_3 = date('Y-m', strtotime('-3 Months'));
$bulan_3 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_3)->count_all_results();
$pembelian_3 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_3)->count_all_results();

$tanggal_4 = date('Y-m', strtotime('-4 Months'));
$bulan_4 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_4)->count_all_results();
$pembelian_4 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_4)->count_all_results();

$tanggal_5 = date('Y-m', strtotime('-5 Months'));
$bulan_5 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_5)->count_all_results();
$pembelian_5 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_5)->count_all_results();

$tanggal_6 = date('Y-m', strtotime('-6 Months'));
$bulan_6 = $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_6)->count_all_results();
$pembelian_6 = $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal_6)->count_all_results();


if ($bulan_1 == null or $pembelian_1 == null) {
    $bulan_1 = 0;
    $pembelian_1 = 0;
}
if ($bulan_2 == null or $pembelian_2 == null) {
    $bulan_2 = 0;
    $pembelian_2 = 0;
}
if ($bulan_3 == null or $pembelian_3 == null) {
    $bulan_3 = 0;
    $pembelian_3 = 0;
}
if ($bulan_4 == null or $pembelian_4 == null) {
    $bulan_4 = 0;
    $pembelian_4 = 0;
}
if ($bulan_5 == null or $pembelian_5 == null) {
    $bulan_5 = 0;
    $pembelian_5 = 0;
}
if ($bulan_6 == null or $pembelian_6 == null) {
    $bulan_6 = 0;
    $pembelian_6 = 0;
}
?>
<script type='text/javascript'>
    var mychart = {
        series: [{
            name: "Penjualan",
            data: [<?= $bulan_6; ?>, <?= $bulan_5; ?>, <?= $bulan_4; ?>, <?= $bulan_3; ?>, <?= $bulan_2; ?>, <?= $bulan_1; ?>, <?= $mounth_now; ?>],
        }, {
            name: "Pembelian",
            data: [<?= $pembelian_6; ?>, <?= $pembelian_5; ?>, <?= $pembelian_4; ?>, <?= $pembelian_3; ?>, <?= $pembelian_2; ?>, <?= $pembelian_1; ?>, <?= $pembelian_now; ?>],
        }, ],
        xaxis: {
            categories: ["<?= $nb_6; ?>", "<?= $nb_5; ?>", "<?= $nb_4; ?>", "<?= $nb_3; ?>", "<?= $nb_2; ?>", "<?= $nb_1; ?>", "<?= $bulan_now; ?>"],
        },
        chart: {
            type: "area",
            height: 350,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "25%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val;
                },
            },
        },
    };
    var chart = new ApexCharts(document.querySelector("#mychart"), mychart);
    chart.render();
</script>