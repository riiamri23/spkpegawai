                

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Hasil Normalisasi</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <form action="<?php echo base_url() ?>normalisasidata/proses" method="post">
                                <input type="submit" class="btn btn-sm btn-primary" value="Proses Normalisasi"> 
                                <a href="<?php echo base_url() ?>normalisasidata/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                                <i class="glyphicon glyphicon-trash"></i> Hapus Semua Data</a> 
                            
                                <br><br>

                                <div class="col-md-6">
                                    <label for="">Pilih Tahun Data Normalisasi</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="batch" class="form-control" required>
                                        <option value="">Pilih Batch</option>
                                        <?php
                                        if(!empty($batches)){
                                            foreach($batches as $batch){
                                        ?>
                                        <option value="<?=$batch->id?>"><?=$batch->batch?></option>

                                        <?php

                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                        </form>

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