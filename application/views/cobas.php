      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
          <!-- Box Input Data-->
            <div class="box-body">
              <form action="<?php echo base_url();?>web/submit_penilaian" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-group col-lg-12">
                    <label>(Nim) Nama Mahasiswa</label>
                      <select name="nim" class="form-control">
                        <?php foreach($mhs->result_array() as $m){?>
                          <option value="<?php echo $m['nim'];?>">
                          [ <?php echo $m['nim'];?> ] <?php echo $m['nama'];?>
                          </option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-lg-8">
                    <label>Kode Mata Kuliah</label>
                      <select name="kode_mk" class="form-control">
                        <?php foreach($data_mk->result_array() as $mk){?>
                          <option value="<?php echo $mk['kode_mk'];?>">
                            [ <?php echo $mk['kode_mk'];?> ] -- <?php echo $mk['nama_mk'];?>
                          </option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-lg-2">
                    <label>Nilai Angka</label>
                      <input type="text" name="nilai_angka" class="form-control">
                    <?php echo form_error('nilai_angka'); ?>
                  </div>
                  <div class="form-group col-lg-2">
                    <label>Nilai Huruf</label>
                      <select name="nilai_huruf" class="form-control">
                        <?php foreach($nilai->result_array() as $n){?>
                          <option value="<?php echo $n['nilai_huruf'];?>">
                            <?php echo $n['nilai_huruf'];?>
                          </option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
                  <button class=" btn btn-primary pull-right">Submit</button>
              </form>
            </div>
            <div class="box-footer">
            </div>
          </div>
          <!-- Box Isi Data-->
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><center>No</center></th>
                    <th><center>No Induk Mahasiswa</center></th>
                    <th><center>Daftar Mata Kuliah Penilaian</center></th>
                    <th><center>IPK</center></th>
                    <th><center>Detail</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($mhs->result_array() as $data){?>
                      <tr>
                        <td width="5px"><center><?php echo $no;?></center></td>
                        <td width="150px"><center><?php echo $data['nim'];?></center></td>
                        <td>
                          <table class="table table-bordered table-striped">
                            <tr class="bg-green">
                              <td width="100px"><center>
                                <b>Kode MK</b></center>
                              </td>
                              <td width="400px"><center>
                                <b>Nama MK</b></center>
                              </td>
                              <td width="10px" colspan="2"><center>
                                <b>Nilai</b></center>
                              </td>
                            </tr>
                          <?php foreach($all_penilaian->result_array() as $all){
                            if($all['nim']==$data['nim']) {?>
                            <tr>
                              <td><center>
                                <?php echo $all['kode_mk'];?></center>
                              </td>
                              <td>
                                <?php echo $all['nama_mk'];?>
                              </td>
                              <td><center>
                                <?php echo number_format($all['nilai_angka'],1);?></center>
                              </td>
                              <td><center>
                                <?php echo $all['nilai_huruf'];?></center>
                              </td>
                            </tr>
                          <?php }} ?>
                          </table>
                        </td>
                        <td><center>
                              <b><?php echo number_format($data['ipk'],2); ?></b>
                        </center>
                        </td>
                        <td width="250px">

                          <?php foreach($angkabyid->result_array() as $ni){
                              // Step 2)  Pembentukan Fungsi Keanggotaan
                              // Representasi Rule Bangunan Gedung
                              //    Mekanika Rekayasa 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131209'){
                                    echo "[nilai Mekanika Rekayasa 2] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mk2 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mk2 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mk2 = 0;
                                    }echo "[Kurang] == ".number_format($kurang_mk2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mk2 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mk2 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mk2 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mk2 = 0;
                                 }echo "[Cukup] == ".number_format($cukup_mk2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mk2 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mk2 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mk2 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mk2 = 0;
                                 }echo "[Baik] == ".number_format($baik_mk2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mk2 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mk2 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mk2 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mk2 = 1;
                                 }echo "[sangat] == ".number_format($sangat_mk2,2)."<br>";
                              }
                              //    Matematika Terapan 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131205'){
                                    $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mt2 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mt2 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mt2 = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mt2 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mt2 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mt2 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mt2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mt2 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mt2 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mt2 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mt2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mt2 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mt2 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mt2 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mt2 = 1;
                                 }
                              }
                              // Representasi Rule Bangunan Air
                              //    Fisika Terapan
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131103'){
                                    $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_ft = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_ft = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_ft = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_ft = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_ft = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_ft = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_ft = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_ft = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_ft = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_ft = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_ft = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_ft = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_ft = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_ft = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_ft = 1;
                                 }
                              }
                              //    Hidrolika 1
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131211'){
                                    $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_h1 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_h1 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_h1 = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_h1 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_h1 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_h1 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_h1 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_h1 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_h1 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_h1 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_h1 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_h1 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_h1 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_h1 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_h1 = 1;
                                 }
                              }
                              // Representasi Rule Transportasi
                              //    Mekanika Tanah 1
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131212'){
                                    $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mekt1 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mekt1 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mekt1 = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mekt1 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mekt1 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mekt1 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mekt1 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mekt1 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mekt1 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mekt1 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mekt1 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mekt1 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mekt1 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mekt1 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mekt1 = 1;
                                 }
                              }
                              //    Ilmu Ukur Tanah 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131215'){
                                   $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_iut2 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_iut2 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_iut2 = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_iut2 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_iut2 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_iut2 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_iut2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_iut2 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_iut2 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_iut2 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_iut2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_iut2 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_iut2 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_iut2 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_iut2 = 1;
                                 }
                              }
                          }
                            ?>

                        </td>
                      </tr>
                    <?php
                      $no++;
                    }?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>