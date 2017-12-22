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
                    <th><center>Daftar Mata Kuliah Penilaian</center></th>
                    <th><center>IPK</center></th>
                    <th><center>Detail</center></th>
                    <th><center>Penilaian</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($mhs->result_array() as $data){?>
                      <tr>
                        <td width="5px"><center><?php echo $no;?></center></td>
                        <td width="150px"><center><?php echo $data['nim'];?></center></td>
                        <td width="150px"><center><?php echo $data['nama'];?></center></td>
                        </td>                       
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
                         <td>
                          <a href="<?php echo base_url('web/detail_fuzzyfikasi');?>/<?php echo $data['nim'];?>"><button class="btn btn-info btn-sm">detail</button></a>
                        </td>
                        <td>
                          <a href="<?php echo base_url('web/penilaian_jurusan');?>/<?php echo $data['nim'];?>"><button class="btn btn-info btn-sm">nilai</button></a>
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