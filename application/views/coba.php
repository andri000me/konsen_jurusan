<script type="text/javascript"> 
        $("#nim").change(function(){
                var nim = {nim:$("#nim").val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url(); ?>index.php/sinkron/siswa",
               data: nim,
               success: function(msg){
               $('#name_mhs').html(msg);
               }
            });
              });
       </script>
<script type="text/javascript">
$(document).ready(function(){
 $('#nim').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
  var chosenim = $('#nim').val();  // AMBIL isi dari fiel NPM masukkan variabel 'chosenim'
  $.ajax({        // Memulai ajax
    method: "POST",      
    url: "<?php echo base_url();?>web/pilih_nim",    // file PHP yang akan merespon ajax
    data: { nim: chosenim}   // data POST yang akan dikirim
  })
    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
        $('#name_mhs').val(hasilajax);  // Isikan hasil dari ajak ke field 'name_mhs' 
    });
 })
});
</script>

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
                  <div class="form-group col-lg-6" id="nim">
                    <label>No Induk Mahasiswa</label>
                      <select name="nim" id="nim" class="form-control">
                      <?php
                        echo "<option>- Pilih No Induk Mahasiswa -</option>";
                        foreach($mhs->result_array() as $m)
                        {
                            echo "<option value='".$m['nim']."'>".$m['nim']."</option>";
                        }
                      ?>
                      </select>
                  </div>
                  <div class="form-group col-lg-6" id="name_mhs">
                      <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control">
                  </div>

                  <div class="form-group col-lg-10">
                    <label>Kode Mata Kuliah</label>
                      <select name="id_mk" class="form-control">
                        <?php foreach($data_mk->result_array() as $mk){?>
                          <option value="<?php echo $mk['id_mk'];?>">
                            [ <?php echo $mk['kode_mk'];?> ] -- <?php echo $mk['nama_mk'];?>
                          </option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="form-group col-lg-2">
                    <label>nilai</label>
                      <select name="id_nilai" class="form-control">
                        <?php foreach($nilai->result_array() as $n){?>
                          <option value="<?php echo $n['id_nilai'];?>">
                            <?php echo $n['nilai_huruf'];?> [ <?php echo $n['range_nilai'];?> ]
                          </option>
                        <?php } ?>
                      </select>
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