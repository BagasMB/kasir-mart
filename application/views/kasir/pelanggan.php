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


    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Table <?= $title; ?></h4>
            </div>
            <div class="pull-right">
                <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-primary btn-sm scroll-click" role="button">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table stripe hover nowrap  text-center">
                <thead>
                    <tr>
                        <th class="table-plus">No</th>
                        <th>Name Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Poin</th>
                        <th>Alamat</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan as $gori) : ?>
                        <tr>
                            <td class="table-plus"><?= $no++; ?></td>
                            <td><?= $gori['nama_pelanggan']; ?></td>
                            <td><?= $gori['telp']; ?></td>
                            <td><?= $gori['poin']; ?></td>
                            <td><?= $gori['alamat']; ?></td>
                            <td>
                                <?php if ($gori['id_pelanggan'] != 1) : ?>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('pelanggan/transaksiPelanggan/' . $gori['id_pelanggan']); ?>"><i class="dw dw dw-eye mr-10"></i>Riwayat Transaksi</a>
                                            <a class="dropdown-item" href="<?= base_url('penjualan/transaksi/' . $gori['id_pelanggan']); ?>"><i class="dw dw-shopping-cart mr-10"></i>Transaksi</a>
                                            <button data-toggle="modal" data-target="#modal-edit<?= $gori['id_pelanggan']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                            <a class="dropdown-item" href="<?= base_url('pelanggan/hapus/' . $gori['id_pelanggan']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <a class="text-primary" href="<?= base_url('penjualan/transaksi/' . $gori['id_pelanggan']); ?>"><i class="dw dw-shopping-cart mr-10"></i>Transaksi</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $gori['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit pelanggan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('pelanggan/edit'); ?>" method="post">
                                        <input name="id_pelanggan" type="hidden" value="<?= $gori['id_pelanggan']; ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama pelanggan Barang</label>
                                                <input class="form-control" placeholder="Budi Santoso" name="nama_pelanggan" value="<?= $gori['nama_pelanggan']; ?>" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input class="form-control" placeholder="08123456789" name="telp" value="<?= $gori['telp']; ?>" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control" placeholder="Buri Omah" name="alamat" value="<?= $gori['alamat']; ?>" type="text" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('pelanggan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input class="form-control" placeholder="Budi Santoso" name="nama_pelanggan" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="form-control" placeholder="08123456789" name="telp" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" placeholder="Buri Omah" name="alamat" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>