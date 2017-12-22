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
            <?php foreach($edit_nilai->result_array() as $row)?>
              <form action="<?php echo base_url();?>web/update_data_nilai" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                  <div class="form-group col-lg-4">
                    <label>Nilai</label>
                      <input type="hidden" name="id_nilai" value="<?php echo $row['id_nilai'];?>"/>
                      <input type="text" name="nilai_angka" value="<?php echo $row['nilai_angka'];?>" class="form-control" placeholder="Masukkan Nilai ( ex : 0 - 45 )">
                    <?php echo form_error('nilai_angka'); ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Nilai</label>
                      <input type="text" name="nilai_huruf" value="<?php echo $row['nilai_huruf'];?>" class="form-control" placeholder="Masukkan Nilai Huruf ( Ex : B )">
                    <?php echo form_error('nilai_huruf'); ?>
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