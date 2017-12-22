          <!-- Box Isi Data-->
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><center>NIM</center></th>
                    <th><center>Daftar Mata Kuliah Penilaian</center></th>
                    <th><center>Derajat Keanggotaan</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php error_reporting(0);
                    $no=1;
                    foreach($detail->result_array() as $data)?>
                      <tr>
                        <td width="150px"><center><?php echo $data['nim'];?></center></td>
                        <td>
                          <table class="table table-bordered table-striped">
                            <tr class="bg-green">
                              <td width="150px"><center>
                                <b>Nama MK</b></center>
                              </td>
                              <td width="50px"><center>
                                <b>Nilai</b></center>
                              </td>
                            </tr>
                          <?php foreach($all_penilaian->result_array() as $all){
                            if($all['nim']==$data['nim']) {?>
                            <tr>
                              <td>
                                <?php echo $all['nama_mk'];?>
                              </td>
                              <td><center>
                                <?php echo number_format($all['nilai_angka'],1);?></center>
                              </td>
                            </tr>
                          <?php }}?>
                          </table>
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
                                 }echo "[sangat] == ".number_format($sangat_mk2,2)."<br><br>";
                              }
                              //    Matematika Terapan 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131205'){
                                    echo "[nilai Matematika Terapan 2] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mt2 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mt2 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mt2 = 0;
                                    }echo "[Kurang] == ".number_format($kurang_mt2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mt2 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mt2 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mt2 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mt2 = 0;
                                 }echo "[Cukup] == ".number_format($cukup_mt2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mt2 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mt2 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mt2 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mt2 = 0;
                                 }echo "[Baik] == ".number_format($baik_mt2,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mt2 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mt2 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mt2 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mt2 = 1;
                                 }echo "[sangat] == ".number_format($sangat_mt2,2)."<br><br>";
                              }
                              // Representasi Rule Bangunan Air
                              //    Fisika Terapan
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131103'){
                                    echo "[nilai Fisika Terapan] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_ft = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_ft = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_ft = 0;
                                    }echo "[Kurang] == ".number_format($kurang_ft,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_ft = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_ft = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_ft = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_ft = 0;
                                 }echo "[Cukup] == ".number_format($cukup_ft,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_ft = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_ft = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_ft = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_ft = 0;
                                 }echo "[Baik] == ".number_format($baik_ft,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_ft = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_ft = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_ft = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_ft = 1;
                                 }echo "[sangat] == ".number_format($sangat_ft,2)."<br><br>";
                              }
                              //    Hidrolika 1
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131211'){
                                    echo "[nilai Hidrolika 1] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_h1 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_h1 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_h1 = 0;
                                    }echo "[Kurang] == ".number_format($kurang_h1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_h1 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_h1 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_h1 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_h1 = 0;
                                 }echo "[Cukup] == ".number_format($cukup_h1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_h1 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_h1 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_h1 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_h1 = 0;
                                 }echo "[Baik] == ".number_format($baik_h1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_h1 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_h1 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_h1 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_h1 = 1;
                                 }echo "[sangat] == ".number_format($sangat_h1,2)."<br><br>";
                              }
                              // Representasi Rule Transportasi
                              //    Mekanika Tanah 1
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131212'){
                                    echo "[nilai Mekanika Tanah 1] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mekt1 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mekt1 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mekt1 = 0;
                                    }echo "[Kurang] == ".number_format($kurang_mekt1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mekt1 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mekt1 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mekt1 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mekt1 = 0;
                                 }echo "[Cukup] == ".number_format($cukup_mekt1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mekt1 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mekt1 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mekt1 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mekt1 = 0;
                                 }echo "[Baik] == ".number_format($baik_mekt1,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mekt1 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mekt1 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mekt1 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mekt1 = 1;
                                 }echo "[sangat] == ".number_format($sangat_mekt1,2)."<br><br>";
                              }
                              //    Ilmu Ukur Tanah 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131215'){
                                   echo "[nilai Ilmu Ukur Tanah 2] == ".$rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_iut = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_iut = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_iut = 0;
                                    }echo "[Kurang] == ".number_format($kurang_iut,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_iut = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_iut = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_iut = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_iut = 0;
                                 }echo "[Cukup] == ".number_format($cukup_iut,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_iut = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_iut = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_iut = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_iut = 0;
                                 }echo "[Baik] == ".number_format($baik_iut,2)."<br>";
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_iut = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_iut = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_iut = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_iut = 1;
                                 }echo "[sangat] == ".number_format($sangat_iut,2)."<br><br>";
                              }
                          }
                            ?>

                        </td>
                      </tr>
                </tbody>
              </table>
            </div>
            <div class="box-footer">

            </div>
          </div>