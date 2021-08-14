<?php

if ($aksi == 'aksi_add') {
    $id = "";
    $subkriteria = '';
    $value = '';
} else {
    // print_r($data);
    $id = $data->id;
    $subkriteria = $data->subkriteria;
    $value = $data->value;
}
?>
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <form action="<?php echo base_url() ?>skripsisubkriteria/form/<?php echo $aksi ?>" method="post">
                            <input type="hidden" name="id" required class="form-control" value="<?=$id?>"> 
                            <input type="hidden" name="kriteria" required class="form-control" value="<?=$kriteria?>"> 

                            <table class="table">
                                <tr> 
                                    <td>Subkriteria</td> 
                                    <td> 
                                        <div class="col-sm-6"> 
                                            <input type="text" name="subkriteria" required class="form-control" value="<?=$subkriteria?>"> 
                                        </div>
                                    </td>
                                </tr> 
                                <tr> 
                                    <td>Value</td> 
                                    <td> 
                                        <div class="col-sm-6"> 
                                            <input type="number" name="value" required class="form-control" step="0.01" value="<?=$value?>"> 
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