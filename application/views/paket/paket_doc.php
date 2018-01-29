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
        <h2>Paket List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Paket</th>
		<th>Harga</th>
		<th>Keterangan</th>
		<th>Id Jenis Paket</th>
		<th>Gambar</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($paket_data as $paket)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $paket->nama_paket ?></td>
		      <td><?php echo $paket->harga ?></td>
		      <td><?php echo $paket->keterangan ?></td>
		      <td><?php echo $paket->id_jenis_paket ?></td>
		      <td><?php echo $paket->gambar ?></td>
		      <td><?php echo $paket->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>