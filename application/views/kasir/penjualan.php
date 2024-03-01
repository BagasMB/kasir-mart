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
            <!-- <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <?php
                    $keranjang = '<span class="btn btn-primary"> Keranjang <i class="icon-copy dw dw-shopping-cart"></i> : ' . $this->cart->total_items() . ' Items </span>';
                    ?>
                    <?= anchor('penjualan/detai_keranjang', $keranjang); ?>
                </div>
            </div> -->
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Table <?= $title; ?></h4>
            </div>
            <div class="pull-right">
                <button type="button" data-toggle="modal" data-target="#modal-pilihmember" class="btn btn-primary btn-sm scroll-click" role="button">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table stripe hover nowrap text-center ">
                <thead>
                    <tr>
                        <th class="table-plus">Kode Penjualan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th class="datatable-nosort">Total Tagihan</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($penjualan as $jual) : ?>
                        <tr>
                            <td class="table-plus"><?= $jual['kode_penjualan']; ?></td>
                            <td><?= $jual['nama_pelanggan']; ?></td>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $hari = date("D", strtotime($jual['tanggal']));
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
                            <td><?= $hari_ini, ', ', date('d M Y', strtotime($jual['tanggal'])); ?></td>
                            <td class="text-right">Rp <?= number_format($jual['total_tagihan'], 0, ',', '.'); ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('penjualan/invoice/' . $jual['kode_penjualan']); ?>"><i class="dw dw-eye"></i> View</a>
                            </td>
                        </tr>
                    <?php $total = $total + $jual['total_tagihan'];
                    endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Total :</td>
                        <td class="text-right">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-pilihmember" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Pilih Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table stripe hover nowrap  text-center">
                            <thead>
                                <tr>
                                    <th class="table-plus">No</th>
                                    <th>Name Pelanggan</th>
                                    <th>No Telepon</th>
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
                                        <td><?= $gori['alamat']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url('penjualan/transaksi/' . $gori['id_pelanggan']); ?>">Pilih</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <a href="<?= base_url('penjualan/transaksi/'); ?>" class="btn btn-secondary">Non Member</a>
                </div> -->
            </div>
        </div>
    </div>

</div>