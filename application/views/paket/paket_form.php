<div class="blank">
    
    <div class="blank-page">
        <h2 style="margin-top:0px">Paket <?php echo $button ?></h2>
        <!-- <form action="<?php echo $action; ?>" method="post" > -->
         <?php echo form_open_multipart($action);?>
	    <div class="form-group">
            <label for="varchar">Nama Paket <?php echo form_error('nama_paket') ?></label>
            <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Nama Paket" value="<?php echo $nama_paket; ?>" required />
        </div>
	    <div class="form-group">
            <label for="decimal">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="num" placeholder="Harga" value="<?php echo $harga; ?>"  onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" required/><span  id="format"></span>
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="ckeditor" id="ckedtor" rows="3" name="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Paket <?php echo form_error('id_jenis_paket') ?></label>
            <select name="id_jenis_paket" id="id_jenis_paket" class="form-control" required/>
                <option disabled selected>--Pilih Jenis Paket--</option>
                    <?php $query = $this->db->query("SELECT * FROM jenis_paket"); 
                          foreach ($query->result() as $rows) {
                    ?>
                 <option <?php echo ($id_jenis_paket==$rows->id_jenis_paket) ? 'selected=""':""; ?> value="<?php echo $rows->id_jenis_paket; ?>"><?php echo $rows->jenis_paket; ?></option>
                <?php } ?>
            </select>
            <!-- <input type="text" class="form-control" name="id_jenis_paket" id="id_jenis_paket" placeholder="Id Jenis Paket" value="<?php echo $id_jenis_paket; ?>" /> -->
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
	    
	    <input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paket') ?>" class="btn btn-default">Cancel</a>
	</form>
</div></div>

<script type="text/javascript">
    
    function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
        num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num*100+0.50000000001);
        cents = num%100;
        num = Math.floor(num/100).toString();
        if(cents<10)
        cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        num = num.substring(0,num.length-(4*i+3))+'.'+
        num.substring(num.length-(4*i+3));
        return (((sign)?'':'-') + 'Rp' + num + ',' + cents);
    }
</script>