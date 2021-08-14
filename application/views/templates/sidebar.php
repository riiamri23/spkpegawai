
<div class="sidebar">
    <div class="user-profile">
        <div class="display-avatar animated-avatar">
        <img class="profile-img img-lg rounded-circle" src="<?php echo base_url()?>Asset/images/unnamed.jpeg" alt="profile image">
        </div>
        <!-- <div class="info-wrapper">
        <p class="user-name">Allen Clerk</p>
        <h6 class="display-income">$3,400,00</h6>
        </div> -->
    </div>
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li>
            <a href="<?=base_url()?>">
                <span class="link-title">Home</span>
                <i class="mdi mdi-home link-icon"></i>
            </a>
        </li>
        <!-- <li>
            <a href="#kriteria" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">Kriteria</span>
                <i class="mdi mdi-file-document link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="kriteria">
                <li>
                    <a href="<?=base_url()?>kriteria" >Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>nilaikriteria/form/add">Nilai Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>kriteria/perbandingan">Perbandingan Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>pembobotan">Pembobotan Kriteria AHP</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="#kriteria" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">Kriteria</span>
                <i class="mdi mdi-file-document link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="kriteria">
                <li>
                    <a href="<?=base_url()?>skripsikriteria" >Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>skriteriap">Kriteria Terpilih</a>
                </li>
                <li>
                    <a href="<?=base_url()?>skriterian">Nilai Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>spkriteria">Perbandingan Kriteria</a>
                </li>
                <li>
                    <a href="<?=base_url()?>sahpkriteria">Pembobotan Kriteria</a>
                </li>
            </ul>
        </li>
        <li>
        
        <a href="<?=base_url()?>batch">
            <span class="link-title">Data Calon Pegawai</span>
            <i class="mdi mdi-file-document link-icon"></i>
        </a>
        <!-- <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"> -->
            <!-- <span class="link-title">Data Calon Pegawai</span> -->
            <!-- <i class="mdi mdi-file-document link-icon"></i> -->
        <!-- </a> -->
        <!-- <ul class="collapse navigation-submenu" id="ui-elements"> -->
            <!-- <li> -->
                <!-- <a href="<?=base_url()?>batch">Calon Pegawai</a> -->
            <!-- </li> -->
            <!-- <li> -->
                <!-- <a href="<?=base_url()?>normalisasidata">Normalisasi Data Pegawai</a> -->
            <!-- </li> -->
        <!-- </ul> -->
        </li>
        <!-- <li>
        
            <a href="<?=base_url()?>sbatch">
                <span class="link-title">Data Calon Pegawai</span>
                <i class="mdi mdi-file-document link-icon"></i>
            </a>
        </li>
         -->
        <li>
            <a href="<?=base_url()?>perangkingan"><span class="link-title">Proses Perangkingan</span>
            <i class="mdi mdi-file-document link-icon"></i></a>
        </li>
        <li>
            <a href="<?=base_url()?>hasilperangkingan"><span class="link-title">Hasil Perangkingan</span><i class="mdi mdi-file-document link-icon"></i></a>
        </li>
        
        <li>
            <a href="<?=base_url()?>laporan"><span class="link-title">Laporan</span><i class="mdi mdi-file-document link-icon"></i></a>
        </li>
        <li class="nav-category-divider">info</li>
        <!-- <li>
            <a href="<?=base_url()?>user">
                <span class="link-title">User</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li> -->
        <li>
            <a href="<?=base_url() ?>login/keluar">
                <span class="link-title">Logout</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
    </ul>
</div>