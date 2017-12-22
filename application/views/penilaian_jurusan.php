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
              <form action="<?php echo base_url();?>web/submit_penilaian_jurusan" method="post">
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
                  <div class="form-group col-lg-4">
                    <label>Nilai Konsentrasi Gedung</label>
                      <input type="text" name="gedung" class="form-control">
                    <?php echo form_error('gedung'); ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Nilai Konsentrasi Air</label>
                      <input type="text" name="air" class="form-control">
                    <?php echo form_error('air'); ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Nilai Konsentrasi Transportasi</label>
                      <input type="text" name="transportasi" class="form-control">
                    <?php echo form_error('transportasi'); ?>
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
                    <th><center>Nama Mahasiswa</center></th>
                    <th><center>Gedung</center></th>
                    <th><center>Air</center></th>
                    <th><center>Transportasi</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($all_penilaian->result_array() as $data){?>
                      <tr>
                        <td width="5px"><center><?php echo $no;?></center></td>
                        <td width="150px"><center><?php echo $data['nama'];?></center></td>
                        <td width="150px"><center><?php echo $data['gedung'];?></center></td>
                        <td width="150px"><center><?php echo $data['air'];?></center></td>
                        <td width="150px"><center><?php echo $data['transportasi'];?></center></td>
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