<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Laporan Rangking Batch <?=ucfirst($data[0]->batch)?></title>
</head>
<body>
<h3 align="center">Laporan Rangking Batch <?=ucfirst(strtolower($data[0]->batch))?></h3>
<table border="1">
    <thead>
        <tr> 
            <?php
                if(!empty($data)){

                    foreach(get_object_vars($data[0]) as $key => $val) {
                        // do your stuff
                        if($key !== 'id' && $key !== 'id_batch'){

            ?>
                <th><?=$key?></th>

            <?php
                        }
                    }
                }
            ?>
        </tr> 
    </thead>
    <tbody>
        <?php if (empty($data)) { ?>
            <tr> 
                <td colspan="8">Data tidak ditemukan</td> 
            </tr> 
        <?php
        } else {
            // $no = 0;
            foreach ($data as $row) {
                // $no++;
                ?> 
                <tr> 
                    <?php 
                        foreach($row as $key => $val){
                            if($key !== 'id' && $key !== 'id_batch'){
                    ?>
                    <td><?=$val?></td>

                    <?php
                            }
                        }
                    ?>
                </tr> 
                <?php
            }
        }
        ?> 
    <tbody>
</table>
</body>
</html>