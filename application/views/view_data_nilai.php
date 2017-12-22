      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url();?>web/submit_data_nilai" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-4">
                    <label>nilai</label>
                      <input type="text" name="nilai_angka" class="form-control" placeholder="Masukkan Nilai Angka ( ex : 0 - 45 )">
                    <?php echo form_error('nilai_angka'); ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Nilai</label>
                      <input type="text" name="nilai_huruf" class="form-control" placeholder="Masukkan Nilai Huruf ( Ex : B )" id="datepicker">
                    <?php echo form_error('nilai_huruf'); ?>
                  </div>
                </div>
                <button class="btn btn-primary pull-right">Submit</button>
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
                    <th><center>Nilai</center></th>
                    <th><center>Nilai Huruf</center></th>
                    <th><center>Aksi</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($nilai->result_array() as $data)
                    {
                    ?>
                      <tr>
                        <td width="10px"><center><?php echo $no;?></center></td>
                        <td><center><?php echo $data['nilai_angka'];?></center></td>
                        <td><center><?php echo $data['nilai_huruf'];?></center></td>
                        <td width="80px">
                          <a href="<?php echo base_url('web/edit_data_nilai');?>/<?php echo $data['id_nilai'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                          <a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_data_nilai');?>/<?php echo $data['id_nilai'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
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
      </div>
      <!-- /.row (main row) -->
    </section>