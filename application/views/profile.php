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
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <img src="<?= base_url('assets/images/profile/' . $user['image']); ?>" alt="" class="avatar-photo">
                </div>
                <h5 class="text-center h5 mb-0"><?= $user['nama']; ?></h5>
                <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                    <ul>
                        <li>
                            <span>Email Address:</span>
                            <?= $user['email']; ?>
                        </li>
                        <li>
                            <span>Phone Number:</span>
                            <?= $user['telp']; ?>
                        </li>
                        <li>
                            <span>Address:</span>
                            <?= $user['alamat']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4"><?= $title; ?></h4>
                    </div>
                </div>
                <form action="<?= base_url('update-profile') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']; ?>" autocomplete="off">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?= $user['telp']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $user['alamat']; ?>" autocomplete="off">
                    </div>
                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>