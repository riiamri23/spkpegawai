
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Form Nilai Krteria</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <?php echo $this->session->flashdata('Pesan'); ?> 
                        <form action="<?php echo base_url() ?>skriterian/form/<?php echo $aksi ?>" method="post">
                        
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
                                    <?php 
                                        if(!empty($data)){
                                            for($x =0; $x < count($data);$x++){
                                                $z = 1;
                                                for($y = $x+1; $y < 6; $y++){
                                                    $kriteria = strtolower($data[$x]->id) . "_" . $z;

                                    ?>
                                        <tr>
                                            <td><?=$data[$x]->id?></td>
                                            <td>
                                                <input type="number" name="<?=$kriteria?>" class="form-control" placeholder="skala 0.01-9" step="0.01" min="0.01" max="9" value="<?=$dnilai->$kriteria?>" />
                                            </td>
                                            <td><?=$data[$y]->id?></td>
                                        </tr>
                                    <?php
                                                $z++;
                                                }
                                            }
                                        }
                                    ?>

                                    </tbody>
                                    <tfoot>
                                        <tr> 
                                            <td colspan="3">
                                                <input type="submit" class="btn btn-success" value="Simpan" /> 
                                                <button type="reset" class="btn btn-default">Batal</button> 
                                            </td> 
                                        </tr> 
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>