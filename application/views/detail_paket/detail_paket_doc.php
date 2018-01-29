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
        <h2>Detail_paket List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Detail</th>
		<th>Id Paket</th>
		<th>Gambar</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($detail_paket_data as $detail_paket)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detail_paket->nama_detail ?></td>
		      <td><?php echo $detail_paket->id_paket ?></td>
		      <td><?php echo $detail_paket->gambar ?></td>
		      <td><?php echo $detail_paket->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>