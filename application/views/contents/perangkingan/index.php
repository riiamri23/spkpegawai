
                

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Silahkan Proses Perangkingan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <form action="<?php echo base_url() ?>perangkingan/proses" method="post">
                                
                                <div class="col-md-6">
                                    <label for="">Pilih Batch Data Yang Akan Diproses</label>
                                </div>
                                <div class="col-md-6">
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
                                </div><br><br>
                                <input type="submit" class="btn btn-sm btn-primary" value="Proses Perangkingan"> 

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>