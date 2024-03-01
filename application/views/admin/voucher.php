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
            <table id="data-table" class="table stripe hover nowrap text-center ">
                <thead>
                    <tr>
                        <th class="table-plus">No</th>
                        <th>Nama</th>
                        <th>Potongan Harga</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($voucher as $cher) : ?>
                        <tr>
                            <td class="table-plus"><?= $no++; ?></td>
                            <td><?= $cher['nama_voucher']; ?></td>
                            <td>Rp <?= number_format($cher['potongan_harga'], 0, ',', '.'); ?></td>
                            <td>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $hari = date("D", strtotime($cher['waktu']));
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
                                <div><?= $hari_ini, ' ,', date('d M Y', strtotime($cher['waktu'])); ?></div>
                                <?php if ($cher['waktu'] < date('Y-m-d')) {
                                    echo "<span class='badge bg-danger text-light'>Voucher Kadarluasa</span>";
                                    $cek = 1;
                                } ?>
                            </td>
                            <td>
                                <?php if ($cher['jumlah'] > 0) : ?>
                                    <?= $cher['jumlah']; ?>
                                <?php else : ?>
                                    <span class='badge bg-danger text-light'>Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <button data-toggle="modal" data-target="#modal-edit<?= $cher['id_voucher']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                        <a class="dropdown-item" href="<?= base_url('voucher/hapus/' . $cher['id_voucher']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $cher['id_voucher']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit voucher</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('voucher/edit'); ?>" method="post">
                                        <input type="hidden" name="id_voucher" value="<?= $cher['id_voucher']; ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control" placeholder="Nama Voucher" value="<?= $cher['nama_voucher']; ?>" name="nama_voucher" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Potongan Harga</label>
                                                <input class="form-control" placeholder="Potongan Harga" value="<?= $cher['potongan_harga']; ?>" name="potongan_harga" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input class="form-control" value="<?= $cher['waktu']; ?>" name="waktu" type="date" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input type="number" value="<?= $cher['jumlah']; ?>" class="form-control" name="jumlah" autocomplete="off">
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
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Voucher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('voucher/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" placeholder="Nama Voucher" name="nama_voucher" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Potongan Harga</label>
                        <input class="form-control" placeholder="Potongan Harga" name="potongan_harga" type="number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Batas Waktu Voucher</label>
                        <input class="form-control" name="waktu" type="date" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input class="form-control" type="number" value="1" name="jumlah" autocomplete="off">
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