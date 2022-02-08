<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="<?=site_url('assets/img/logo.png')?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title><?=$title?></title>
        <?=link_tag('assets/css/bootstrap.css?ver=3.3.7')?>
        <?=link_tag('assets/css/style.css?ver=1.0.0')?>
    </head>
    <body onload="window.print()">
            <div class="tc">
                <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Bank Sampah</th>
                    <th>Tanggal</th>
                    <th>Plastik/kg</th>
                    <th>Besi/kg</th>
                    <th>Kertas/kg</th>
                    <th>Total Sampah/kg</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1; 
                    foreach($data_status as $hasil){ 
                ?>

                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $hasil->nama_bs ?></td>
                    <td><?php echo $hasil->tgl ?></td>
                    <td><?php echo $hasil->plas ?></td>
                    <td><?php echo $hasil->bes ?></td>
                    <td><?php echo $hasil->ker ?></td>
                    <td><?php echo $hasil->tot ?></td>
                  </tr>

                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th class="bg-navy color-palette">Rincian Pembayaran:</th>
                  <th class="bg-navy color-palette"> Rp. <!-- Plastik -->
                    <?php
                  $sum1 = 3000;
                  foreach($data_status as $row){
                   $sum1 *= $row->plas;
                  }
                  echo number_format($sum1, 0);
                  ?></th>
                  <th class="bg-navy color-palette"> Rp. <!-- Besi -->
                    <?php
                  $sum2 = 5000;
                  foreach($data_status as $row){
                   $sum2 *= $row->bes;
                  }
                  echo number_format($sum2, 0);
                  ?></th>
                  <th class="bg-navy color-palette"> Rp. <!-- Kertas -->
                    <?php
                  $sum3 = 4000;
                  foreach($data_status as $row){
                   $sum3 *= $row->ker;
                  }
                  echo number_format($sum3, 0);
                  ?></th>
                  <th class="bg-navy color-palette">Total Pembayaran:</th>
                  <th class="bg-navy color-palette"> Rp. <!-- Total -->
                    <?php
                  $sum = 0;
                  foreach($data_status as $column){
                   $sum += $sum1+$sum2+$sum3;
                  }

                  echo number_format($sum, 0);
                  ?></th>
                </tr>
                </tfoot>

              </table>
            </div>
        </div>
    </body>
</html>
