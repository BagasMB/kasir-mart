<div class="min-height-200px">
    <div class="pd-20 card-box mb-30">
        <div class="logo text-center">
            <img src="<?= base_url('assets/images/4.png'); ?>" width="200" alt="">
        </div>
        <!-- <h4 class="text-center mb-30 weight-600">INVOICE</h4> -->
        <div class="row pb-30">
            <div class="col-md-6">
                <h5 class="mb-15"><?= $penjualan->nama_pelanggan; ?></h5>
                <p class="font-14 mb-5">Date Issued: <strong class="weight-600"><?= $penjualan->tanggal; ?></strong></p>
                <p class="font-14 mb-5">Invoice No: <strong class="weight-600"><strong><?= $penjualan->kode_penjualan; ?></strong></p>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <p class="font-14 mb-5"><?= $user['nama']; ?> </strong></p>
                    <p class="font-14 mb-5">Jalan in aja dulu</p>
                    <p class="font-14 mb-5">Jungke City</p>
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
        </div>
        <!-- <div class="row pb-30">
            <div class="col-md-8"></div>
            <div class="text-right col-md-2">
                <div>Total :</div>
                <div>Potongan Harga :</div>
                <div>Total Pembayaran :</div>
                <div>DiBayar :</div>
                <div>Kembalian :</div>
            </div>
            <div class="text-right col-md-2">
                <div>Rp. <?= number_format($penjualan->total_tagihan, 0, ',', '.'); ?></div>
                <div>- Rp. <?= number_format($penjualan->potongan_harga, 0, ',', '.'); ?></div>
                <div>Rp. <?= number_format($penjualan->total_tagihan - $penjualan->potongan_harga, 0, ',', '.'); ?></div>
                <div>Rp. <?= number_format($penjualan->bayar, 0, ',', '.'); ?></div>
                <div>Rp. <?= number_format($penjualan->bayar - ($penjualan->total_tagihan - $penjualan->potongan_harga), 0, ',', '.'); ?></div>
            </div>
        </div> -->
    </div>
</div>