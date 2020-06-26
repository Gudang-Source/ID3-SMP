<div class="row ">
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Form Input</h6>
            <div class=" card-body ">
                <form action="Action.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <?php foreach ($data['training.form'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control " name="input[]">
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jk">
                                </div>
                                <?php elseif ($isi['name'] == 'jurusan'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Jurusan</label>
                                    <select class="form-control " name="input[]">
                                        <option value="Ilmu Alam">Ilmu Alam</option>
                                        <option value="Ilmu Sosial">Ilmu Sosial</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jurusan">
                                </div>
                                <?php elseif ($isi['name'] == 'ektrakurikuler'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Ektrakurikuler yang dipilih</label>
                                    <select class="form-control " name="input[]">
                                        <?php foreach ($data['extra'] as $k2): ?>

                                        <option value="<?php echo $k2; ?>"><?php echo $k2; ?></option>
                                        <?php endforeach;?>

                                    </select>
                                    <input type="hidden" name="tb[]" value="ektrakurikuler">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Input.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Kesesuaian</label>
                                    <select class="form-control " name="input[]">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="kesesuaian">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <?php foreach ($data['training.nilai'] as $isi): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Nilai <?php echo $isi['label']; ?></label>
                                    <select class="form-control " name="input[]">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="<?php echo $isi['name']; ?>">
                                </div>
                                <?php endforeach;?>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <?php foreach ($data['training.bidang'] as $isi): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Bidang <?php echo $isi['label']; ?></label>
                                    <select class="form-control " name="input[]">
                                        <option value="Sanggat Tinggi">Sanggat Tinggi</option>
                                        <option value="Tinggi">Tinggi</option>
                                        <option value="Rendah">Rendah</option>
                                        <option value="Sanggat Rendah">Sanggat Rendah</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="<?php echo $isi['name']; ?>">
                                </div>
                                <?php endforeach;?>
                                <div class="modal-footer col-12  py-1">
                                    <input type="hidden" name="table" value="data_training">
                                    <button type="submit" name="aksi" value="insert" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Data</h6>
            <?php $table = "data_training";?>
            <?php $id = "id";?>
            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <?php foreach ($data['training.form'] as $e): ?>
                        <?php if ($e['tb']): ?>
                        <th class="">
                            <?php echo $e['label']; ?>
                        </th>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php foreach ($data['training.nilai'] as $e): ?>
                        <?php if ($e['tb']): ?>
                        <th class="">
                            Nilai <?php echo $e['label']; ?>
                        </th>
                        <?php endif;?>
                        <?php endforeach;?>
                         <?php foreach ($data['training.bidang'] as $e): ?>
                        <?php if ($e['tb']): ?>
                        <th class="">
                            Bidang <?php echo $e['label']; ?>
                        </th>
                        <?php endif;?>
                        <?php endforeach;?>
                        <th>Kesesuaian</th>

                        <th data-priority="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['training'] as $v => $e): ?>
                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                        <?php foreach ($data['training.form'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php echo $e->$b; ?>
                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php foreach ($data['training.nilai'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php echo $e->$b; ?>
                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php foreach ($data['training.bidang'] as $e1): ?>
                        <?php if ($e1['tb']): ?>
                        <td class="text-wrap">
                            <?php $b = $e1['name'];?>
                            <?php echo $e->$b; ?>
                        </td>
                        <?php endif;?>
                        <?php endforeach;?>
                        <td>
                            <?php echo $e->kesesuaian; ?>
                        </td>

                        <td class="text-right ">
                            <span style="display: none" id="data-<?php echo $e->$id; ?>">
                                <?php echo json_encode($e); ?></span>
                            <a class="mr-1 text-info" onclick="app.kd=JSON.parse($('#data-<?php echo $e->$id; ?>').html())" data-toggle="modal" data-target="#modal-edit" href="javascript:void(0)">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class=" text-danger" onclick="return confirm('Apakah anda yakin ingin hapus data ini?');" href="Action.php?aksi=delete&table=<?php echo $table; ?>&primary=<?php echo $id; ?>&key=<?php echo $e->$id; ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade " id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog mb-5 modal-lg ">
        <form action="Action.php" v-if="kd!=null" method="post" enctype="multipart/form-data">
            <div class="modal-content ">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Data</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span class="text-danger">x</span>
                    </button>
                </div>
                <div class="modal-body  " style="background: rgb(240, 241, 245)">
                    <div style="zoom:85%" class="card card-body ">
                        <div class="row">
                           <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <?php foreach ($data['training.form'] as $isi): ?>
                                <?php if ($isi['name'] == 'jk'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control " :value="kd.<?php echo ($isi['name']); ?>" name="input[]">
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jk">
                                </div>
                                <?php elseif ($isi['name'] == 'jurusan'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Jurusan</label>
                                    <select class="form-control " :value="kd.<?php echo ($isi['name']); ?>" name="input[]">
                                        <option value="Ilmu Alam">Ilmu Alam</option>
                                        <option value="Ilmu Sosial">Ilmu Sosial</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="jurusan">
                                </div>
                                <?php elseif ($isi['name'] == 'ektrakurikuler'): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Ektrakurikuler yang dipilih</label>
                                    <select :value="kd.ektrakurikuler" class="form-control " name="input[]">
                                        <?php foreach ($data['extra'] as $k2): ?>
                                        <option value="<?php echo $k2; ?>"><?php echo $k2; ?></option>
                                        <?php endforeach;?>

                                    </select>
                                    <input type="hidden" name="tb[]" value="ektrakurikuler">
                                </div>
                                <?php else: ?>
                                <?php include $komponen . '/Up.php';?>
                                <?php endif;?>
                                <?php endforeach;?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Kesesuaian</label>
                                    <select :value="kd.kesesuaian" class="form-control " name="input[]">
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="kesesuaian">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <?php foreach ($data['training.nilai'] as $isi): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Nilai <?php echo $isi['label']; ?></label>
                                    <select class="form-control " :value="kd.<?php echo ($isi['name']); ?>" name="input[]">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="<?php echo $isi['name']; ?>">
                                </div>
                                <?php endforeach;?>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <?php foreach ($data['training.bidang'] as $isi): ?>
                                <div class="form-grup col-12 col-lg-6 mb-2 input-group-sm">
                                    <label class="form-control-label">Bidang <?php echo $isi['label']; ?></label>
                                    <select class="form-control " :value="kd.<?php echo ($isi['name']); ?>" name="input[]">
                                        <option value="Sanggat Tinggi">Sanggat Tinggi</option>
                                        <option value="Tinggi">Tinggi</option>
                                        <option value="Rendah">Rendah</option>
                                        <option value="Sanggat Rendah">Sanggat Rendah</option>
                                    </select>
                                    <input type="hidden" name="tb[]" value="<?php echo $isi['name']; ?>">
                                </div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                            <div class="modal-footer col-12  py-1">
                                <input type="hidden" name="table" value="data_training">
                                <input type="hidden" name="primary" value="id">
                                <input type="hidden" name="key" :value="kd.id">
                                <button type="button" class="btn shadow-sm btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="aksi" value="update" class="btn shadow-sm btn-sm btn-info">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>