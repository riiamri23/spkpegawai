
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Calon Pegawai</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <a href="<?php echo base_url() ?>calonpegawai/formsave/add" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Batch</a> 

                        <div class="table-responsive">
                            <table class="table table-striped myTable"> 
                                <thead> 
                                    <tr> 
                                        <th>No</th> 
                                        <th>Batch</th> 
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
                                                <td><?php echo $row->batch ?></td> 
                                                <td><a href="<?php echo base_url() ?>calonpenerima?batch=<?php echo $row->id ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a> <a href="<?php echo base_url() ?>calonpenerima/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> <a href="<?php echo base_url() ?>calonpenerima/form/edit/<?php echo $row->id ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a></td> 
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