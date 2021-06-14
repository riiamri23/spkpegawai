

<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">Silahkan Cetak Laporan</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12 mx-auto">

                        <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
                        <form action="<?php echo base_url() ?>laporan/laporanperangkingan" method="post">
                                
                                <div class="col-md-6">
                                    <label for="">Pilih Tahun Data Yang Akan Dicetak</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="tahun" class="form-control" >
                                        <option value="2019">2019</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div><br><br>
                                <input type="submit" class="btn btn-sm btn-primary" value="LAPORAN HASIL PERANGKINGAN "> 

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>