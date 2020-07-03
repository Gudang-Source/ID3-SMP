<div class="row ">
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <?php if (!isset($data['Request']->proses)): ?>
            <h6 class="text-dark ml-2 mt-1 pt-1">Form Input</h6>
            <div class=" card-body ">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4 col-12 border-right border-1">
                            <div class="row">

                                <div class="form-grup col-12  mb-2 input required-group-sm">
                                    <label class="form-control-label">NIS</label>
                                    <input required type="text" name="nis/nisn" class="form-control">
                                </div>
                                  <div class="form-grup col-12  mb-2 input required-group-sm">
                                    <label class="form-control-label">Nama</label>
                                    <input required type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-grup col-12  mb-2 input required-group-sm">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select required class="form-control " name="jk">
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                    </select>
                                </div>
                                <div class="form-grup col-12  mb-2 input required-group-sm">
                                    <label class="form-control-label">Jurusan</label>
                                    <select required class="form-control " name="jurusan">
                                        <option value="Ilmu Alam">Ilmu Alam</option>
                                        <option value="Ilmu Sosial">Ilmu Sosial</option>
                                    </select>
                                </div>
                                <div class="form-grup col-12 mb-2 input required-group-sm">
                                    <label class="form-control-label">Ektrakurikuler yang dipilih</label>
                                    <select required class="form-control " name="ektrakurikuler">
                                        <?php foreach ($data['extra'] as $k2): ?>
                                        <option value="<?php echo $k2; ?>">
                                            <?php echo $k2; ?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-12  ">
                                    <label class="form-control-label">Nilai Mata Pelajaran</label>
                                    <table class="table table-bordered">
                                        <?php foreach ($data['training.nilai'] as $k => $v): ?>
                                        <tr>
                                            <td>
                                                <?php echo $k + 1; ?>
                                            </td>
                                            <td>
                                                <?php echo $v['label']; ?>
                                            </td>
                                            <td>
                                                <input min="0" max="100" step="any" required type="number" class="form-control" name="<?php echo $v['name']; ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12 border-left border-1">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th style="vertical-align: middle;" rowspan="2">No.</th>
                                        <th style="vertical-align: middle;" rowspan="2">Pernyataan</th>
                                        <th colspan="<?php echo count($data['angket.isi']); ?>">Pilihan Jawaban</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($data['angket.isi'] as $k): ?>
                                        <th>
                                            <?php echo $k->kd; ?>
                                        </th>
                                        <?php endforeach;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['training.bidang'] as $k): ?>
                                    <tr>
                                        <td colspan="<?php echo count($data['angket.isi']) + 2; ?>">
                                            <strong>Bidang
                                                <?php echo $k['label']; ?></strong>
                                        </td>
                                    </tr>
                                    <?php foreach ($data['angket'][$k['name']] as $v2 => $k2): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v2 + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $k2->pertanyaan; ?>
                                        </td>
                                        <?php foreach ($data['angket.isi'] as $k11): ?>
                                        <td>
                                            <input type="radio" required="" name="<?php echo $k['name']; ?>[<?php echo $v2; ?>]" value="<?php echo $k11->nilai; ?>">
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer col-12  py-1">
                            <button type="submit" name="proses" class="btn btn-sm btn-primary">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif;?>
            <?php if (isset($data['Request']->proses)): ?>
            <div class="card-footer">
                <form action="Action.php" method="post">
                    <a href="?hal=Analisa" class="btn btn-sm btn-secondary">
                        << Kembali</a> <h4 class="text-center">Hasil Analisa</h4>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <td>NIS</td>
                                            <td>
                                                <?php $y = "nis/nisn";?>
                                                <?php echo $data['Request']->$y; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->$y; ?>">
                                                <input type="hidden" name="tb[]" value="nis/nisn">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <?php echo $data['Request']->nama; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->nama; ?>">
                                                <input type="hidden" name="tb[]" value="nama">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>
                                                <?php echo $data['Request']->jk; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->jk; ?>">
                                                <input type="hidden" name="tb[]" value="jk">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>
                                                <?php echo $data['Request']->jurusan; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->jurusan; ?>">
                                                <input type="hidden" name="tb[]" value="jurusan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ektrakurikuler</td>
                                            <td>
                                                <?php echo $data['Request']->ektrakurikuler; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->ektrakurikuler; ?>">
                                                <input type="hidden" name="tb[]" value="ektrakurikuler">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-12">
                            <?php $c = kucing4($data['hasil'], $data, $komponen, 1, $data['Request']);?>

                                        <div class="input-group mb-3">
                                               <select class="form-control">
                                                   <option <?php if ($c == "Sesuai"): ?> selected <?php endif;?> value="Sesuai">Sesuai</option>
                                                   <option <?php if ($c == "Tidak Sesuai"): ?> selected <?php endif;?> value="Tidak Sesuai">Tidak Sesuai</option>
                                               </select>
                                                <div class="input-group-append">
                                                    <input type="hidden" name="table" value="data_training">
                                                    <button class="btn btn-outline-primary" type="submit" name="aksi" value="insert" id="button-addon2">Tambahkan Ke Data Training</button>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <table class="table table-bordered table-hover">
                                        <?php foreach ($data['training.nilai'] as $k): ?>
                                        <tr>
                                            <td>Nilai
                                                <?php echo $k['label']; ?>
                                            </td>
                                            <td>
                                                <?php $b = $k['name'];?>
                                                <?php echo $data['Request']->$b; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->$b; ?>">
                                                <input type="hidden" name="tb[]" value="<?php echo $b; ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <table class="table table-bordered table-hover">
                                        <?php foreach ($data['training.bidang'] as $k): ?>
                                        <tr>
                                            <td>Bidang
                                                <?php echo $k['label']; ?>
                                            </td>
                                            <td>
                                                <?php $b = $k['name'];?>
                                                <?php echo $data['Request']->$b; ?>
                                                <input type="hidden" name="input[]" value="<?php echo $data['Request']->$b; ?>">
                                                <input type="hidden" name="tb[]" value="<?php echo $b; ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div>
                            </div>
                            <?php if ($c == 'Sesuai'): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $c; ?>
                            </div>
                            <?php elseif ($c == 'Tidak Sesuai'): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $c; ?>
                            </div>
                            <?php else: ?>
                            <div class="alert alert-warning" role="alert">
                                Pola tidak ditemukan
                            </div>
                            <?php endif;?>
                </form>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>