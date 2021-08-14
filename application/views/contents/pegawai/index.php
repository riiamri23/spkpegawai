
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Pegawai</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>calonpegawai/form/add?batch=<?=$batch?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Calon Pegawai</a> 
                        

                        <a href="<?php echo base_url() ?>calonpegawai/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                        <i class="mdi mdi-delete"></i> Hapus Semua Data</a> 
                        <a href="<?php echo base_url() ?>normalisasidata?batch=<?=$batch?>" class="btn btn-sm btn-success">
                        <i class="mdi mdi-eye"></i> Lihat Normalisasi Calon Pegawai</a> 
                        <br><br>

                        <div class="table-responsive">
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
                                        <th>Aksi</th> 
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
                                                <td><a href="<?php echo base_url() ?>calonpegawai/form/edit/<?php echo $row->id ?>?batch=<?=$batch?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                                <a href="<?php echo base_url() ?>calonpegawai/hapus/<?php echo $row->id ?>?batch=<?=$batch?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                                                
                                                </td> 
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
</div>