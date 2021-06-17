
<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $batch = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $batch = $rowdata->batch;
    }
}
?> 
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <?php echo $this->session->flashdata('Pesan'); ?> 
                        <form action="<?php echo base_url() ?>batch/form/<?php echo $aksi ?>" method="post">
                            <input type="hidden"  name="id" value="<?php echo $id; ?>"> 

                            <table class="table">
                                <tr> 
                                    <td style="width:15%;">Nama batch</td> 
                                    <td> 
                                        <div class="col-sm-8"> 
                                            <input type="text" name="batch" class="form-control" value="<?php echo $batch; ?>"> 
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