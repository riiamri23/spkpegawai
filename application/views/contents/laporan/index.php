

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Silahkan Cetak Laporan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <form action="<?php echo base_url() ?>laporan/generate" method="post" target="_blank">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>