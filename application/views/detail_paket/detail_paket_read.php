<div class="blank">
   <div class="blank-page">
        <h2 style="margin-top:0px">Detail Sub Paket</h2>
        <table class="table">
	    <tr><td>Nama Detail</td><td><?php echo $nama_detail; ?></td></tr>
	    <tr><td>Gambar</td><td><img src="<?php echo base_url();?>assets2/images/<?php echo $gambar; ?>" width="800" height="400"></td></tr>
	    <tr><td>Nama Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Id Paket</td><td><?php echo $id_paket; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_paket') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
    </div>
</div>