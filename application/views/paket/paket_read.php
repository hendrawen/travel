<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Paket Read</h2>
        <table class="table">
	    <tr><td>Nama Paket</td><td><?php echo $nama_paket; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Id Jenis Paket</td><td><?php echo $id_jenis_paket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paket') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>