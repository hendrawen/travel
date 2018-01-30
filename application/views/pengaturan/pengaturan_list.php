
<style>
    .dataTables_wrapper {
        min-height: 500px
    }

    .dataTables_processing {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        margin-left: -50%;
        margin-top: -25px;
        padding-top: 20px;
        text-align: center;
        font-size: 1.2em;
        color:grey;
    }
    body{
        padding: 15px;
    }
</style>
<div class="blank">
   <div class="blank-page">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Pengaturan List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('pengaturan/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pengaturan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pengaturan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Nama Perusahaan</th>
            <th>Pemilik Perusahaan</th>
            <th>Manajer Perusahaan</th>
            <th>Email</th>
            <th>Website</th>
            <th>Youtube</th>
		    <!-- <th>Program Promo</th> -->
            <!-- <th>Kerjasama</th> -->
        <!--     <th>Phone1</th>
            <th>Phone2</th>
            <th>Phone3</th> -->
            <!-- <th>Keterangan</th>
            <th>About Us</th> -->
		    <th width="200px">Action</th>
                </tr>
            </thead>

        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "pengaturan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        // {"data": "program_promo"},
                        // {"data": "kerjasama"},
                        {"data": "nama_perusahaan"},
                        {"data": "pemilik_perusahaan"},
                        {"data": "manajer_perusahaan"},
                        {"data": "email"},
                        {"data": "website"},
                        // {"data": "phone1"},
                        // {"data": "phone2"},
                        // {"data": "phone3"},
                        // {"data": "keterangan"},
                        // {"data": "about_us"},
                        {"data": "video"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </div>
</div>
