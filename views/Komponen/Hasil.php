<?php foreach (collect($hasil->heads)->values() as $v => $k): ?>
<?php $key = $hasil->root[0];?>
<?php if ($Request->$key == $k->kondisi): ?>

<?php $label = $data['kondisi'][$hasil->root[0]][0]->type . " " . $data['kondisi'][$hasil->root[0]][0]->label;?>
<?php if (is_array($k->cabang)): ?>
<?php $v = $v + 1;?>
<?php $tu = kucing4($k->cabang, $data, $komponen, "$node-$v", $Request);?>
<?php else: ?>
<?php $tu = $k->cabang;?>
<?php endif;?>
<?php endif;?>

<?php endforeach;?>