<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pengaturan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Program Promo</th>
		<th>Kerjasama</th>
		<th>Nama Perusahaan</th>
		<th>Manajer Perusahaan</th>
		<th>Email</th>
		<th>Website</th>
		<th>Phone1</th>
		<th>Phone2</th>
		<th>Phone3</th>
		<th>Keterangan</th>
		<th>About Us</th>
		<th>Pemilik Perusahaan</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($pengaturan_data as $pengaturan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengaturan->program_promo ?></td>
		      <td><?php echo $pengaturan->kerjasama ?></td>
		      <td><?php echo $pengaturan->nama_perusahaan ?></td>
		      <td><?php echo $pengaturan->manajer_perusahaan ?></td>
		      <td><?php echo $pengaturan->email ?></td>
		      <td><?php echo $pengaturan->website ?></td>
		      <td><?php echo $pengaturan->phone1 ?></td>
		      <td><?php echo $pengaturan->phone2 ?></td>
		      <td><?php echo $pengaturan->phone3 ?></td>
		      <td><?php echo $pengaturan->keterangan ?></td>
		      <td><?php echo $pengaturan->about_us ?></td>
		      <td><?php echo $pengaturan->pemilik_perusahaan ?></td>
		      <td><?php echo $pengaturan->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>