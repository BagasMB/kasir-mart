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
                        <li class="breadcrumb-item"><a href="<?= base_url('transaksi'); ?>"><?= $title2; ?></a></li>
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
            <table class="table stripe hover nowrap table-bordered text-center ">
                <thead>
                    <tr>
                        <th class="table-plus">Kode Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th class="datatable-nosort">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail as $tail) : ?>
                        <tr>
                            <td class="table-plus"><?= $tail['kode_penjualan']; ?></td>
                            <td><?= $tail['nama']; ?></td>
                            <td class="text-right">Rp <?= number_format($tail['harga'], 0, ',', '.'); ?></td>
                            <td><?= $tail['jumlah']; ?></td>
                            <td class="text-right">Rp <?= number_format($tail['sub_total'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-right">Total : </td>
                        <td class="text-right">Rp <?= number_format($tail['total_tagihan'], 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <div align="right">
                <a href="<?= base_url('transaksi'); ?>" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>

    </div>
</div>