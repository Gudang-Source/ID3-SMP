<?php

require_once "vendor/autoload.php";
require 'app/class.php';
$Crud = Crud::idupin()->mysqli2;
$Request = json_decode(json_encode($_REQUEST));
$aksi = $Request->aksi;
$link = $_SERVER['HTTP_REFERER'];

$aksi($Request, $Crud);
function insert($Request, $Crud)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    if ($table == "data_training") {
        $data['training'] = collect($Crud->table('data_training')->select()->where('nis/nisn', $input[1])->get());
        if ($data['training']->isNotEmpty()) {
            $link = $_SERVER['HTTP_REFERER'];

            echo "<script>alert('Ditemukan data dengan nis/nisn yang sama. Silahkan gunakan nis/nisn berbeda')</script>";
            echo "<script>location.href='$link'</script>";
            die();
        }

    }
    $Crud->table($table)->insert($ar)->execute();
}
function update($Request, $Crud)
{
    $tb = $Request->tb;
    $input = $Request->input;
    $table = $Request->table;
    $tes = collect($tb);
    $ar = $tes->combine($input)->toArray();
    $Crud->table($table)->update($ar)->where($Request->primary, $Request->key)->execute();
}
function delete($Request, $Crud)
{
    $table = $Request->table;
    $Crud->table($table)->delete()->where($Request->primary, $Request->key)->execute();
}
echo "<script>alert('Berhasil')</script>";

echo "<script>location.href='$link'</script>";
