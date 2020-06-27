<div class="row ">

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