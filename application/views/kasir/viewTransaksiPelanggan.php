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
                        <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Pelanggan</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h5">Table <?= $title . " Yang Bernama " . $pelanggan->nama_pelanggan; ?></h4>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table stripe hover nowrap  text-center">
                <thead>
                    <tr>
                        <th class="table-plus">Kode Penjualan</th>
                        <th>Name Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total Tagihan</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penjualan as $gori) : ?>
                        <tr>
                            <td class="table-plus"><?= $gori['kode_penjualan']; ?></td>
                            <td><?= $gori['nama_pelanggan']; ?></td>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $hari = date("D", strtotime($gori['tanggal']));
                            switch ($hari) {
                                case 'Sun':
                                    $hari_ini = "Minggu";
                                    break;

                                case 'Mon':
                                    $hari_ini = "Senin";
                                    break;

                                case 'Tue':
                                    $hari_ini = "Selasa";
                                    break;

                                case 'Wed':
                                    $hari_ini = "Rabu";
                                    break;

                                case 'Thu':
                                    $hari_ini = "Kamis";
                                    break;

                                case 'Fri':
                                    $hari_ini = "Jumat";
                                    break;

                                case 'Sat':
                                    $hari_ini = "Sabtu";
                                    break;

                                default:
                                    $hari_ini = "Tidak di ketahui";
                                    break;
                            }
                            ?>
                            <td><?= $hari_ini, ', ', date('d M Y', strtotime($gori['tanggal'])); ?></td>
                            <td class="text-right">Rp <?= number_format($gori['total_tagihan'], 0, ',', '.'); ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('penjualan/invoice/' . $gori['kode_penjualan']); ?>"><i class="dw dw-eye"></i> View</a>
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