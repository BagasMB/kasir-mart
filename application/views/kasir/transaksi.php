<div class="min-height-200px">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4><?= $title; ?></h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(''); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h5">Pilih Produk</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" disabled value="<?= $pelanggan->nama_pelanggan; ?>" name="nama_pelanggan" autocomplete="off">
                </div>
                <form action="<?= base_url('penjualan/tambahKeranjang'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?= $pelanggan->id_pelanggan; ?>" name="id_pelanggan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Produk</label>
                        <select class="custom-select2 form-control" name="kode_barang" style="width: 100%; height: 38px;">
                            <optgroup>
                                <?php foreach ($barang as $brg) : ?>
                                    <?php if ($brg['stok'] == 0) : ?>
                                        <option value="<?= $brg['kode_barang']; ?>" disabled>#<?= $brg['kode_barang']; ?> - <?= $brg['nama']; ?> (<?= $brg['stok']; ?>)</option>
                                    <?php else : ?>
                                        <option value="<?= $brg['kode_barang']; ?>">#<?= $brg['kode_barang']; ?> - <?= $brg['nama']; ?> (<?= $brg['stok']; ?>)</option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input id="demo3_22" type="text" value="1" name="jumlah" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Table <?= $title; ?></h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- id="data-table" -->
                    <table id="data-table" class="table stripe hover nowrap text-center table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $cek = 0;
                            foreach ($temp as $tail) : ?>
                                <tr>
                                    <td><?= $tail['kode_barang']; ?></td>
                                    <td><?= $tail['nama']; ?></td>
                                    <td>
                                        <div><?= $tail['jumlah']; ?></div>
                                        <?php if ($tail['jumlah'] > $tail['stok']) {
                                            echo "<span class='badge bg-danger text-light'> Stok tidak cukup</span>";
                                            $cek = 1;
                                        } ?>
                                    </td>
                                    <td>Rp. <?= number_format($tail['harga'], 0, ',', '.'); ?></td>
                                    <td>Rp. <?= number_format($tail['jumlah'] * $tail['harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modal-edit-jumlah<?= $tail['id_temp']; ?>" class="btn btn-sm btn-warning"><i class="dw dw-edit2"></i></button>
                                        <a class="btn btn-sm btn-danger" href="<?= base_url('penjualan/hapusKeranjang/' . $tail['id_temp']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-edit-jumlah<?= $tail['id_temp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Ubah Jumlah</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form action="<?= base_url('penjualan/updateKeranjang'); ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" value="<?= $tail['id_temp']; ?>" name="id_temp">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="text" class="form-control" id="jumlah" value="<?= $tail['jumlah']; ?>" name="jumlah" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php $total = $total + $tail['jumlah'] * $tail['harga'];
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">Total :</td>
                                <td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php if ($temp != null and $cek == 0) : ?>
                    <!-- <button data-toggle="modal" data-target="#modal-bayar" class="btn btn-sm btn-warning">Bayar</button>
                    <div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Bayar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('penjualan/bayar'); ?>" method="post">
                                        <input type="hidden" value="<?= $pelanggan->id_pelanggan; ?>" name="id_pelanggan">
                                        <input type="hidden" value="<?= $total; ?>" name="total_tagihan">
                                        <input type="text" value="<?= $pelanggan->poin; ?>" name="id_pelanggan">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level">
                                                <option value="Kasir">Kasir</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div>
                        <form action="<?= base_url('penjualan/bayar2'); ?>" method="post">
                            <input type="hidden" value="<?= $pelanggan->id_pelanggan; ?>" name="id_pelanggan">
                            <input type="hidden" value="<?= $total; ?>" oninput="calculateTotal()" id="total_tagihan" name="total_tagihan">
                            <div class="form-group">
                                <div class="row">
                                    <?php if ($pelanggan->id_pelanggan > 1) : ?>
                                        <div class="col-md-4 col-sm-12 mb-2">
                                            <label>Poin (<?= $pelanggan->poin; ?>)</label>
                                            <input class="form-control" type="number" value="0" name="poin" required autocomplete="off">
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <label>Voucher</label>
                                        <select class="custom-select2 form-control" name="id_voucher" style="width: 100%; height: 38px;">
                                            <optgroup>
                                                <option>- Pilih Voucher-</option>
                                                <?php foreach ($voucher as $vou) : ?>
                                                    <option value="<?= $vou['id_voucher']; ?>"><?= $vou['nama_voucher']; ?>(<?= $vou['jumlah']; ?>) Rp.<?= number_format($vou['potongan_harga'], 0, ',', '.'); ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <label>Bayar :</label>
                                        <input class="form-control" type="text" id="bayar" name="bayar" oninput="calculateTotal()" autocomplete="off">
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <label>Kembalian :</label>
                                        <input class="form-control" type="text" id="kembalian" name="kembalian" readonly>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function formatRupiah(number) {
        return number.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }

    function calculateTotal() {
        var total_tagihan = parseFloat(document.getElementById('total_tagihan').value) || 0;
        var bayar = parseInt(document.getElementById('bayar').value) || 0;
        var kembalian = bayar - total_tagihan;
        document.getElementById('kembalian').value = formatRupiah(kembalian);
    }
</script>