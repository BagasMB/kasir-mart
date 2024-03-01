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
                        <li class="breadcrumb-item"><a href="<?= base_url('pembelian'); ?>">Pembelian</a></li>
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
                <!-- <p>Add class <code>.table</code></p> -->
            </div>
        </div>
        <form action="<?= base_url('pembelian/tambah'); ?>" method="post">
            <div class="form-group">
                <label>Barang</label>
                <select class="custom-select2 form-control" name="kode_barang" style="width: 100%; height: 38px;">
                    <optgroup>
                        <?php foreach ($barang as $brg) : ?>
                            <option value="<?= $brg['kode_barang']; ?>"><?= $brg['nama']; ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input class="form-control" name="jumlah" type="number" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input class="form-control" name="tanggal" type="date">
            </div>
            <div class="form-group">
                <label>Supplier Barang</label>
                <select name="kode_supplier" class="form-control">
                    <?php foreach ($supplier as $lier) : ?>
                        <option value="<?= $lier['kode_supplier']; ?>"><?= $lier['nama_supplier']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div align="right">
                <a href="<?= base_url('pembelian'); ?>" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>

</div>