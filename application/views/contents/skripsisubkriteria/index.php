
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header"><?=$title?></p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>skripsisubkriteria/form/add?kriteria=<?=$kriteria?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Subkriteria</a> 
                        <table class="table table-striped myTable"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Subkriteria</th>
                                    <th>value</th>
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
                                        <td><?=$row->subkriteria?></td>
                                        <td><?=$row->value?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>skripsisubkriteria/form/edit/<?=$row->id?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                            <a href="<?php echo base_url() ?>skripsisubkriteria/hapus/<?=$row->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
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