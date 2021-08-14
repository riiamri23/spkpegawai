
<?php
if ($aksi == 'aksi_add') {
    $id = "";
    // $batch = "";
    $nama = "";
} else {
    // foreach ($qdata as $rowdata) {
        $id = $qdata->id;
        // $batch = $rowdata->batch;
        $nama = $qdata->nama;
    // }
    

}
?> 
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Form Nilai Krteria</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                    <form action="<?php echo base_url() ?>calonpegawai/form/<?php echo $aksi ?>" method="post">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                        <input type="hidden" name="batch" required class="form-control" value="<?php echo $batch ?>"> 
                        <table class="table">
                            <!-- <tr> 
                                <td style="width:15%;">Batch</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <select name="batch" required class="form-control">
                                            <?php 
                                                // if(!empty($batches)){
                                                //     foreach($batches as $batch){
                                            ?>

                                            <?php

                                                //     }
                                                
                                                // }
                                            ?>

                                        </select>
                                    </div> 
                                </td> 
                            </tr>  -->
                            <tr> 
                                <td>Nama</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <input type="text" name="nama" required class="form-control" value="<?php echo $nama ?>"> 
                                    </div>
                                </td>
                            </tr> 
                            <?php 
                                foreach($kriteria as $val){
                                    // $subval->value==$qdata->$$val->id?'selected':''
                                    $valkriteria = !empty($qdata) ? $qdata->{$val['id']} : 0;
                            ?>
                                <tr> 
                                    <td><?=$val['kriteria']?></td> 
                                    <td> 
                                        <div class="col-sm-6"> 
                                                <select name="<?=$val['id']?>" class="form-control" required>
                                                    <option value="">Pilih</option>
                                                    <?php 
                                                        foreach($val['subkriteria'] as $subval){
                                                    ?>

                                                        <option value="<?=$subval->value?>" <?=$subval->value == $valkriteria ? 'selected':''?>><?=$subval->subkriteria?></option>
                                                    <?php

                                                        }
                                                    ?>
                                                </select>
                                        </div>
                                    </td>
                                </tr> 

                            <?php

                                }
                            ?>
                            <tr> 
                                <td colspan="2">
                                    <input type="submit" class="btn btn-success" value="Simpan"> 
                                    <button type="reset" class="btn btn-default">Batal</button> 
                                </td> 
                            </tr> 
                        </table> 
                    </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>