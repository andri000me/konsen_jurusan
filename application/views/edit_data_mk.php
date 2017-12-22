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
            <?php foreach($edit_mk->result_array() as $row)?>
              <form action="<?php echo base_url();?>web/update_data_mk" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-6">
                    <label>Kode Mata Kuliah</label>
                      <input type="hidden" name="id_mk" value="<?php echo $row['id_mk'];?>"/>
                      <input type="text" name="kode_mk" value="<?php echo $row['kode_mk'];?>" class="form-control" placeholder="Masukkan Kode Mata Kuliah">
                    <?php echo form_error('kode_mk'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Nama Mata Kuliah</label>
                      <input type="text" name="nama_mk" value="<?php echo $row['nama_mk'];?>" class="form-control" placeholder="Masukkan Nama Mata Kuliah">
                    <?php echo form_error('nama_mk'); ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Satuan Kredit Semester</label>
                      <input type="text" name="sks" value="<?php echo $row['sks'];?>" class="form-control" placeholder="Masukkan Nilai SKS Mata Kuliah">
                    <?php echo form_error('sks'); ?>
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