
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Tabel Calon Pegawai</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <a href="<?php echo base_url() ?>calonpenerima/form/add" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Calon Penerima</a> 
                        <a href="<?php echo base_url() ?>calonpenerima/form/add" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-file-excel"></i> Proses Normaliasi</a> 
                        <div class="table-responsive">
                            <table class="table"> 
                                <thead> 
                                    <tr> 
                                        <th>Aksi</th>
                                        <th>No</th> 
                                        <th>Batch</th>
                                        <th>Nama</th>
                                        <th>Wawancara</th>
                                        <th>Pendidikan</th>
                                        <th>Pengalaman</th>
                                        <th>Karakter</th>
                                        <th>Gaji</th>
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
                                        foreach ($data as $row) {
                                            $no++;
                                            ?> 
                                            <tr> 
                                                <td><a href="" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                                <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                                                <td><?=$no?></td>
                                                <td><?=$row->batch?></td>
                                                <td><?=$row->nama?></td>
                                                <td><?=$row->wawancara?></td>
                                                <td><?=$row->pendidikan?></td>
                                                <td><?=$row->pengalaman?></td>
                                                <td><?=$row->karakter?></td>
                                                <td><?=$row->gaji?></td>
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