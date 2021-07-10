
<?php
$kriterias = array(
    "wawancara"=> ["Sangat Buruk", "Buruk", "Cukup", "Baik", "Sangat Baik"], 
    "pendidikan" => ["SMA/SMK", "D3", "S1"], 
    "pengalaman"=>["Belum Ada/Freshgraduate", "1 - < 2 Tahun", "> 2 Tahun"], 
    "penampilan"=> ["Sangat Buruk", "Buruk", "Cukup", "Baik", "Sangat Baik"],
    "sertifikat"=> ["Tidak Ada", "Ada"],
);
if ($aksi == 'aksi_add') {
    $id = "";
    // $batch = "";
    $nama = "";
    $usia = "";
    $valkriterias = ['', '', '', '', ''];
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        // $batch = $rowdata->batch;
        $nama = $rowdata->nama;
        $valkriterias = [
            $rowdata->wawancara, 
            $rowdata->pendidikan, 
            $rowdata->pengalaman, 
            $rowdata->penampilan, 
            $rowdata->sertifikat
        ];

        $usia = $rowdata->usia;
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
                                <td>Usia</td> 
                                <td> 
                                    <div class="col-sm-6"> 
                                        <input type="number" name="usia" required class="form-control" value="<?php echo $usia ?>"> 
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