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
                    <th>Nama BS</th>
                    <th>Tanggal</th>
                    <th>Plastik/Rp</th>
                    <th>Besi/Rp</th>
                    <th>Kertas/Rp</th>
                    <th>Total/Rp</th>
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
                    <td><?php echo $hasil->p_plas ?></td>
                    <td><?php echo $hasil->p_bes ?></td>
                    <td><?php echo $hasil->p_ker ?></td>
                    <td><?php echo $hasil->p_tot ?></td>
                    <td><?php echo $hasil->p_status ?></td>
                  </tr>

                <?php } ?>

                </tbody>
                </tfoot>

              </table>
            </div>
        </div>
    </body>
</html>
