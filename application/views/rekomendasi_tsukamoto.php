      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
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
                    <th><center>Nama</center></th>
                <!--<th><center>Daftar Mata Kuliah</center></th> -->
                    <th><center>IPK</center></th>
                    <th><center>Hasil Algoritma Fuzzy Tsukamoto</center></th>
                    <th><center>Rekomendasi Sistem</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($mhs->result_array() as $data){?>
                      <tr>
                        <td width="20px"><center><?php echo $no;?></center></td>
                        <td width="160px"><center><?php echo $data['nim'];?></center></td>
                        <td width="160px"><center><?php echo $data['nama'];?></center></td>
                    <!--<td>
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
                                <?php echo $all['nilai_angka'];?></center>
                              </td>
                              <td><center>
                                <?php echo $all['nilai_huruf'];?></center>
                              </td>
                            </tr>
                          <?php }} ?>
                          </table>
                        </td> -->
                        <td width="20px"><center>
                              <b><?php echo number_format($data['ipk'],2); ?></b>
                        </center></td>
                        <td width="500px"><center>

                            <?php foreach($angkabyid->result_array() as $ni){
                              error_reporting(0);
                              // Step 2)  Pembentukan Fungsi Keanggotaan
                              // Representasi Rule Bangunan Gedung
                              //    Mekanika Rekayasa 2
                              if($ni['nim']==$data['nim'] AND $ni['kode_mk']=='TS131209'){
                                    $rec_data = $ni['nilai_angka']."<br>";
                                 //    Derajat keanggotaan untuk rentang KURANG
                                 if($rec_data <= '40') {
                                       $kurang_mk2 = 1;
                                    }elseif ('40' >= $rec_data OR $rec_data <= '54') {
                                       $kurang_mk2 = (54-$rec_data)/(54-40);
                                    }elseif ($rec_data >= '54') {
                                       $kurang_mk2 = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang CUKUP
                                 if ($rec_data <= '40') {
                                    $cukup_mk2 = 0;
                                 }elseif ('40' <= $rec_data AND $rec_data <= '54') {
                                    $cukup_mk2 = ($rec_data-40)/(54-40);
                                 }elseif ('54' >= $rec_data OR $rec_data <= '66') {
                                    $cukup_mk2 = (66-$rec_data)/(66-54);
                                 }elseif ($rec_data >= '66') {
                                    $cukup_mk2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Baik
                                 if ($rec_data <= '54') {
                                    $baik_mk2 = 0;
                                 }elseif ('54' <= $rec_data AND $rec_data <= '66') {
                                    $baik_mk2 = ($rec_data-54)/(66-54);
                                 }elseif ('66' >= $rec_data OR $rec_data <= '80') {
                                    $baik_mk2 = (80-$rec_data)/(80-66);
                                 }elseif ($rec_data >= '80') {
                                    $baik_mk2 = 0;
                                 }
                                 //    Derajat keanggotaan untuk rentang Sangat Baik
                                 if ($rec_data <= '66') {
                                    $sangat_mk2 = 0;
                                 }elseif ('66' <= $rec_data AND $rec_data <= '80') {
                                    $sangat_mk2 = ($rec_data-66)/(80-66);
                                 }elseif ('80' >= $rec_data OR $rec_data <= '100') {
                                    $sangat_mk2 = (80-$rec_data)/(100-80);
                                 }elseif ($rec_data >= '100') {
                                    $sangat_mk2 = 1;
                                 }
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
                              // Representasi Variabel Konsentrasi
                              //    Mekanika Rekayasa 2
                                 //    Derajat keanggotaan untuk rentang Tidak Layak
                                 if($x_data <= '60') {
                                       $tidak_layak = 1;
                                    }elseif ('60' >= $x_data OR $x_data <= '80') {
                                       $tidak_layak = (80-$x_data)/(80-60);
                                    }elseif ($x_data>= '80') {
                                       $tidak_layak = 0;
                                    }
                                 //    Derajat keanggotaan untuk rentang Layak
                                 if ($x_data >= '80') {
                                    $layak = 1;
                                 }elseif ('60' < $x_data AND $x_data < '80') {
                                    $layak = ($x_data-60)/(80-60);
                                 }elseif ($x_data <= '60') {
                                    $layak = 0;
                                 }

                            // Step 3 Komposisi Aturan Fuzzy
                            
                            //Alpa Predikat Penjurusan Bangunan Gedung
                            $apre_1   = min($sangat_mk2,$sangat_mt2);         $apre_2   = min($sangat_mk2,$baik_mt2);
                            $apre_3   = min($sangat_mk2,$cukup_mt2);          $apre_4   = min($sangat_mk2,$kurang_mt2);
                            $apre_5   = min($baik_mk2,$sangat_mt2);           $apre_6   = min($baik_mk2,$baik_mt2);
                            $apre_7   = min($baik_mk2,$cukup_mt2);            $apre_8   = min($baik_mk2,$kurang_mt2);
                            $apre_9   = min($cukup_mk2,$sangat_mt2);          $apre_10  = min($cukup_mk2,$baik_mt2);
                            $apre_11  = min($cukup_mk2,$cukup_mt2);           $apre_12  = min($cukup_mk2,$kurang_mt2);
                            $apre_13  = min($kurang_mk2,$sangat_mt2);         $apre_14  = min($kurang_mk2,$baik_mt2);
                            $apre_15  = min($kurang_mk2,$cukup_mt2);          $apre_16  = min($kurang_mk2,$kurang_mt2);
                            //Alpa Predikat Penjurusan Bangunan Air
                            $apre_17  = min($sangat_ft,$sangat_h1);           $apre_18  = min($sangat_ft,$baik_h1);
                            $apre_19  = min($sangat_ft,$cukup_h1);            $apre_20  = min($sangat_ft,$kurang_h1);
                            $apre_21  = min($baik_ft,$sangat_h1);             $apre_22  = min($baik_ft,$baik_h1);
                            $apre_23  = min($baik_ft,$cukup_h1);              $apre_24  = min($baik_ft,$kurang_h1);
                            $apre_25  = min($cukup_ft,$sangat_h1);            $apre_26  = min($cukup_ft,$baik_h1);
                            $apre_27  = min($cukup_ft,$cukup_h1);             $apre_28  = min($cukup_ft,$kurang_h1);
                            $apre_29  = min($kurang_ft,$sangat_h1);           $apre_30  = min($kurang_ft,$baik_h1);
                            $apre_31  = min($kurang_ft,$cukup_h1);            $apre_32  = min($kurang_ft,$kurang_h1);
                            //Alpa Predikat Penjurusan Bangunan Transportasi
                            $apre_33  = min($sangat_mekt1,$sangat_iut2);      $apre_34  = min($sangat_mekt1,$baik_iut2);
                            $apre_35  = min($sangat_mekt1,$cukup_iut2);       $apre_36  = min($sangat_mekt1,$kurang_iut2);
                            $apre_37  = min($baik_mekt1,$sangat_iut2);        $apre_38  = min($baik_mekt1,$baik_iut2);
                            $apre_39  = min($baik_mekt1,$cukup_iut2);         $apre_40  = min($baik_mekt1,$kurang_iut2);
                            $apre_41  = min($cukup_mekt1,$sangat_iut2);       $apre_42  = min($cukup_mekt1,$baik_iut2);
                            $apre_43  = min($cukup_mekt1,$cukup_iut2);        $apre_44  = min($cukup_mekt1,$kurang_iut2);
                            $apre_45  = min($kurang_mekt1,$sangat_iut2);      $apre_46  = min($kurang_mekt1,$baik_iut2);
                            $apre_47  = min($kurang_mekt1,$cukup_iut2);       $apre_48  = min($kurang_mekt1,$kurang_iut2);

                            // Rule Daerah Fuzzy (Metode Tsukamoto)
                            // Rule Penjurusan Bangunan Gedung
                            if ($sangat_mk2 AND $sangat_mt2) {
                              if ($apre_1 == 1) {
                                $za1 = 80;
                              }elseif ($apre_1 < 1 AND $apre_1 !=0) {
                                $za1 = ($apre_1*20)+60;
                              }elseif ($apre_1 == 0) {
                                $za1 = 60;
                              }
                            }if ($sangat_mk2 AND $baik_mt2) {
                              if ($apre_2 == 1) {
                                $za2 = 80;
                              }elseif ($apre_2 < 1 AND $apre_2 != 0) {
                                $za2 = (number_format($apre_2,2)*20)+60;
                              }elseif ($apre_33 == 0) {
                                $za2 = 60;
                              }
                            }if ($sangat_mk2 AND $cukup_mt2) {
                              if ($apre_3 == 1) {
                                $za3 = 80;
                              }elseif ($apre_3 < 1 AND $apre_3 != 0) {
                                $za3 = (number_format($apre_3,2)*20)+60;
                              }elseif ($apre_3 == 0) {
                                $za3 = 60;
                              }
                            }if ($sangat_mk2 AND $kurang_mt2) {
                              if ($apre_4 == 1) {
                                $za4 = 60;
                              }elseif ($apre_4 < 1 AND $apre_4 != 0) {
                                $za4 = (number_format($apre_4,2)*20)+80;
                              }elseif ($apre_4 == 0) {
                                $za4 = 80;
                              }
                            }if ($baik_mk2 AND $sangat_mt2) {
                              if ($apre_5 == 1) {
                                $za5 = 80;
                              }elseif ($apre_5 < 1 AND $apre_5 != 0) {
                                $za5 = (number_format($apre_5,2)*20)+60;
                              }elseif ($apre_5 == 0) {
                                $za5 = 60;
                              }
                            }if ($baik_mk2 AND $baik_mt2) {
                              if ($apre_6 == 1) {
                                $za6 = 80;
                              }elseif ($apre_6 < 1 AND $apre_6 != 0) {
                                $za6 = (number_format($apre_6,2)*20)+60;
                              }elseif ($apre_6 == 0) {
                                $za6 = 60;
                              }
                            }if ($baik_mk2 AND $cukup_mt2) {
                              if ($apre_7 == 1) {
                                $za7 = 60;
                              }elseif ($apre_7 < 1 AND $apre_7 != 0) {
                                $za7 = (number_format($apre_7,2)*20)+80;
                              }elseif ($apre_7 == 0) {
                                $za7 = 80;
                              }
                            }if ($baik_mk2 AND $kurang_mt2) {
                              if ($apre_8 == 1) {
                                $za8 = 60;
                              }elseif ($apre_8 < 1 AND $apre_8 != 0) {
                                $za8 = (number_format($apre_8,2)*20)+80;
                              }elseif ($apre_8 == 0) {
                                $za8 = 80;
                              }
                            }if ($cukup_mk2 AND $sangat_mt2) {
                              if ($apre_9 == 1) {
                                $za9 = 80;
                              }elseif ($apre_9 < 1 AND $apre_9 != 0) {
                                $za9 = (number_format($apre_9,2)*20)+60;
                              }elseif ($apre_9 == 0) {
                                $za9 = 60;
                              }
                            }if ($cukup_mk2 AND $baik_mt2) {
                              if ($apre_10 == 1) {
                                $za10 = 60;
                              }elseif ($apre_10 < 1 AND $apre_10 != 0) {
                                $za10 = (number_format($apre_10,2)*20)+80;
                              }elseif ($apre_10 == 0) {
                                $za10 = 80;
                              }
                            }if ($cukup_mk2 AND $cukup_mt2) {
                              if ($apre_11 == 1) {
                                $za11 = 60;
                              }elseif ($apre_11 < 1 AND $apre_11 != 0) {
                                $za11 = (number_format($apre_11,2)*20)+80;
                              }elseif ($apre_11 == 0) {
                                $za11 = 80;
                              }
                            }if ($cukup_mk2 AND $kurang_mt2) {
                              if ($apre_12 == 1) {
                                $za12 = 60;
                              }elseif ($apre_12 < 1 AND $apre_12 != 0) {
                                $za12 = (number_format($apre_12,2)*20)+80;
                              }elseif ($apre_12 == 0) {
                                $za12 = 80;
                              }
                            }if ($kurang_mk2 AND $sangat_mt2) {
                              if ($apre_13 == 1) {
                                $za13 = 60;
                              }elseif ($apre_13 < 1 AND $apre_13 != 0) {
                                $za13 = (number_format($apre_13,2)*20)+80;
                              }elseif ($apre_13 == 0) {
                                $za13 = 80;
                              }
                            }if ($kurang_mk2 AND $baik_mt2) {
                              if ($apre_14 == 1) {
                                $za14 = 60;
                              }elseif ($apre_11 < 1 AND $apre_14 != 0) {
                                $za14 = (number_format($apre_14,2)*20)+80;
                              }elseif ($apre_11 == 0) {
                                $za14 = 80;
                              }
                            }if ($kurang_mk2 AND $cukup_mt2) {
                              if ($apre_15 == 1) {
                                $za15 = 60;
                              }elseif ($apre_15 < 1 AND $apre_15 != 0) {
                                $za15 = (number_format($apre_15,2)*20)+80;
                              }elseif ($apre_15 == 0) {
                                $za15 = 80;
                              }
                            }if ($kurang_mk2 AND $kurang_mt2) {
                              if ($apre_16 == 1) {
                                $za16 = 60;
                              }elseif ($apre_16 < 1 AND $apre_16 != 0) {
                                $za16 = (number_format($apre_16,2)*20)+80;
                              }elseif ($apre_16 == 0) {
                                $za16 = 80;
                              }
                            }
                            //Rule Penjurusan Bangunan Air
                            if ($sangat_ft AND $sangat_h1) {
                              if ($apre_17 == 1) {
                                $za17 = 80;
                              }elseif ($apre_17 < 1 AND $apre_17 !=0) {
                                $za17 = ($apre_17*20)+60;
                              }elseif ($apre_17 == 0) {
                                $za17 = 60;
                              }
                            }if ($sangat_ft AND $baik_h1) {
                             if ($apre_18 == 1) {
                                $za18 = 80;
                              }elseif ($apre_18 < 1 AND $apre_18 != 0) {
                                $za18 = (number_format($apre_18,2)*20)+60;
                              }elseif ($apre_18 == 0) {
                                $za18 = 60;
                              }
                            }if ($sangat_ft AND $cukup_h1) {
                              if ($apre_19 == 1) {
                                $za19 = 80;
                              }elseif ($apre_19 < 1 AND $apre_19 != 0) {
                                $za19 = (number_format($apre_19,2)*20)+60;
                              }elseif ($apre_19 == 0) {
                                $za19 = 60;
                              }
                            }if ($sangat_ft AND $kurang_h1) {
                              if ($apre_20 == 1) {
                                $za20 = 60;
                              }elseif ($apre_20 < 1 AND $apre_20 != 0) {
                                $za20 = (number_format($apre_20,2)*20)+80;
                              }elseif ($apre_20 == 0) {
                                $za20 = 80;
                              }
                            }if ($baik_ft AND $sangat_h1) {
                              if ($apre_21 == 1) {
                                $za21 = 80;
                              }elseif ($apre_21 < 1 AND $apre_21 != 0) {
                                $za21 = (number_format($apre_21,2)*20)+60;
                              }elseif ($apre_21 == 0) {
                                $za21 = 60;
                              }
                            }if ($baik_ft AND $baik_h1) {
                              if ($apre_22 == 1) {
                                $za22 = 80;
                              }elseif ($apre_22 < 1 AND $apre_22 != 0) {
                                $za22 = (number_format($apre_22,2)*20)+60;
                              }elseif ($apre_22 == 0) {
                                $za22 = 60;
                              }
                            }if ($baik_ft AND $cukup_h1) {
                              if ($apre_23 == 1) {
                                $za23 = 60;
                              }elseif ($apre_23 < 1 AND $apre_23 != 0) {
                                $za23 = (number_format($apre_23,2)*20)+80;
                              }elseif ($apre_23 == 0) {
                                $za23 = 80;
                              }
                            }if ($baik_ft AND $kurang_h1) {
                              if ($apre_24 == 1) {
                                $za24 = 60;
                              }elseif ($apre_24 < 1 AND $apre_24 != 0) {
                                $za24 = (number_format($apre_24,2)*20)+80;
                              }elseif ($apre_24 == 0) {
                                $za24 = 80;
                              }
                            }if ($cukup_ft AND $sangat_h1 ) {
                              if ($apre_25 == 1) {
                                $za25 = 80;
                              }elseif ($apre_25 < 1 AND $apre_25 != 0) {
                                $za25 = (number_format($apre_25,2)*20)+60;
                              }elseif ($apre_25 == 0) {
                                $za25 = 60;
                              }
                            }if ($cukup_ft AND $baik_h1) {
                              if ($apre_26 == 1) {
                                $za26 = 60;
                              }elseif ($apre_26 < 1 AND $apre_26 != 0) {
                                $za26 = (number_format($apre_26,2)*20)+80;
                              }elseif ($apre_26 == 0) {
                                $za26 = 80;
                              }
                            }if ($cukup_ft AND $cukup_h1) {
                              if ($apre_27 == 1) {
                                $za27 = 60;
                              }elseif ($apre_27 < 1 AND $apre_27 != 0) {
                                $za27 = (number_format($apre_27,2)*20)+80;
                              }elseif ($apre_27 == 0) {
                                $za27 = 80;
                              }
                            }if ($cukup_ft AND $kurang_h1) {
                              if ($apre_28 == 1) {
                                $za28 = 60;
                              }elseif ($apre_28 < 1 AND $apre_28 != 0) {
                                $za28 = (number_format($apre_28,2)*20)+80;
                              }elseif ($apre_28 == 0) {
                                $za28 = 80;
                              }
                            }if ($kurang_ft AND $sangat_h1) {
                              if ($apre_29 == 1) {
                                $za29 = 60;
                              }elseif ($apre_29 < 1 AND $apre_29 != 0) {
                                $za29 = (number_format($apre_29,2)*20)+80;
                              }elseif ($apre_29 == 0) {
                                $za29 = 80;
                              }
                            }if ($kurang_ft AND $baik_h1) {
                              if ($apre_30 == 1) {
                                $za30 = 60;
                              }elseif ($apre_30 < 1 AND $apre_30 != 0) {
                                $za30 = (number_format($apre_30,2)*20)+80;
                              }elseif ($apre_30 == 0) {
                                $za30 = 80;
                              }
                            }if ($kurang_ft AND $cukup_h1) {
                              if ($apre_31 == 1) {
                                $za31 = 60;
                              }elseif ($apre_31 < 1 AND $apre_31 != 0) {
                                $za31 = (number_format($apre_31,2)*20)+80;
                              }elseif ($apre_31 == 0) {
                                $za31 = 80;
                              }
                            }if ($kurang_ft AND $kurang_h1) {
                              if ($apre_32 == 1) {
                                $za32 = 60;
                              }elseif ($apre_32 < 1 AND $apre_32 != 0) {
                                $za32 = (number_format($apre_32,2)*20)+80;
                              }elseif ($apre_32 == 0) {
                                $za32 = 80;
                              }
                            }
                            //Rule Penjurusan Bangunan Transportasi
                            if ($sangat_mekt1 AND $sangat_iut2) {
                              if ($apre_33 == 1) {
                                $za33 = 80;
                              }elseif ($apre_33 < 1 AND $apre_33 !=0) {
                                $za33 = (number_format($apre_33,2)*20)+60;
                              }elseif ($apre_33 == 0) {
                                $za33 = 60;
                              }
                            }if ($sangat_mekt1 AND $baik_iut2) {
                              if ($apre_34 == 1) {
                                $za34 = 80;
                              }elseif ($apre_34 < 1 AND $apre_34 != 0) {
                                $za34 = (number_format($apre_34,2)*20)+60;
                              }elseif ($apre_34 == 0) {
                                $za34 = 60;
                              }
                            }if ($sangat_mekt1 AND $cukup_iut2) {
                              if ($apre_35 == 1) {
                                $za35 = 80;
                              }elseif ($apre_35 < 1 AND $apre_35 != 0) {
                                $za35 = (number_format($apre_35,2)*20)+60;
                              }elseif ($apre_35 == 0) {
                                $za35 = 60;
                              }
                            }if ($sangat_mekt1 AND $kurang_iut2) {
                              if ($apre_36 == 1) {
                                $za36 = 60;
                              }elseif ($apre_36 < 1 AND $apre_36 != 0) {
                                $za36 = (number_format($apre_36,2)*20)+80;
                              }elseif ($apre_36 == 0) {
                                $za36 = 80;
                              }
                            }if ($baik_mekt1 AND $sangat_iut2) {
                              if ($apre_37 == 1) {
                                $za37 = 80;
                              }elseif ($apre_37 < 1 AND $apre_37 !=0) {
                                $za37 = (number_format($apre_37,2)*20)+60;
                              }elseif ($apre_37 == 0) {
                                $za37 = 60;
                              }
                            }if ($baik_mekt1 AND $baik_iut2) {
                              if ($apre_38 == 1) {
                                $za38 = 80;
                              }elseif ($apre_38 < 1 AND $apre_38 !=0) {
                                $za38 = (number_format($apre_38,2)*20)+60;
                              }elseif ($apre_38 == 0) {
                                $za38 = 60;
                              }
                            }if ($baik_mekt1 AND $cukup_iut2) {
                              if ($apre_39 == 1) {
                                $za39 = 60;
                              }elseif ($apre_39 < 1 AND $apre_39 != 0) {
                                $za39 = (number_format($apre_39,2)*20)+80;
                              }elseif ($apre_39 == 0) {
                                $za39 = 80;
                              }
                            }if ($baik_mekt1 AND $kurang_iut2) {
                              if ($apre_40 == 1) {
                                $za40 = 60;
                              }elseif ($apre_40 < 1 AND $apre_40 != 0) {
                                $za40 = (number_format($apre_40,2)*20)+80;
                              }elseif ($apre_40 == 0) {
                                $za40 = 80;
                              }
                            }if ($cukup_mekt1 AND $sangat_iut2) {
                              if ($apre_41 == 1) {
                                $za41 = 80;
                              }elseif ($apre_41 < 1 AND $apre_41 !=0) {
                                $za41 = (number_format($apre_41,2)*20)+60;
                              }elseif ($apre_41 == 0) {
                                $za41 = 60;
                              }
                            }if ($cukup_mekt1 AND $baik_iut2) {
                              if ($apre_42 == 1) {
                                $za42 = 60;
                              }elseif ($apre_42 < 1 AND $apre_42 != 0) {
                                $za42 = (number_format($apre_42,2)*20)+80;
                              }elseif ($apre_42 == 0) {
                                $za42 = 80;
                              }
                            }if ($cukup_mekt1 AND $cukup_iut2) {
                              if ($apre_43 == 1) {
                                $za43 = 60;
                              }elseif ($apre_43 < 1 AND $apre_43 != 0) {
                                $za43 = (number_format($apre_43,2)*20)+80;
                              }elseif ($apre_43 == 0) {
                                $za43 = 80;
                              }
                            }if ($cukup_mekt1 AND $kurang_iut2) {
                              if ($apre_44 == 1) {
                                $za44 = 60;
                              }elseif ($apre_44 < 1 AND $apre_44 != 0) {
                                $za44 = (number_format($apre_44,2)*20)+80;
                              }elseif ($apre_44 == 0) {
                                $za44 = 80;
                              }
                            }if ($kurang_mekt1 AND $sangat_iut2) {
                              if ($apre_45 == 1) {
                                $za45 = 60;
                              }elseif ($apre_45 < 1 AND $apre_45 != 0) {
                                $za45 = (number_format($apre_45,2)*20)+80;
                              }elseif ($apre_45 == 0) {
                                $za45 = 80;
                              }
                            }if ($kurang_mekt1 AND $baik_iut2) {
                              if ($apre_46 == 1) {
                                $za46 = 60;
                              }elseif ($apre_46 < 1 AND $apre_46 != 0) {
                                $za46 = (number_format($apre_46,2)*20)+80;
                              }elseif ($apre_46 == 0) {
                                $za46 = 80;
                              }
                            }if ($kurang_mekt1 AND $cukup_iut2) {
                              if ($apre_47 == 1) {
                                $za47 = 60;
                              }elseif ($apre_47 < 1 AND $apre_47 != 0) {
                                $za47 = (number_format($apre_47,2)*20)+80;
                              }elseif ($apre_47 == 0) {
                                $za47 = 80;
                              }
                            }if ($kurang_mekt1 AND $kurang_iut2) {
                              if ($apre_48 == 1) {
                                $za48 = 60;
                              }elseif ($apre_48 < 1 AND $apre_48 != 0) {
                                $za48 = (number_format($apre_48,2)*20)+80;
                              }elseif ($apre_48 == 0) {
                                $za48 = 80;
                              }
                            }

  // Step 4 Defuzzy fikasi Tsukamoto
  // Defuzzyfikasi Penjurusan Bangunan Gedung
  $recom_bngungdng = number_format($apre_1*$za1 + $apre_2*$za2 + $apre_3*$za3 + $apre_4*$za4 + $apre_5*$za5 + $apre_6*$za6 + $apre_7*$za7 + $apre_8*$za8 + $apre_9*$za9 + $apre_10*$za10 + $apre_11*$za11 + $apre_12*$za12 + $apre_13*$za13 + $apre_14*$za14 + $apre_15*$za15 + $apre_16*$za16,2)  / number_format($apre_1 + $apre_2 + $apre_3 + $apre_4 + $apre_5 + $apre_6 + $apre_7 + $apre_8 + $apre_9 + $apre_10 + $apre_11 + $apre_12 + $apre_13 + $apre_14 + $apre_15 + $apre_16,2);

  // Defuzzyfikasi Penjurusan Bangunan Air
  $recom_bngunair = number_format(($apre_17*$za17) + ($apre_18*$za18) + ($apre_19*$za19) + ($apre_20*$za20) + ($apre_21*$za21) + ($apre_22*$za22) + ($apre_23*$za23) + ($apre_24*$za24) + ($apre_25*$za25) + ($apre_26*$za26) + ($apre_27*$za27) + ($apre_28*$za28) + ($apre_29*$za29) + ($apre_30*$za30) + ($apre_31*$za31) + ($apre_32*$za32),2) / number_format($apre_17 + $apre_18 + $apre_19 + $apre_20 + $apre_21 + $apre_22 + $apre_23 + $apre_24 + $apre_25 + $apre_26 + $apre_27 + $apre_28 + $apre_29 + $apre_30 + $apre_31 + $apre_32,2);

  // Defuzzyfikasi Penjurusan Bangunan Transportasi
  $recom_bnguntrans  = number_format($apre_33*$za33 + $apre_34*$za34 + $apre_35*$za35 + $apre_36*$za36 + $apre_37*$za37 + $apre_38*$za38 + $apre_39*$za39 + $apre_40*$za40 + $apre_41*$za41 + $apre_42*$za42 + $apre_42*$za42 + $apre_43*$za43 + $apre_44*$za44 + $apre_45*$za45 + $apre_46*$za46 + $apre_47*$za47 + $apre_48*$za48,2) / number_format($apre_33 + $apre_34 + $apre_35 + $apre_36 + $apre_37 + $apre_38 + $apre_39 + $apre_40 + $apre_41 + $apre_42 + $apre_43 + $apre_44 + $apre_45 + $apre_46 + $apre_47 + $apre_48,2);

                           ?>

                            <?php
                                $ip = number_format($data['ipk'],2);
                            if ($ip > 3.50) {?>
                              <table class="table table-bordered table-striped">
                                <tr class="bg-yellow">
                                  <td><center>
                                    <b>Konsentrasi Bangunan Gedung</b></center>
                                  </td>
                                  <td><center>
                                    <b>Konsentrasi Bangunan Air</b></center>
                                  </td>
                                  <td><center>
                                    <b>Konsentrasi Bangunan Transportasi</b></center>
                                  </td>
                                </tr>
                                <tr>
                                  <td ><center><b>
                                    <?php echo number_format($recom_bngungdng,1).' %';?></center>
                                  </td>
                                  <td ><center><b>
                                    <?php echo number_format($recom_bngunair,1).' %';?></center>
                                  </td>
                                  <td ><center><b>
                                    <?php echo number_format($recom_bnguntrans,1).' %';?></center>
                                  </td>
                                </tr>
                              </table>
                           <?php 
                            }
                            if ($ip < 3.50) {?>
                              <table class="table table-bordered table-striped">
                                <tr class="bg-yellow">
                                  <td><center>
                                    <b>Konsentrasi Bangunan Air</b></center>
                                  </td>
                                  <td><center>
                                    <b>Konsentrasi Bangunan Transportasi</b></center>
                                  </td>
                                </tr>
                                <tr>
                                  <td ><center><b>
                                    <?php echo number_format($recom_bngunair,1).' %';?></center>
                                  </td>
                                  <td ><center><b>
                                    <?php echo number_format($recom_bnguntrans,1).' %';?></center>
                                  </td>
                                </tr>
                              </table>
                           <?php 
                            }
                            ?>
                          </center>
                        </td>
                        <td class="bg-green"><center>
                          <?php
                                $ip = number_format($data['ipk'],2);
                            if ($ip > 3.50) {
                              if ($recom_bngungdng >= $recom_bngunair AND $recom_bngungdng >= $recom_bnguntrans) {
                                  echo "Konsentrasi Bangunan Gedung";
                                }elseif ($recom_bngunair > $recom_bngungdng AND $recom_bngunair > $recom_bnguntrans) {
                                  echo "Konsentrasi Bangunan Air";
                                }elseif ($recom_bnguntrans > $recom_bngungdng AND $recom_bnguntrans > $recom_bngunair) {
                                  echo "Konsentrasi Bangunan Transportasi";
                                }
                            }
                            if ($ip < 3.50) {

                              if ($recom_bngunair > $recom_bnguntrans) {
                                  echo "Konsentrasi Bangunan Air";
                                }elseif ($recom_bnguntrans > $recom_bngunair) {
                                  echo "Konsentrasi Bangunan Transportasi"  ;
                                }
                            }
                            ?>
                            </center>
                        </td>
                      </tr>
                    <?php $no++;
                      }?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </section>
      </div>
    </section>