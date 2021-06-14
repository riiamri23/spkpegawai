
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Form Nilai Krteria</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>calonpenerima/form/add" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Calon Pegawai</a> 
                        

                        <a href="<?php echo base_url() ?>calonpenerima/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                        <i class="mdi mdi-delete"></i> Hapus Semua Data</a> 
                        <br><br>

                        <div class="table-responsive">
                            <table class="table table-striped myTable"> 
                                <thead> 
                                    <tr> 
                                        <th>No</th> 
                                        <th>Batch</th>
                                        <th>Nama</th> 
                                        <th>Wawancara</th>
                                        <th>Pendidikan</th>
                                        <th>Pengalaman</th>
                                        <th>Karakter</th>
                                        <th>Gaji</th>
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
                                                <td><?=$row->batch?></td>
                                                <td><?php echo $row->nama ?></td> 
                                                <td><?=$row->wawancara?></td>
                                                <td><?=$row->pendidikan?></td>
                                                <td><?=$row->pengalaman?></td>
                                                <td><?=$row->karakter?></td>
                                                <td><?=$row->gaji?></td>
                                                <td><a href="<?php echo base_url() ?>calonpenerima/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                                <a href="<?php echo base_url() ?>calonpenerima/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                                                
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