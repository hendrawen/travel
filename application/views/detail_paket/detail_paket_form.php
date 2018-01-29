<div class="blank">
   <div class="blank-page">
        <h2 style="margin-top:0px">Sub Paket <?php echo $button ?></h2>
        <!-- <form action="<?php echo $action; ?>" method="post"> -->
        <?php echo form_open_multipart($action);?>
	    <div class="form-group">
            <label for="varchar">Nama Detail <?php echo form_error('nama_detail') ?></label>
            <input type="text" class="form-control" name="nama_detail" id="nama_detail" placeholder="Nama Detail" value="<?php echo $nama_detail; ?>" required/>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Paket <?php echo form_error('id_paket') ?></label>
            <!-- <input type="text" class="form-control" name="id_paket" id="id_paket" placeholder="Id Paket" value="<?php echo $id_paket; ?>" /> -->
            <select name="id_paket" id="id_paket" class="form-control" required/>
                <option disabled selected>--Pilih Nama Paket--</option>
                    <?php $query = $this->db->query("SELECT * FROM paket"); 
                          foreach ($query->result() as $rows) {
                    ?>
                 <option <?php echo ($id_paket==$rows->id_paket) ? 'selected=""':""; ?> value="<?php echo $rows->id_paket; ?>"><?php echo $rows->nama_paket; ?></option>
                <?php } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
            <!-- <textarea class="form-control" rows="3" name="gambar" id="gambar" placeholder="Gambar"><?php echo $gambar; ?></textarea> -->
             <?php
                    if ($button == 'Create') {
                ?>
                    <input type="file" class="form-control" name="gambar" id="gambar" required/>
                <?php } elseif ($button == 'Update') {
                ?>  
                    <div class="">
                        <a href="" target="_blank"><img src="<?=base_url();?>assets2/images/<?=$gambar;?>" style="width: 400px; height: 200px; margin-bottom: 5px;" class="img-rounded" alt=""></a><br /><p><?php echo $gambar; ?></p>
                    </div>
                    <input type="file" class="form-control" name="gambar" id="gambar"/>
                <?php } ?>
            <span class="help-block">Format Foto : gif, png, jpg, jpeg, bmp. Max file size 50Mb</span>
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div> -->
	    <input type="hidden" name="id_detai_paket" value="<?php echo $id_detai_paket; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_paket') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>