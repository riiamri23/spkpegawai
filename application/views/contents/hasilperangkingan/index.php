
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Data Hasil Perangkingan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <form action="<?php echo base_url() ?>hasilperangkingan" method="get">
                                <div class="row mb-3">
                                
                                    <div class="col-md-6">
                                        <label for="">Pilih Batch Data Rangking</label>
                                        <select name="batch" class="form-control" required>
                                            <option value="">Pilih Batch</option>
                                            <?php 
                                                if(!empty($batches)){
                                                    foreach($batches as $batch){
                                            ?>
                                            <option value="<?=$batch->id?>"><?=$batch->batch?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-sm btn-primary" value="Submit"> 

                        </form>
                        <table class="table table-striped myTable table-responsive"> 
                            <thead> 
                                <tr> 
                                    <?php
                                        if(!empty($data)){

                                            foreach(get_object_vars($data[0]) as $key => $val) {
                                                // do your stuff
                                                if($key !== 'id' && $key !== 'id_batch'){

                                    ?>
                                        <th><?=$key?></th>

                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php if (empty($data)) { ?>
                                    <tr> 
                                        <td colspan="8">Data tidak ditemukan</td> 
                                    </tr> 
                                <?php
                                } else {
                                    // $no = 0;
                                    foreach ($data as $row) {
                                        // $no++;
                                        ?> 
                                        <tr> 
                                            <?php 
                                                foreach($row as $key => $val){
                                                    if($key !== 'id' && $key !== 'id_batch'){
                                            ?>
                                            <td><?=$val?></td>

                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tr> 
                                        <?php
                                    }
                                }
                                ?> 
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
