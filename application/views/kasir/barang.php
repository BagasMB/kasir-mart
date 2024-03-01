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
                        <th>Name Barang</th>
                        <th>Stok Barang</th>
                        <th>Harga Jual</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $rang) : ?>
                        <tr>
                            <td class="table-plus"><?= $rang['kode_barang']; ?></td>
                            <td><?= $rang['nama']; ?></td>
                            <td><?= $rang['stok']; ?></td>
                            <td>Rp <?= number_format($rang['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                        <button data-toggle="modal" data-target="#modal-edit<?= $rang['id_barang']; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</button>
                                        <a class="dropdown-item" href="<?= base_url('barang/hapus/' . $rang['id_barang']); ?>" id="btn-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-edit<?= $rang['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Edit Barang</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form action="<?= base_url('barang/edit'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_barang" value="<?= $rang['id_barang']; ?>">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input class="form-control" value="<?= $rang['nama']; ?>" placeholder="Nama Barang" name="nama" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Jual</label>
                                                <input class="form-control" value="<?= $rang['harga']; ?>" placeholder="Harga Jual" name="harga" type="text" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori Barang</label>
                                                <select name="id_kategori" class="form-control">
                                                    <?php foreach ($kategori as $value) : ?>
                                                        <option value="<?= $value['id_kategori']; ?>" <?php if ($rang['id_kategori'] == $value['id_kategori']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $value['nama_kategori']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="foto" class="form-control-file form-control height-auto" autocomplete="off">
                                            </div> -->
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
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('barang/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namabrg">Nama Barang</label>
                        <input class="form-control" id="namabrg" placeholder="Nama Barang" name="nama" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="hrgjl">Harga Jual</label>
                        <input class="form-control" id="hrgjl" placeholder="Harga Jual" name="harga" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kate">Kategori Barang</label>
                        <select name="id_kategori" id="kate" class="form-control">
                            <?php foreach ($kategori as $value) : ?>
                                <option value="<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file form-control" autocomplete="off">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>