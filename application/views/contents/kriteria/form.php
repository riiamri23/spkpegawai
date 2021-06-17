
<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $nama = "";
    $jenis = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $kode = $rowdata->kode;
        $nama = $rowdata->nama;
        $jenis = $rowdata->jenis;
    }
}
?> 
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Edit Batch</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                    <?php echo $this->session->flashdata('Pesan'); ?> 
                    <form action="<?php echo base_url() ?>kriteria/form/<?php echo $aksi ?>" method="post">
                        <table class="table table-striped">
                            <tr> 
                                <td style="width:15%;">Kode Kriteria</td> 
                                <td> 
                                    <div class="col-sm-2"> 
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                                        <input type="text"  name="kode_kriteria" class="form-control" value="<?php echo $kode; ?>"> 
                                    </div> 
                                </td> 
                            </tr> 
                            <tr> 
                                <td style="width:15%;">Nama Kriteria</td> 
                                <td> 
                                    <div class="col-sm-5"> 
                                        <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"> 
                                    </div> 
                                </td> 
                            </tr> 
                            
                            <tr>
                                <td>Status</td> 
                                <td> 
                                    <div class="col-sm-5"> 
                                        <select name="jenis" required="requreid" class="form-control"> 
                                            <option></option> 
                                            <option value="benefit" <?php
                                            if ($aksi == "aksi_edit") {
                                                if ($jenis == 'benefit') {
                                                    echo "selected=selected";
                                                }
                                            }
                                            ?>>benefit</option> 
                                            <option value="cost"  <?php
                                            if ($aksi == "aksi_edit") {
                                                if ($jenis == 'cost') {
                                                    echo"selected";
                                                }
                                            }
                                            ?>>cost</option> 
                                        
                                        </select>
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