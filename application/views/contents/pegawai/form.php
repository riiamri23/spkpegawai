
<?php
$kriterias = array("wawancara"=> ["sangat baik", "baik", "kurang baik"], "pendidikan" => ["sd", "smp", "sma/smk", "d3", "s1"], "pengalaman"=>["sangat berpengalaman", "baik", "kurang berpengalaman"], "karakter"=> ["sangat aktif", "aktif", "kurang aktif"],);
$valkriterias = ['', '', '', ''];
if ($aksi == 'aksi_add') {
    $id = "";
    $batch = "";
    $nama = "";
    // $wawancara = "";
    // $pendidikan = "";
    // $pengalaman = "";
    // $karakter = "";
    $gaji = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        // $nis = $rowdata->nis;
        $batch = $rowdata->batch;
        $nama = $rowdata->nama;
        $valkriterias = [$rowdata->wawancara, $rowdata->pendidikan, $rowdata->pengalaman, $rowdata->karakter];
        // $wawancara = $rowdata->wawancara;
        // $pendidikan = $rowdata->pendidikan;
        // $pengalaman = $rowdata->pengalaman;
        // $karakter = $rowdata->karakter;

        $gaji = $rowdata->gaji;
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
                    <form action="<?php echo base_url() ?>calonpenerima/form/<?php echo $aksi ?>" method="post">
                        <table class="table">
                            <tr> 
                                <td style="width:15%;">Batch</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                                        <select name="batch" required class="form-control">
                                            <?php 
                                                if(!empty($batches)){
                                                    foreach($batches as $batch){
                                            ?>
                                                <option value="<?=$batch->id?>" <?=$batch->id == $batch ? 'selected':''?>><?=$batch->batch?></option>

                                            <?php

                                                    }
                                                
                                                }
                                            ?>

                                        </select>
                                    </div> 
                                </td> 
                            </tr> 
                            <tr> 
                                <td>Nama</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <input type="text" name="nama" required class="form-control" value="<?php echo $nama ?>"> 
                                    </div>
                                </td>
                            </tr> 
                            <?php 
                                $counter = 0;
                                foreach($kriterias as $kriteria => $value){
                                    ?>
                                    <tr> 
                                        <td><?=ucwords($kriteria)?></td> 
                                        <td> 
                                            <div class="col-sm-6">
                                                <select name="<?=$kriteria?>" class="form-control" required>
                                                        <?php 
                                                            if(!empty($value)){
                                                                foreach($value as $val){
                                                        ?>
                                                        <option value="<?=$val?>" <?=$valkriterias[$counter] == $val ? 'selected':''?>><?=$val?></option>
            
                                                        <?php 
                                                                }
                                                            }
                                                        ?>
            
                                                </select>
                                            </div>
                                        </td> 
                                    </tr> 

                                    <?php
                                $counter++;
                                }
                            ?>
                            <tr> 
                                <td>Gaji</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <input type="number" name="gaji" required class="form-control" value="<?php echo $gaji ?>"> 
                                    </div>
                                </td>
                            </tr> 
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