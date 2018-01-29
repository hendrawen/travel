<div class="blank">
   <div class="blank-page">
        <h2 style="margin-top:0px">Promo Wisata <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Paket <?php echo form_error('nama_paket') ?></label>
            <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Nama Paket" value="<?php echo $nama_paket; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="ckeditor" id="ckedtor" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <input type="hidden" name="id_promo" value="<?php echo $id_promo; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('promo_wisata') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>