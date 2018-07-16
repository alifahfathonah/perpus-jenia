  <?php

// <?php
?>
  <div class="col-md-12">
                      <div class="content-panel">
                          <!-- <table class="table table-striped table-advance table-hover"> -->
	                  	  	  <h4>Data Buku</h4>
                            <a href="tambah_buku.php"><button>tambah buku</button></a>
                              <table border="1" style="width: 100%">
                              <tr>
                                  <th>Nama Buku</th>
                                  <th>Tahun terbit</th>
                                  <th>Sinopsis</th>
                                  <th>Sampul</th>
                                  <th>Berkas</th>
                                  <th>Aksi</th>
                                  
                              </tr>
                              <!-- TAMPILKAN CUY -->
                              <?php
                              include 'connect.php';
                              mysqli_query($connect, "SELECT * FROM buku");
                              while (mysqli_fetch_array()) {
                                ?>
                              <tr>
                                  <td><?php echo $r['nama']?></td>
                                  <td><?php echo $r['tahun_terbit']?></td>
                                <td><?php echo $r['sinopsis']?></td>
                                <td><?php echo $r['sampul']?></td>
                                <td><?php echo $r['berkas']?></td>
                                <td> 
                                <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                                <a href=tambah_buku.php?id=<?php echo "$r[id]" ?>>
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                               </td>
                              </tr>
                          <?php 
                              } 
                              ?>
                            </table>

    ?>