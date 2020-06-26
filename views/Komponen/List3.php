<ul class="list-group ">
    <?php foreach (collect($hasil->heads)->values() as $v => $k): ?>
    <li class='list-group-item'>
        <a href="#cabang-node3<?php echo "$node-$v"; ?>" data-toggle="collapse"><strong>If</strong>
            <?php $label = $data['kondisi'][$hasil->root[0]][0]->type . " " . $data['kondisi'][$hasil->root[0]][0]->label;?>
            <?php echo $label; ?>
            <?php echo $k->kondisi; ?>
            <strong>Then</strong>
        </a>
        <div class="collapse" id="cabang-node3<?php echo "$node-$v"; ?>">
            <?php if (is_array($k->cabang)): ?>
            <?php $v = $v + 1;?>
            <?php kucing3($k->cabang, $data, $komponen, "$node-$v");?>
            <?php else: ?>
            <?php if ($k->cabang == 'Sesuai'): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $k->cabang; ?>
            </div>
            <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $k->cabang; ?>
            </div>
            <?php endif;?>
            <?php endif;?>
        </div>
    </li>
    <?php endforeach;?>
</ul>