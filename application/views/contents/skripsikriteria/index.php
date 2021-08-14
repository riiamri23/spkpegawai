
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>skripsikriteria/form/add" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Kriteria</a> 
                        <table class="table table-striped myTable"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Kriteria</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php if (empty($data)) { ?>
                                    <tr> 
                                        <td colspan="100%">Data tidak ditemukan</td> 
                                    </tr> 
                                <?php
                                } else {
                                    $no = 0;
                                    foreach($data as $row){
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$row->kriteria?></td>
                                        <td><?=$row->jenis?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>skripsisubkriteria?kriteria=<?=$row->id?>" class="btn btn-sm"><i class="mdi mdi-eye"></i></a> 
                                            <a href="<?php echo base_url() ?>skripsikriteria/form/edit/<?=$row->id?>?kriteria=<?=$row->id?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                            <!-- <a href="<?php echo base_url() ?>skripsikriteria/hapus/<?=$row->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a> -->
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