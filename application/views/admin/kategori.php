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
                        <th>Name Kategori Barang</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $gori) : ?>
                        <tr>
                            <td class="table-plus"><?= $no++; ?></td>
                            <td><?= $gori['nama_kategori']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <button data-toggle="modal" data-target="#modal-edit<?= $gori['id_kategori']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                        <a class="dropdown-item" href="<?= base_url('kategori/hapus/' . $gori['id_kategori']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $gori['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit Kategori Barang</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('kategori/edit'); ?>" method="post">
                                        <input name="id_kategori" type="hidden" value="<?= $gori['id_kategori']; ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Kategori Barang</label>
                                                <input class="form-control" placeholder="Nama Kategori Barang" name="nama_kategori" value="<?= $gori['nama_kategori']; ?>" type="text" autocomplete="off" autofocus>
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
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('kategori/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori Barang</label>
                        <input class="form-control" placeholder="Nama Kategori Barang" name="nama_kategori" type="text" autocomplete="off" autofocus>
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