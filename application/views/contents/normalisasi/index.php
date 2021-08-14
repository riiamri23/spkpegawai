                

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Hasil Normalisasi</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <form action="<?php echo base_url() ?>normalisasidata/proses" method="post">
                            <input type="hidden" name="batch" value="<?=$batch?>">
                            <input type="submit" class="btn btn-sm btn-primary" value="Proses Normalisasi"> 
                            <!-- <a href="<?php echo base_url() ?>normalisasidata/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                            <i class="glyphicon glyphicon-trash"></i> Hapus Semua Data</a>  -->

                        </form>

                        <table class="table table-striped myTable"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
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
                                    $no = 0;
                                    foreach ($data as $row) {
                                        $no++;
                                        ?> 
                                        <tr> 
                                            <td><?php echo $no ?></td>
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