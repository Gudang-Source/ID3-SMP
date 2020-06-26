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
                        <th><a href="#<?php echo $k5; ?>-data" data-toggle="collapse">
                                <?php echo ucfirst($k5); ?></a></th>
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
            <h6 class="text-dark ml-2 mt-1 pt-1">Pengujian</h6>
            <div class="card-body">
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
                            <th>Actual</th>
                            <th>Classified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['partisi']->testing as $v => $e): ?>
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
                            <td>
                                <?php echo $e->analisa; ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h6 class="text-dark ml-2 mt-1 pt-1">Confusion Matrix</h6>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle;" rowspan="2">
                                klasifikasi Oleh ID3
                            </th>
                            <th colspan="2">Asli </th>
                        </tr>
                        <tr>
                            <th>
                                Sesuai
                            </th>
                            <th>
                                Tidak Sesuai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Sesuai</th>
                            <td>
                                <?php echo $TP = $data['partisi']->testing->where('confusion', "TP")->count(); ?>
                                <div> <strong>(TP)</strong></div>
                            </td>
                            <td>
                                <?php echo $FN = $data['partisi']->testing->where('confusion', "FN")->count(); ?>
                                <div> <strong>(FN)</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Tidak Sesuai</th>
                            <td>
                                <?php echo $FP = $data['partisi']->testing->where('confusion', "FP")->count(); ?>
                                <div> <strong>(FP)</strong></div>
                            </td>
                            <td>
                                <?php echo $TN = $data['partisi']->testing->where('confusion', "TN")->count(); ?>
                                <div> <strong>(TN)</strong></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ol>
                    <li>Accuracy = (TP+TN)/(TP+FP+FN+TN) = (<?php echo $TP; ?>+<?php echo $TN; ?>)/(<?php echo "$TP+$FP+$FN+$TN"; ?>) = <?php echo $TP + $TN; ?>/<?php echo $TP + $FP + $FN + $TN; ?> = <?php echo ($TP + $TN) / ($TP + $FP + $FN + $TN); ?> * 100% = <?php echo $Accuracy = round((($TP + $TN) / ($TP + $FP + $FN + $TN)) * 100, 2); ?>%</li>
                    <li>Precision  = (TP)/(TP+FP) = (<?php echo $TP; ?>)/(<?php echo "$TP+$FP"; ?>) = <?php echo $TP; ?>/<?php echo $TP + $FP; ?> = <?php echo ($TP) / ($TP + $FP); ?> * 100% = <?php echo $Precision = round((($TP) / ($TP + $FP)) * 100, 2); ?>%</li>
                    <li>Recall  = (TP)/(TP+FN) = (<?php echo $TP; ?>)/(<?php echo "$TP+$FN"; ?>) = <?php echo $TP; ?>/<?php echo $TP + $FN; ?> = <?php echo ($TP) / ($TP + $FN); ?> * 100% = <?php echo $Recall = round((($TP) / ($TP + $FN)) * 100, 2); ?>%</li>
                    <li>F-measure  = (2 x Precision x Recall)/(Precision + Recall) = (2 x <?php echo $Precision; ?> x <?php echo $Recall; ?>)/(<?php echo $Precision; ?> + <?php echo $Recall; ?>) = (<?php echo 2 * $Precision * $Recall; ?>)/(<?php echo $Precision + $Recall; ?>) = <?php echo $Fmeasure = round((2 * $Precision * $Recall) / ($Precision + $Recall), 2); ?> %</li>

                </ol>
                <div v-pre>
                <canvas  id="myChart" height="100" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>