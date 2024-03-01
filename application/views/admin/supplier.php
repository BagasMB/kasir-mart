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
            <table id="data-table" class="table stripe hover nowrap text-center">
                <thead>
                    <tr>
                        <th class="table-plus">No</th>
                        <th>Name Supplier Barang</th>
                        <th>No Telp</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplier as $sub) : ?>
                        <tr>
                            <td class="table-plus"><?= $sub['kode_supplier']; ?></td>
                            <td><?= $sub['nama_supplier']; ?></td>
                            <td><?= $sub['telp']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <button data-toggle="modal" data-target="#modal-edit<?= $sub['id_supplier']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                        <a class="dropdown-item" href="<?= base_url('supplier/hapus/' . $sub['id_supplier']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $sub['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit Supplier</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('supplier/edit'); ?>" method="post">
                                        <input name="id_supplier" type="hidden" value="<?= $sub['id_supplier']; ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Supplier Barang</label>
                                                <input class="form-control" placeholder="Nama Supplier" name="nama_supplier" value="<?= $sub['nama_supplier']; ?>" type="text" autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input class="form-control" name="telp" placeholder="081211111111" value="<?= $sub['telp']; ?>" type="tel" autocomplete="off">
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
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Supplier Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('supplier/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplier Barang</label>
                        <input class="form-control" placeholder="Nama Supplier" name="nama_supplier" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="form-control" name="telp" placeholder="081211111111" type="tel" autocomplete="off">
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