<ul class='list-group'>
    <li class='list-group-item'>
        <a href="#node<?php echo $node; ?>" data-toggle="collapse">Node :
            <?php echo $node; ?></a>
        <ul class='list-group collapse' id="node<?php echo $node; ?>">
            <li class='list-group-item'>
                <a href="#table-node<?php echo $node; ?>" data-toggle="collapse">Table</a>
                <div class="collapse" id="table-node<?php echo $node; ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>sum(nilai)</th>
                                <th>sum(Sesuai)</th>
                                <th>sum(Tidak Sesuai)</th>
                                <th>entropi</th>
                                <th>gain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (collect($hasil->tb)->groupBy('kdparameter') as $v => $k): ?>
                            <?php foreach (collect($k)->values() as $b => $k2): ?>
                            <tr>
                                <?php if ($b == 0): ?>
                                <td rowspan="<?php echo $k->count() + 1; ?>">
                                    <?php if ($v == 'semua'): ?>
                                    Semua
                                    <?php else: ?>
                                    <?php echo $data['kondisi'][$v][0]->type . " " . $data['kondisi'][$v][0]->label; ?>
                                    <?php endif;?>
                                </td>
                                <?php endif;?>
                                <td>
                                    <?php echo $k2->kondisi; ?>
                                </td>
                                <td>
                                    <?php echo $k2->all; ?>
                                </td>
                                <td>
                                    <?php echo $k2->a; ?>
                                </td>
                                <td>
                                    <?php echo $k2->n; ?>
                                </td>
                                <td>
                                    <?php echo $k2->e; ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php endforeach;?>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <?php echo collect($hasil->gain)->where('kdparameter', $v)->sum('gain'); ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </li>
            <li class='list-group-item'>
                <a href="#cabang-node<?php echo $node; ?>" data-toggle="collapse">Cabang</a>
                <ul class="list-group collapse" id="cabang-node<?php echo $node; ?>">
                    <?php foreach (collect($hasil->heads)->values() as $v => $k): ?>
                    <?php $label = $data['kondisi'][$hasil->root[0]][0]->type . " " . $data['kondisi'][$hasil->root[0]][0]->label;?>
                    <li class='list-group-item'>
                        <strong>
                            <?php echo $label; ?></strong>
                        <?php echo $k->kondisi; ?>
                        <?php if (is_array($k->cabang)): ?>
                        <?php $v = $v + 1;?>
                        <?php kucing($k->cabang, $data, $komponen, "$node-$v");?>
                        <?php else: ?>
                        <div>
                            <?php if ($k->cabang == 'Sesuai'): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $k->cabang; ?>
                            </div>
                            <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $k->cabang; ?>
                            </div>
                            <?php endif;?>
                        </div>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </li>
        </ul>
    </li>
</ul>