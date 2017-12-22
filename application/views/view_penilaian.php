      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-warning">
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
          <!-- Box Input Data-->
            <div class="box-body">
              <form action="<?php echo base_url();?>web/submit_penilaian" method="post">
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
                      <input type="text" name="nilai_angka" id="nilai_angka" class="form-control">
                    <?php echo form_error('nilai_angka'); ?>
                  </div>
                  <div class="form-group col-lg-2">
                    <label>Nilai Huruf</label>
                      <input type="text" name="nilai_huruf" id="nilai_huruf" class="form-control">
                    <?php echo form_error('nilai_huruf'); ?>
                  </div>
                </div>
                  <button class=" btn btn-primary pull-right">Submit</button>
              </form>
<script type="text/javascript">
$(document).ready(function(){

 $('#nilai_angka').change(function(){    
  var nilaifromfield = $('#nilai_angka').val();  
  $.ajax({        
    method: "POST",      
    url: "<?php echo base_url('web/huruf_nilai'); ?>",    
    data: { nilai_angka: nilaifromfield}   
  })
    .done(function( hasilajax ) {   
        $('#nilai_huruf').val(hasilajax);   
    });
 })
});
</script>
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
                        <td>
                          <a href="<?php echo base_url('web/detail_fuzzyfikasi');?>/<?php echo $data['nim'];?>"><button class="btn btn-info btn-sm">detail</button></a>
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