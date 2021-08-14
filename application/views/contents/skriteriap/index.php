
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <form action="<?php echo base_url() ?>skriteriap/form/<?php echo $aksi ?>" method="post">

                            <table class="table">
                            <?php 
                                if(!empty($kterpilih)){
                                    foreach($kterpilih as $key=> $val){
                                        ?>
                                        <tr> 
                                            <td><?=$val->id?></td> 
                                            <td> 
                                                <div class="col-sm-6"> 
        
                                                    <select name="kriteria[<?=$val->id?>]" class="form-control" required>
                                                        <option value="">Pilih Kriteria</option>
                                                            <?php 
                                                                if(!empty($data)){
                                                                    foreach($data as $val2){
                                                            ?>
                                                                <option value="<?=$val2->id?>" <?=$val->id_kriteria == $val2->id ? "selected" : ""?>><?=$val2->kriteria?></option>
                                                            <?php 
                                                                    }
                                                                }
                                                            ?>
                
                                                    </select>
                                                </div>
                                            </td>
                                        </tr> 

                                        <?php
                                    }
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