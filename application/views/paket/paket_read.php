<div class="blank">
    
    <div class="blank-page">
        <h2 style="margin-top:0px">Paket Detail</h2>
        <table class="table">
        <tr><td>Nama Paket</td><td><?php echo $nama_paket; ?></td></tr>
	    <tr><td>Gambar</td><td><img src="<?php echo base_url();?>assets2/images/<?php echo $gambar; ?>" width="800" height="400"></td></tr>
        <tr><td>Nama Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Id Jenis Paket</td><td><?php echo $id_jenis_paket; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paket') ?>" class="btn btn-danger">Cancel</a></td></tr>
	</table>
</div>
</div>
