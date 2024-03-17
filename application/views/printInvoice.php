<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Nota Pembayaran</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/deskap/'); ?>vendors/styles/style.css">
</head>

<body onload="javascript:window.print()">
    <!-- onload="javascript:window.print()" -->
    <div class="min-height-200px">
        <div class="pd-20 mb-30">
            <div class="logo text-center">
                <img src="<?= base_url('assets/images/4.png'); ?>" width="200" alt="">
            </div>
            <!-- <h4 class="text-center mb-30 weight-600">INVOICE</h4> -->
            <div class="row pb-30">
                <div class="col-6">
                    <h5 class="mb-15"><?= $penjualan->nama_pelanggan; ?></h5>
                    <p class="font-14 mb-5">Tanggal: <strong class="weight-600"><?= date('d-m-Y', strtotime($penjualan->tanggal)); ?></strong></p>
                    <p class="font-14 mb-5">No Invoice: <strong class="weight-600"><?= $penjualan->kode_penjualan; ?></strong></p>
                    <p class="font-14 mb-5">Alamat: <strong class="weight-600"><?= $penjualan->alamat; ?></strong></p>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h6 class="mb-15"><?= $penjualan->nama; ?></h6>
                        <p class="font-14 mb-5"><?= $konfig->nama_cv; ?></p>
                        <p class="font-14 mb-5"><?= $konfig->alamat; ?></p>
                        <p class="font-14 mb-5">Postcode 57713</p>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($detail as $value) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $value['kode_barang']; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['jumlah']; ?></td>
                                <td class="text-right">Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></td>
                                <td class="text-right">Rp. <?= number_format($value['jumlah'] * $value['harga'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                <div>Total :</div>
                                <div>Potongan Harga :</div>
                                <div>Total Pembayaran :</div>
                                <div>DiBayar :</div>
                                <div>Kembalian :</div>
                            </td>
                            <td class="text-right">
                                <div>Rp. <?= number_format($penjualan->total_tagihan, 0, ',', '.'); ?></div>
                                <div>- Rp. <?= number_format($penjualan->potongan_harga, 0, ',', '.'); ?></div>
                                <div>Rp. <?= number_format($penjualan->total_tagihan - $penjualan->potongan_harga, 0, ',', '.'); ?></div>
                                <div>Rp. <?= number_format($penjualan->bayar, 0, ',', '.'); ?></div>
                                <div>Rp. <?= number_format($penjualan->bayar - ($penjualan->total_tagihan - $penjualan->potongan_harga), 0, ',', '.'); ?></div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="footer-wrap pd-20 mb-20">
                    Kritik&Saran : <?= $konfig->no_wa; ?> <br>
                    Email : <?= $konfig->email; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>