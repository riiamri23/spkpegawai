<?php
if ($aksi == 'aksi_add') {
    foreach ($qdata as $r) {
        $c1_1=$r->c1_1;
       $c1_2=$r->c1_2;
       $c1_3=$r->c1_3;
       $c1_4=$r->c1_4;
       $c2_1=$r->c2_1;
       $c2_2=$r->c2_2;
       $c2_3=$r->c2_3;
       $c3_1=$r->c3_1;
       $c3_2=$r->c3_2;
       $c4_1=$r->c4_1;
    }
  
} 
?> 

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Form Nilai Krteria</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <?php echo $this->session->flashdata('Pesan'); ?> 
                        <form action="<?php echo base_url() ?>nilaikriteria/form/<?php echo $aksi ?>" method="post">
                        
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <thead> 
                                    <tr> 
                                        <th>Kriteria Pertama</th>
                                        <th>Penilaian</th> 
                                        <th>Kriteria Kedua</th>  
                                    </tr> 
                                </thead> 
                                <tbody>
                                    <tr>
                                    <td>Wawancara</td>
                                    <td><input type="text" name="c1_1" class="form-control" onkeyup="FormatCurrency(this)" placeholder="skala 2-9" value="<?php echo $c1_1?>" ></td>
                                    <td>Pendidikan</td>
                                    </tr>
                                    <tr>
                                    <td>Wawancara</td>
                                    <td><input type="text" name="c1_2" class="form-control" onkeyup="FormatCurrency(this)"  value="<?php echo $c1_2?>" placeholder="skala 2-9" ></td>
                                    <td>Pengalaman</td>
                                    </tr>
                                    <tr>
                                    <td>Wawancara</td>
                                    <td><input type="text" name="c1_3" class="form-control" onkeyup="FormatCurrency(this)"  value="<?php echo $c1_3?>" placeholder="skala 2-9" ></td>
                                    <td>Karakter</td>
                                    </tr>
                                    <tr>
                                    <td>Wawancara</td>
                                    <td><input type="text" name="c1_4" value="<?php echo $c1_4?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Gaji</td>
                                    </tr>
                                    <tr>
                                    <td>Pendidikan</td>
                                    <td><input type="text" name="c2_1" value="<?php echo $c2_1?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Pengalaman</td>
                                    </tr>
                                    <tr>
                                    <td>Pendidikan</td>
                                    <td><input type="text" name="c2_2" value="<?php echo $c2_2?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Karakter</td>
                                    </tr>
                                    <tr>
                                    <td>Pendidikan</td>
                                    <td><input type="text" name="c2_3" value="<?php echo $c2_3?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Gaji</td>
                                    </tr>
                                    <tr>
                                    <td>Pengalaman</td>
                                    <td><input type="text" name="c3_1" value="<?php echo $c3_1?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Karakter</td>
                                    </tr>
                                    <tr>
                                    <td>Pengalaman</td>
                                    <td><input type="text" name="c3_2" value="<?php echo $c3_2?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Gaji</td>
                                    </tr>
                                    <tr>
                                    <td>Karakter</td>
                                    <td><input type="text" name="c4_1" value="<?php echo $c4_1?>" onkeyup="FormatCurrency(this)"  class="form-control" placeholder="skala 2-9" ></td>
                                    <td>Gaji</td>
                                    </tr>
                                </tbody>
                                    <tr> 
                                        <td colspan="2">
                                            <input type="submit" class="btn btn-success" value="Simpan"> 
                                            <button type="reset" class="btn btn-default">Batal</button> 
                                        </td> 
                                    </tr> 
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>