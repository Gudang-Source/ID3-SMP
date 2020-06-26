<ul <?php if ($node == 1): ?> class="d-flex justify-content-center " <?php endif;?>>
    <li <?php if ($node == 1): ?>  <?php endif;?>>
        <a href='#node2-<?php echo $node; ?>' data-toggle='collapse'>
            <div class="text-center  card-body p-2">
                <p class="p-0 m-0"><strong>Node :
                        <?php echo $node; ?></strong>
                </p>
                <?php $label = $data['kondisi'][$hasil->root[0]][0]->type . " " . $data['kondisi'][$hasil->root[0]][0]->label;?>
                <p class="p-0 m-0">
                    <?php echo $label; ?>
                </p>
            </div>
        </a>
        <div class="collapse show" id='node2-<?php echo $node; ?>'>
        <ul class=''  >
            <?php foreach (collect($hasil->heads)->values() as $v => $k): ?>
            <li>
                <div class="text-center border-1 card-body p-2">
                    <p class="p-0 m-0"><strong>
                            <?php echo $k->kondisi; ?>
                        </strong>
                    </p>
                </div>
                <ul>
                    <?php if (is_array($k->cabang)): ?>
                            <?php $v = $v + 1;?>
                        <?php kucing2($k->cabang, $data, $komponen, "$node-$v");?>
                        <?php else: ?>
                            <?php if ($k->cabang == 'Sesuai'): ?>
                            <div class="alert alert-success p-2" role="alert">
                                <?php echo $k->cabang; ?>
                            </div>
                            <?php else: ?>
                                <div class="alert alert-danger p-2" role="alert">
                                <?php echo $k->cabang; ?>
                            </div>
                            <?php endif;?>
                    <?php endif;?>
                </ul>



            </li>
            <?php endforeach;?>
        </ul>
        </div>
    </li>
</ul>