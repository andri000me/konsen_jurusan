      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url();?>web/submit_data_mahasiswa" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-6">
                    <label>No Induk Mahasiswa</label>
                      <input type="text" name="nim" class="form-control" placeholder="Masukkan No Induk Mahasiswa">
                    <?php echo form_error('nim'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Nama Mahasiswa</label>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Tempat, Tanggal Lahir</label>
                      <input type="text" name="ttl" class="form-control" placeholder="(Ex: Palembang, 2000-06-25)" id="datepicker">
                    <?php echo form_error('ttl'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Jenis Kelamin</label>
                      <input type="text" name="gender" class="form-control" placeholder="Laki-Laki / Perempuan">
                    <?php echo form_error('gender'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>No Telepon / Handphone</label>
                      <input type="text" name="telepon" class="form-control" placeholder="No Telepon / Handphone">
                    <?php echo form_error('telepon'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>IPK</label>
                      <input type="text" name="ipk" class="form-control" placeholder="Indek Prestasi Kumulatif">
                    <?php echo form_error('ipk'); ?>
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Alamat</label>
                      <textarea id="editor1" name="alamat" rows="10" cols="80"></textarea>
                    <?php echo form_error('alamat'); ?>
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
                    <th><center>No Induk Mahasiswa</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Tempat, Tanggal Lahir</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>IPK</center></th>
                    <th><center>Alamat</center></th>
                    <th><center>Aksi</center></th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($data_mhs->result_array() as $data)
                    {
                    ?>
                      <tr>
                        <td><center><?php echo $no;?></center></td>
                        <td><?php echo $data['nim'];?></a></td>
                        <td><?php echo $data['nama'];?></a></td>
                        <td><?php echo $data['ttl'];?></a></td>
                        <td><?php echo $data['gender'];?></a></td>
                        <td><?php echo $data['ipk'];?></a></td>
                        <td><?php echo $data['alamat'];?></a></td>
                        <td>
                          <a href="<?php echo base_url('web/edit_data_mahasiswa');?>/<?php echo $data['nim'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                          <a onClick="return confirmSubmit()" href="<?php echo base_url('web/hapus_data_mahasiswa');?>/<?php echo $data['nim'];?>"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
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