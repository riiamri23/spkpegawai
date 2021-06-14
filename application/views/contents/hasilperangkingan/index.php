
<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Data Hasil Perangkingan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

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
                                    <th>Hasil</th>
                                    <th>Rangking</th> 
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
                                            <td><?=$row->hasil ?></td>
                                            <td><?=$row->rangking ?></td>
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
