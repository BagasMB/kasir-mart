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
        </div>
        <form action="<?= base_url('update-setting') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id_konfigurasi" value="<?= $konfig->id_konfigurasi; ?>" autocomplete="off">
            <div class="form-group">
                <label>Nama CV</label>
                <input type="text" class="form-control" name="nama_cv" value="<?= $konfig->nama_cv; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $konfig->email; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label>No Whatsapp</label>
                <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>" autocomplete="off">
            </div>
            <div class="form-footer mt-6">
                <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
                <button type="reset" class="btn btn-light btn-pill">Cancel</button>
            </div>
        </form>
    </div>

</div>