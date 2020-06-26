<?php

$profil = [
    'Nama Sekolah' => 'SMA YKPP Dumai',
    'NPSN' => 10404987,
    'Nomor Statistik Sekolah' => 304090205009,
    'Akreditasi' => 'A',
    'Provinsi' => 'Riau',
    'Otonomi Daerah' => 'Kota Dumai',
    'Kecamatan' => 'Dumai Selatan',
    'Desa/Kelurahan' => 'Bukit Datuk',
    'Telepon' => '(0765 ) 443348
      Hp. 0853-6466-2888',
    'Email' => 'sma_ykpp_dumai@yahoo.co.id',
    'Tanggal Izin Operasi' => '10 Maret 1984',

];
?>
<div class="row ">
    <div class="col-12 col-lg-8 mb-2">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Visi </h6>
            <div class="jumbotron">
                <h1 class="text-center h2">“Berdisiplin, Berprestasi, Berakhlak Muli, Berbudaya yang Berwawasan Lingkungan dan Globar Berlandaskan Iman dan Tawa”</h1>
            </div>
        </div>
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Misi </h6>
            <div class="jumbotron p-3 ">
                <div class="d-flex">
                    <span class="mb-0 px-3 mb-2 py-2 shadow text-wrap bg-white rounded-pill ">
                        <a href="#kedisiplinan" data-toggle="collapse">1. MISI untuk mencapai kedisiplinan</a>
                    </span>
                </div>
                <ul class="list-group collapse ml-4 mb-2" id="kedisiplinan">
                    <li class="list-group-item">a. Mengoptimalkan pelaksanaan tata tertib guna penigkatan disiplin bagi seluruh warga disekolah</li>
                    <li class="list-group-item">b. Mengoptimalkan budaya ontime, fulltime, bagi seluruh warga sekolah</li>
                </ul>
                <div class="d-flex">
                    <span class="mb-0 px-3 mb-2 py-2 shadow text-wrap bg-white rounded-pill ">
                        <a href="#prestasi" data-toggle="collapse">2. MISI untuk mencapai prestasi</a>
                    </span>
                </div>
                <ul class="list-group collapse ml-4 mb-2" id="prestasi">
                    <li class="list-group-item">
                        a. Melaksanakan pembelajaran secara efektif dan efisien dengan mengembangkan kurikulum yang ada dipadukan dengan kurikulum satuan pendidikan dan sistem penguian atau penilaian berasis komptetnsi.
                    </li>
                    <li class="list-group-item">b. Menumbuhkan motivasi berprestasi untuk seluruh warga sekolah</li>
                    <li class="list-group-item">c. Melaksanakan pembelajaran dan bimbingan yang kreatif dan inovatif yang mengacu pada model pembelaran yang berpusat pada siswa.</li>
                    <li class="list-group-item">d. Meningkatkan profil kemampuan guru dan tenaga kerja kependidikan lainya sehingga menjadi guru yang professional dalam bidangnya.</li>
                </ul>
                <div class="d-flex">
                    <span class="mb-0 px-3 mb-2 py-2 shadow text-wrap bg-white rounded-pill ">
                        <a href="#akhlak" data-toggle="collapse">3. MISI untuk mencapai akhlak mulia </a>
                    </span>
                </div>
                <ul class="list-group collapse ml-4 mb-2" id="akhlak">
                    <li class="list-group-item">
                        a. Meningkatkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.
                    </li>
                    <li class="list-group-item">
                        b. Menumbuhkan dan meningkatkan penghayatan terhadap ajaran agama yang dianuk serta menghargai kultur budaya bangsa
                    </li>
                    <li class="list-group-item">
                        c. Menambahkan prilaku sopan, santun, berdasarkan budi pekerti yang luhur sehingga sopan santun tersebut menajdi sumber kearifan dalam bertindak.
                    </li>
                </ul>
                <div class="d-flex">
                    <span class="mb-0 px-3 mb-2 py-2 shadow text-wrap bg-white rounded-pill ">
                        <a href="#berbudaya" data-toggle="collapse">4. MISI untuk mencapai berbudaya yang berwawasan lingkungan dan global </a>
                    </span>
                </div>
                <ul class="list-group collapse ml-4 mb-2" id="berbudaya">
                    <li class="list-group-item">
                        a. Menumbuhkan kembangkan sikap kepedulian terhadap masalah lingkungan social serta tanggap dalam perubahan global
                    </li>
                    <li class="list-group-item">
                        b. Mengoptimalkan penghormatan terhadap nilai-nilai keanekaragaman dan kebangsaan
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card rounded shadow mb-2" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Profil Sekolah </h6>
            <div class="jumbotron p-3 ">
                <table class="table table-hover table-striped">
                    <?php foreach ($profil as $k => $v): ?>
                    <tr>
                        <td class=" p-1">
                            <?php echo $k; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right p-1">
                            <?php echo $v; ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</div>