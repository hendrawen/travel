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
        <h2>Promo_wisata List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Paket</th>
		<th>Harga</th>
		<th>Keterangan</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($promo_wisata_data as $promo_wisata)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $promo_wisata->nama_paket ?></td>
		      <td><?php echo $promo_wisata->harga ?></td>
		      <td><?php echo $promo_wisata->keterangan ?></td>
		      <td><?php echo $promo_wisata->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>