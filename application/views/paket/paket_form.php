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
        <h2 style="margin-top:0px">Paket <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Paket <?php echo form_error('nama_paket') ?></label>
            <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Nama Paket" value="<?php echo $nama_paket; ?>" />
        </div>
	    <div class="form-group">
            <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
            <textarea class="form-control" rows="3" name="gambar" id="gambar" placeholder="Gambar"><?php echo $gambar; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="decimal">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jenis Paket <?php echo form_error('id_jenis_paket') ?></label>
            <input type="text" class="form-control" name="id_jenis_paket" id="id_jenis_paket" placeholder="Id Jenis Paket" value="<?php echo $id_jenis_paket; ?>" />
        </div>
	    <input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paket') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>