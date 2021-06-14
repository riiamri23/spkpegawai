
<div class="col-lg-12">
    <div class="grid">
        <!-- <p class="grid-header">Table With Badge</p> -->
        <div class="item-wrapper">
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
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
                                <td><?php echo $row->kode ?></td> 
                                 <td><?php echo $row->nama ?></td> 
                                <td><?php echo $row->jenis ?></td>
                                <td><a href="<?php echo base_url() ?>kriteria/form/edit/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a> 
                                   
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