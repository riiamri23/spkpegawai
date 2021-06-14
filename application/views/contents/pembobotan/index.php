

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Form Nilai Krteria</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        
                        <div class="table-responsive">
                            <table class="table table-striped"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Kriteria</th>
                                    <th>C1</th> 
                                    <th>C2</th> 
                                    <th>C3</th> 
                                    <th>C4</th>
                                    <th>C5</th> 
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
                                            <td><?php echo $row->kriteria ?></td> 
                                            <td><?php echo number_format($row->c1,2) ?></td> 
                                            <td><?php echo number_format($row->c2,2) ?></td>
                                            <td><?php echo number_format($row->c3,2) ?></td> 
                                            <td><?php echo number_format($row->c4,2) ?></td>
                                            <td><?php echo number_format($row->c5,2) ?></td>
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
    <div class="grid">
        <p class="grid-header">Hasil Pembobotan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        <p><?php echo $this->session->flashdata('pesan') ?> </p> 
                        <a href="<?php echo base_url() ?>pembobotan/proses" class="btn btn-sm btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Proses Ulang Pembobotan</a><br> <br>

                        
                        <div class="table-responsive">
                            <table class="table table-striped"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Kriteria</th>
                                    <th>C1</th> 
                                    <th>C2</th> 
                                    <th>C3</th> 
                                    <th>C4</th>
                                    <th>C5</th> 
                                    <th>Bobot</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php if (empty($data_bobot)) { ?>
                                    <tr> 
                                        <td colspan="8">Data tidak ditemukan</td> 
                                    </tr> 
                                <?php
                                } else {
                                    $no = 0;
                                    foreach ($data_bobot as $row) {
                                        $no++;
                                        ?> 
                                        <tr> 
                                            <td><?php echo $no ?></td>
                                            <td><?php echo "(".$row->kriteria.") ". $row->nama_kriteria ?></td> 
                                            <td><?php echo number_format($row->c1,2) ?></td> 
                                            <td><?php echo number_format($row->c2,2) ?></td>
                                            <td><?php echo number_format($row->c3,2) ?></td> 
                                            <td><?php echo number_format($row->c4,2) ?></td>
                                            <td><?php echo number_format($row->c5,2) ?></td>
                                            <td><b><?php echo number_format($row->bobot,2) ?></b></td>
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


    <div class="grid">
        <p class="grid-header">Detail Hasil Perhitungan Matrix</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">
                        
       <div class="table-responsive"><table class="table table-striped"> 
                            <thead> 
                                <tr> 
                                    <th>No</th> 
                                    <th>Kriteria</th>
                                    <th>C1</th> 
                                    <th>C2</th> 
                                    <th>C3</th> 
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>Hasil</th> 
                                    <th>Total</th>
                                    <th>Eigen Vector</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php if (empty($data_eigen)) { ?>
                                    <tr> 
                                        <td colspan="8">Data tidak ditemukan</td> 
                                    </tr> 
                                <?php
                                } else {
                                    $no = 0;
                                    foreach ($data_eigen as $row) {
                                        $no++;
                                        ?> 
                                        <tr> 
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->kriteria ?></td> 
                                            <td><?php echo number_format($row->c1,2) ?></td> 
                                            <td><?php echo number_format($row->c2,2) ?></td>
                                            <td><?php echo number_format($row->c3,2) ?></td> 
                                            <td><?php echo number_format($row->c4,2) ?></td>
                                            <td><?php echo number_format($row->c5,2) ?></td>
                                            <td><b><?php echo number_format($row->hasil,2) ?></b></td>
                                            <td><b><?php echo number_format($row->total_hasil,4) ?></b></td>
                                            <td><b><?php echo number_format($row->bobot,2) ?></b></td>
                                        </tr> 
                                        <?php
                                    }
                                }
                                ?> 
                            </tbody> 
                        </table></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>