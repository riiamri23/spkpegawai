<?php

if ($aksi == 'aksi_add') {
    $id = "";
    $kriteria = '';
} else {
    // print_r($data);
    $id = $data->id;
    $kriteria = $data->kriteria;
}
?>
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <form action="<?php echo base_url() ?>skripsikriteria/form/<?php echo $aksi ?>" method="post">
                            <input type="hidden" name="id" required class="form-control" value="<?=$id?>"> 

                            <table class="table">
                                <tr> 
                                    <td>Kriteria</td> 
                                    <td> 
                                        <div class="col-sm-6"> 
                                            <input type="text" name="kriteria" required class="form-control" value="<?=$kriteria?>"> 
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