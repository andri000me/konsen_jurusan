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
            <?php foreach($edit_mhs->result_array() as $row)?>
              <form action="<?php echo base_url();?>web/update_data_mahasiswa" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-6">
                    <label>No Induk Mahasiswa</label>
                      <input type="text" name="nim" value="<?php echo $row['nim'];?>" class="form-control" placeholder="Masukkan No Induk Mahasiswa">
                    <?php echo form_error('nim'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Nama Mahasiswa</label>
                      <input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Tempat, Tanggal Lahir</label>
                      <input type="text" name="ttl" value="<?php echo $row['ttl'];?>" class="form-control" placeholder="(Ex: Palembang, 2000-06-25)" id="datepicker">
                    <?php echo form_error('ttl'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Jenis Kelamin</label>
                      <input type="text" name="gender" value="<?php echo $row['gender'];?>" class="form-control" placeholder="Laki-Laki / Perempuan">
                    <?php echo form_error('gender'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>No Telepon / Handphone</label>
                      <input type="text" name="telepon" value="<?php echo $row['telepon'];?>" class="form-control" placeholder="No Telepon / Handphone">
                    <?php echo form_error('telepon'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Indeks Prestasi Akademik</label>
                      <input type="text" name="ipk" value="<?php echo $row['ipk'];?>" class="form-control" placeholder="Indeks Prestasi Akademik">
                    <?php echo form_error('ipk'); ?>
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Alamat</label>
                      <textarea id="editor1" name="alamat" rows="10" cols="80"><?php echo $row['alamat'];?></textarea>
                    <?php echo form_error('alamat'); ?>
                  </div>
                </div>
                  <button class="btn btn-primary pull-right">Update</button>
              </form>
            </div>
            <div class="box-footer">

            </div>
          </div>
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>