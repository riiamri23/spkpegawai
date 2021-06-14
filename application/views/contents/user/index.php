

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Daftar User Aplikasi</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>user/form/add" class="btn btn-sm btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Tambah User Aplikasi</a>                
                            <br><br>

                        <table class="table table-striped"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Username</th>
                                    <th>Nama Lengkap</th> 
                                    <th>Jabatan</th>
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
                                            <td><?php echo $row->username ?></td> 
                                            <td><?php echo $row->nama_lengkap ?></td> 
                                            <td><?php echo $row->jabatan ?></td>
                                            <td><a href="<?php echo base_url() ?>user/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                <a href="<?php echo base_url() ?>user/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                            
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