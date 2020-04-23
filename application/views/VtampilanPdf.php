<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan</title>
    <style> 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
    </style>
</head>
<body>
<table>
        <thead>
        	<tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Alamat</th>
            <th>Kode Invoice</th>
            <th>Tanggal Transaksi</th>
            <th>Tanggal Bayar</th>
            <th>Batas Waktu</th>
            <th>Total Harga</th>
            <th>Status Transaksi</th>
        	</tr>
        </thead>
        <tbody>
        <?php 
		$i=1;
		foreach ($data as $d) :?>
			<tr>
            <td><?= $i++ ?></td>
            <td><?= $d->nm_member ?></td>
            <td><?= $d->alamat_member ?></td>
            <td><?= $d->kode_invoice ?></td>
            <td><?= $d->tgl_transaksi ?></td>
            <td><?= $d->tgl_bayar ?></td>
            <td><?= $d->batas_waktu ?></td>
            <td><?= $d->total_harga ?></td>
            <td><?= $d->status_transaksi ?></td>
			</tr>
		<?php endforeach ?>
        </tbody>
      </table>
</body>
</html>