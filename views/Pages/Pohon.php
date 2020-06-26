<div class="row ">
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Partisi Data</h6>
            <table class="table ">
                <thead>
                    <tr>
                        <th></th>
                        <th>Semua</th>
                        <th>Sesuai</th>
                        <th>Tidak Sesuai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (['training', 'testing'] as $k5): ?>

                    <tr>
                        <th><a href="#<?php echo $k5; ?>-data" data-toggle="collapse"><?php echo ucfirst($k5); ?></a></th>
                        <td>
                            <?php echo $data['partisi']->$k5->count(); ?>
                        </td>
                        <td>
                            <?php echo $data['partisi']->$k5->where('kesesuaian', 'Sesuai')->count(); ?>
                        </td>
                        <td>
                            <?php echo $data['partisi']->$k5->where('kesesuaian', 'Tidak Sesuai')->count(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="p-0">
                            <div class="collapse" id="<?php echo $k5; ?>-data">
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
                                                Nilai
                                                <?php echo $e['label']; ?>
                                            </th>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            <?php foreach ($data['training.bidang'] as $e): ?>
                                            <?php if ($e['tb']): ?>
                                            <th class="">
                                                Bidang
                                                <?php echo $e['label']; ?>
                                            </th>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            <th>Kesesuaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['partisi']->$k5 as $v => $e): ?>
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

                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Hasil Training</h6>
            <?php echo kucing($data['hasil'], $data, $komponen, 1); ?>
        </div>
    </div>
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Pohon Keputusan</h6>
            <div class="tree " style="zoom:75%">
                <?php echo kucing2($data['hasil'], $data, $komponen, 1); ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Rules</h6>
            <?php echo kucing3($data['hasil'], $data, $komponen, 1); ?>
        </div>
    </div>
</div>
<?php

function kucing($hasil, $data, $komponen, $node)
{
    $hasil = $hasil[0];
    include $komponen . '/List.php';

}
function kucing2($hasil, $data, $komponen, $node)
{
    $hasil = $hasil[0];
    include $komponen . '/List2.php';

}
function kucing3($hasil, $data, $komponen, $node)
{
    $hasil = $hasil[0];
    include $komponen . '/List3.php';

}
?>