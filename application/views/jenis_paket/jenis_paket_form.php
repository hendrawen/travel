<div class="blank">
   <div class="blank-page">
        <h2 style="margin-top:0px">Jenis Paket <?php echo $button ?></h2>
       <!--  <form action="<?php echo $action; ?>" method="post"> -->
       <?php echo form_open_multipart($action);?>
	    <div class="form-group">
            <label for="varchar">Jenis Paket <?php echo form_error('jenis_paket') ?></label>
            <input type="text" class="form-control" name="jenis_paket" id="jenis_paket" placeholder="Jenis Paket" value="<?php echo $jenis_paket; ?>" />
        </div>
        <div class="form-group">
            <label for="gambar">Gambar </label>
             <?php
                    if ($button == 'Create') {
                ?>
                    <input type="file" class="form-control" name="gambar" id="gambar" required/>
                <?php } elseif ($button == 'Update') {
                ?>  
                    <div class="">
                        <a href="" target="_blank"><img src="<?=base_url();?>assets2/images/<?=$gambar;?>" style="width: 500px; height: 250px; margin-bottom: 5px;" class="img-rounded" alt=""></a><br /><p><?php echo $gambar; ?></p>
                    </div>
                    <input type="file" class="form-control" name="gambar" id="gambar" />
                <?php } ?>
            <span class="help-block">Format Foto : gif, png, jpg, jpeg, bmp. Max file size 50Mb</span>
            <!-- <textarea class="form-control" rows="3" name="gambar" id="gambar" placeholder="Gambar"><?php echo $gambar; ?></textarea> -->
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div> -->
	    <input type="hidden" name="id_jenis_paket" value="<?php echo $id_jenis_paket; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_paket') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>