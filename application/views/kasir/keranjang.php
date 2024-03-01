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
                        <li class="breadcrumb-item"><a href="<?= base_url('penjualan'); ?>">Penjualan</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Table <?= $title; ?></h4>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table stripe hover nowrap table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th class="datatable-nosort">Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->cart->contents() as $item) : ?>
                        <tr>
                            <td class="table-plus"><?= $item['name']; ?></td>
                            <td><?= $item['qty']; ?></td>
                            <td align="right">Rp. <?= number_format($item['price'], 0, ',', '.'); ?></td>
                            <td align="right">Rp. <?= number_format($item['subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-right">Total : </td>
                        <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>

            <div align="right">
                <a href="<?= base_url('penjualan/hapus_keranjang') ?>" class="btn btn-danger btn-sm"><i class="dw dw-delete-3"></i> Hapus Keranjang</a>
                <a href="<?= base_url('penjualan') ?>" class="btn btn-primary btn-sm"><i class="icon-copy fa fa-cart-plus" aria-hidden="true"></i> Tambah Pemesanan</a>
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-success btn-sm scroll-click" role="button"><i class="icon-copy dw dw-money-1"></i> Pembayaran</button>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php if ($this->cart->contents() == null) : ?>
                <div class="modal-body text-center">
                    <h5><em>Keranjang Belanjaan Anda Masih Kosong</em></h5>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('penjualan'); ?>" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            <?php else : ?>
                <!-- <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div> -->
                <form action="<?= base_url('penjualan/proses_pembayaraan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Member</label>
                            <select class="form-control" name="member">
                                <option value="">Non Member</option>
                                <option value="">Member</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select class="custom-select2 form-control" name="kode_barang" style="width: 100%; height: 38px;">
                                <optgroup>
                                    <option value="">ajsbkjakbsjk</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bayar</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control" name="bayar" aria-describedby="basic-addon1" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Bayar</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('penjualan/proses_pemesanan'); ?>" method="post">
                <div class="modal-body">
                    popop
                </div>
                <div class="modal-footer">
                    <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>