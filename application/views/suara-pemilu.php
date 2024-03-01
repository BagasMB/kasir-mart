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
        <form action="<?= base_url('suarapemilu/simpan'); ?>" method="post">
            <div class="form-group">
                <label>Total Suara</label>
                <input class="form-control" name="total_suara_8" type="text" autocomplete="off" autofocus>
                <?= form_error('total_suara_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Total Suara Sah</label>
                <input class="form-control" name="total_suara_sah_8" type="text" autocomplete="off">
                <?= form_error('total_suara_sah_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Total Suara Tidak Sah</label>
                <input class="form-control" name="total_suara_tidak_sah_8" type="text" autocomplete="off">
                <?= form_error('total_suara_tidak_sah_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Suara No 01</label>
                <input class="form-control" name="suara_no1_8" type="text" autocomplete="off">
                <?= form_error('suara_no1_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Suara No 02</label>
                <input class="form-control" name="suara_no2_8" type="text" autocomplete="off">
                <?= form_error('suara_no2_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Suara No 03</label>
                <input class="form-control" name="suara_no3_8" type="text" autocomplete="off">
                <?= form_error('suara_no3_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nama TPS</label>
                <input class="form-control" name="nama_tps_8" type="text" autocomplete="off">
                <?= form_error('nama_tps_8', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div align="right">
                <button type="reset" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <div class="bg-white pd-20 card-box mb-30">
        <h4 class="h4 text-blue">Bar Chart</h4>
        <div id="chartku"></div>
    </div>

    <?php
    $suara1 = $this->db->select_sum('suara_no1_8')->get('suara_8')->row_array()['suara_no1_8'];
    $suara2 = $this->db->select_sum('suara_no2_8')->get('suara_8')->row_array()['suara_no2_8'];
    $suara3 = $this->db->select_sum('suara_no3_8')->get('suara_8')->row_array()['suara_no3_8'];
    // if ($suara1 == null) {
    //     $suara1 = 0;
    // }
    ?>
    <script type='text/javascript'>
        var options3 = {
            series: [{
                    name: "Tomi",
                    data: [<?= $suara1; ?>],
                },
                {
                    name: "Bowo",
                    data: [<?= $suara2; ?>],
                },
                {
                    name: "Koko",
                    data: [<?= $suara3; ?>],
                },
            ],
            chart: {
                type: "bar",
                height: 350,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "25%",
                    endingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: ["No1", "No2", "No3"],
                categories: ["No1", "No2", "No3"],
            },
            yaxis: {
                title: {
                    text: "$(thousands)",
                },
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Suara Pemilu " + val;
                    },
                },
            },
        };
        var chart = new ApexCharts(document.querySelector("#chartku"), options3);
        chart.render();
    </script>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Table <?= $title; ?></h4>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table stripe hover nowrap  text-center">
                <thead>
                    <tr>
                        <th class="table-plus">No</th>
                        <th>Total Suara</th>
                        <th>Total Suara Sah</th>
                        <th>Total Suara Tidak Sah</th>
                        <th>Suara No 1</th>
                        <th>Suara No 2</th>
                        <th>Suara No 3</th>
                        <th>Nama TPS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($suara as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['total_suara_8']; ?></td>
                            <td><?= $value['total_suara_sah_8']; ?></td>
                            <td><?= $value['total_suara_tidak_sah_8']; ?></td>
                            <td><?= $value['suara_no1_8']; ?></td>
                            <td><?= $value['suara_no2_8']; ?></td>
                            <td><?= $value['suara_no3_8']; ?></td>
                            <td><?= $value['nama_tps_8']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>