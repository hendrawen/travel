<div class="blank">
   <div class="blank-page">
        <h2 style="margin-top:0px">Pengaturan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="program_promo">Program Promo <?php echo form_error('program_promo') ?></label>
            <!-- <textarea class="form-control" rows="3" name="program_promo" id="program_promo" placeholder="Program Promo"><?php echo $program_promo; ?></textarea> -->
            <textarea class="ckeditor" id="ckedtor" rows="3" name="program_promo" placeholder="Keterangan"><?php echo $program_promo; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="kerjasama">Kerjasama <?php echo form_error('kerjasama') ?></label>
            <textarea class="ckeditor" rows="3" name="kerjasama" id="ckedtor" placeholder="Kerjasama"><?php echo $kerjasama; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Manajer Perusahaan <?php echo form_error('manajer_perusahaan') ?></label>
            <input type="text" class="form-control" name="manajer_perusahaan" id="manajer_perusahaan" placeholder="Manajer Perusahaan" value="<?php echo $manajer_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Website <?php echo form_error('website') ?></label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Phone1 <?php echo form_error('phone1') ?></label>
            <input type="text" class="form-control" name="phone1" id="phone1" placeholder="Phone1" value="<?php echo $phone1; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Phone2 <?php echo form_error('phone2') ?></label>
            <input type="text" class="form-control" name="phone2" id="phone2" placeholder="Phone2" value="<?php echo $phone2; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Phone3 <?php echo form_error('phone3') ?></label>
            <input type="text" class="form-control" name="phone3" id="phone3" placeholder="Phone3" value="<?php echo $phone3; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="ckeditor" rows="3" name="keterangan" id="ckedtor" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="about_us">About Us <?php echo form_error('about_us') ?></label>
            <textarea class="ckeditor" rows="3" name="about_us" id="ckedtor" placeholder="About Us"><?php echo $about_us; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Pemilik Perusahaan <?php echo form_error('pemilik_perusahaan') ?></label>
            <input type="text" class="form-control" name="pemilik_perusahaan" id="pemilik_perusahaan" placeholder="Pemilik Perusahaan" value="<?php echo $pemilik_perusahaan; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div> -->
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>