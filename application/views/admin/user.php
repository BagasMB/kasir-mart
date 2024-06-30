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
                <button data-toggle="modal" data-target="#Medium-modal" type="button" class="btn btn-primary btn-sm scroll-click" role="button">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table stripe hover nowrap text-center ">
                <thead>
                    <tr>
                        <th class="table-plus">No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Level</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_user as $ser) : ?>
                        <tr>
                            <td class="table-plus"><?= $no++; ?></td>
                            <td><?= $ser['username']; ?></td>
                            <td><?= $ser['nama']; ?></td>
                            <td><?= $ser['email']; ?></td>
                            <td><?= $ser['telp']; ?></td>
                            <td><?= $ser['level']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <button data-toggle="modal" data-target="#modal-edit<?= $ser['id_user']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                        <?php if ($user['username'] != $ser['username']) : ?>
                                            <a class="dropdown-item" href="<?= base_url('user/hapus/' . $ser['id_user']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="<?= base_url('user/reset/' . $ser['id_user']); ?>"><i class="dw dw-refresh2"></i> Reset Sandi</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $ser['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('user/edit'); ?>" method="post">
                                        <input type="hidden" name="id_user" value="<?= $ser['id_user']; ?>">
                                        <input type="hidden" name="level" value="<?= $ser['level']; ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <label>Username</label>
                                                    <input class="form-control" name="username" value="<?= $ser['username']; ?>" type="text" autocomplete="off" readonly>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label>Nama</label>
                                                    <input class="form-control" type="text" name="nama" value="<?= $ser['nama']; ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="email" value="<?= $ser['email']; ?>" autocomplete="off">
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label>No Telp</label>
                                                    <input class="form-control" type="text" name="telp" value="<?= $ser['telp']; ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control" type="text" name="alamat" value="<?= $ser['alamat']; ?>" autocomplete="off">
                                            </div>
                                            <?php if ($user['username'] != $ser['username']) : ?>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select class="form-control" name="level">
                                                        <option <?php if ($ser['level'] == 'Kasir') {
                                                                    echo "selected";
                                                                } ?> value="Kasir">Kasir</option>
                                                        <option <?php if ($ser['level'] == 'Admin') {
                                                                    echo "selected";
                                                                } ?> value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
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


<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('user/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label>Username</label>
                            <input class="form-control" placeholder="Username" name="username" type="text" autocomplete="off" autofocus>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Password</label>
                            <input class="form-control" placeholder="*******" name="password" type="password" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="Johnny Brown" autocomplete="off">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="johnny@gmail.com" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label>No Telp</label>
                            <input class="form-control" type="text" name="telp" placeholder="081234567889" autocomplete="off">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Alamat</label>
                            <input class="form-control" type="text" name="alamat" placeholder="1807 Holden Street San Diego, CA 92115" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="Kasir">Kasir</option>
                            <option value="Admin">Admin</option>
                        </select>
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