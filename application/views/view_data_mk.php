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
              <form action="<?php echo base_url();?>web/submit_data_mk" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-6">
                    <label>Kode Mata Kuliah</label>
                      <input type="text" name="kode_mk" class="form-control" placeholder="Masukkan Kode Mata Kuliah">
                    <?php echo form_error('kode_mk'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Nama Mata Kuliah</label>
                      <input type="text" name="nama_mk" class="form-control" placeholder="Masukkan Nama Mata Kuliah">
                    <?php echo form_error('nama_mk'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Satuan Kredit Semester</label>
                      <input type="text" name="sks" class="form-control" placeholder="Masukkan Nilai SKS Mata Kuliah">
                    <?php echo form_error('sks'); ?>
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
                    <th><center>Kode Mata Kuliah</center></th>
                    <th><center>Nama Mata Kuliah</center></th>
                    <th><center>Satuan Kredit Semester</center></th>
                    <th><center>Aksi</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($data_mk->result_array() as $data)
                    {
                    ?>
                      <tr>
                        <td><center><?php echo $no;?></center></td>
                        <td><?php echo $data['kode_mk'];?></a></td>
                        <td><?php echo $data['nama_mk'];?></a></td>
                        <td><?php echo $data['sks'];?> SKS</a></td>
                        <td>
                          <a href="<?php echo base_url('web/edit_data_mk');?>/<?php echo $data['id_mk'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                          <a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_data_mk');?>/<?php echo $data['id_mk'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
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