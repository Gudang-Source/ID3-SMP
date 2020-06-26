<?php

/**
 *
 */

class Controller
{
    public $Request;
    public $Data;
    public $Crud;
    public function __construct($Request)
    {
        $this->Crud = Crud::idupin();

        $this->Request = json_decode(json_encode($Request));
        $hal = $this->Request->hal;
        $this->$hal();

    }
    public function fields($tb)
    {

        return dd($this->Crud->getFields($tb)->toJson());
    }
    public function Login()
    {
        $data = [
            'judul' => 'Login',
            'path' => 'Login',
            'link' => 'Login',

        ];
        $Request = $this->Request;
        $this->Data = $data;
        if (isset($Request->login)) {
            $data['admin'] = collect($this->Crud->mysqli2->table('user')->select()->where('user', $Request->user)->where('pass', $Request->pass)->get());
            if ($data['admin']->isEmpty()) {
                echo "<script>alert('Maaf, Username atau Password yang anda inputkan salah');</script>";
                echo "<script>location.href = '?hal=Login';</script>";
                die();
            } else {
                $_SESSION['admin'] = $data['admin']->first();
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location.href = '?hal=Home';</script>";
                die();
            }

        }
    }
    public function Logout()
    {
        session_destroy();
        echo "<script>alert('Berhasil');</script>";
        echo "<script>location.href = '?hal=Login';</script>";
        die();
    }

    public function Home()
    {
        $data = [
            'judul' => 'Home',
            'path' => 'Pages/Home',
            'link' => 'Home',

        ];

        $this->Data = $data;
    }
    public function User()
    {
        $data = [
            'judul' => 'Data User',
            'path' => 'Master/User',
            'induk' => 'Master',
            'link' => 'User',

        ];
        $fields1 = '[
                {"name":"user","label":"Username","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"pass","label":"Password","type":"password","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":false},
                {"name":"nama","label":"Nama Lengkap","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true},
                {"name":"level","label":"Level Akses","type":"select","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true}
                ]';
        $data['user'] = collect($this->Crud->mysqli2->table('user')->select()->get());

        $data['user.form'] = json_decode($fields1, true);

        $this->Data = $data;
    }
    public function Data()
    {
        $data = [
            'judul' => 'Data Training',
            'path' => 'Pages/Data',
            'induk' => 'Halaman',
            'link' => 'Data',
        ];
        //$this->fields('data_training');

        $fields1 = '[
                {"name":"nama","label":"Nama","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nis\/nisn","label":"NIS\/NISN","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jurusan","label":"Jurusan","type":"text","max":"60","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"ektrakurikuler","label":"Bidang Ektrakurikuler Di Pilih","type":"text","max":"70","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['training.form'] = json_decode($fields1, true);
        $fields1 = '[
                 {"name":"seni","label":"Kesenian","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"kwn","label":"Kewarganegaran","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"pj","label":"Pendidikan Jasmani","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"mtk","label":"Matematika","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bi","label":"Bahasa Indonesia","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.nilai'] = json_decode($fields1, true);
        $fields1 = '[
                 {"name":"bpi","label":"Pengembangan IPTEK","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bo","label":"Olahraga","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},{"name":"kesesuaian","label":"Kesesuaian","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);

        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get());

        $this->Data = $data;
    }
    public function Pohon()
    {
        $data = [
            'judul' => 'Pohon Keputusan',
            'path' => 'Pages/Pohon',
            'induk' => 'Halaman',
            'link' => 'Pohon',
        ];
        //$this->fields('data_training');

        $fields1 = '[
                {"name":"nama","label":"Nama","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nis\/nisn","label":"NIS\/NISN","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jk","label":"Jenis Kelamin","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"jurusan","label":"Jurusan","type":"text","max":"60","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"ektrakurikuler","label":"Bidang Ektrakurikuler Di Pilih","type":"text","max":"70","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}

                ]';
        $data['training.form'] = json_decode($fields1, true);
        $fields1 = '[
                 {"name":"seni","label":"Kesenian","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"kwn","label":"Kewarganegaran","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"pj","label":"Pendidikan Jasmani","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"mtk","label":"Matematika","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bi","label":"Bahasa Indonesia","type":"text","max":"1","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.nilai'] = json_decode($fields1, true);
        $fields1 = '[
                 {"name":"bpi","label":"Pengembangan IPTEK","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bo","label":"Olahraga","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},{"name":"kesesuaian","label":"Kesesuaian","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);

        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get());

        $this->Data = $data;
    }
    public function Proses()
    {

        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get());
        $result = json_decode(json_encode(['atr' => 'kesesuaian']));
        $result->data = $data['training']->unique($result->atr)->pluck($result->atr);
        $fields1 = '[
                 {"name":"seni","label":"Kesenian"},
                {"name":"kwn","label":"Kewarganegaran"},
                {"name":"pj","label":"Pendidikan Jasmani"},
                {"name":"mtk","label":"Matematika"},
                {"name":"bi","label":"Bahasa Indonesia"}

                ]';
        $data['training.nilai'] = json_decode($fields1);
        $fields1 = '[

                {"name":"bpi","label":"Pengembangan IPTEK"},
                {"name":"bo","label":"Olahraga"},
                {"name":"bksb","label":"Kelompok Seni Budaya (Fls2n)"},
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial"}
                ]';
        $data['training.bidang'] = json_decode($fields1);
        $node = array();
        foreach ($data['training.nilai'] as $k) {
            foreach (['A', 'B', 'C', 'D'] as $k2) {
                array_push($node, $this->row($data['training'], $k->name, $k2, $result));
            }

        }
        foreach ($data['training.bidang'] as $k) {
            foreach (['Sangat Tinggi', 'Tinggi', 'Rendah', 'Sangat Rendah'] as $k2) {
                array_push($node, $this->row($data['training'], $k->name, $k2, $result));
            }

        }
        dd($node);

        $this->Data = $data;
    }
    public function row($data, $atr, $nilai, $result)
    {
        $a = [
            'atribut' => $atr,
            'nilai' => $nilai,
            "sum(nilai)" => $data->where($atr, $nilai)->count(),
        ];
        $a['s'] = array();
        foreach ($result->data as $k) {
            $s = array();

            $s['label'] = $k;
            $s["sum"] = $data->where($atr, $nilai)->where($result->atr, $k)->count();
            $s["p"] = $this->p($s["sum"], $a['sum(nilai)']);
            $s["p2"] = $this->p2($s["p"]);
            array_push($a['s'], $s);
        }
        $a['en'] = $this->en(collect($a['s']));
        $a['pe'] = ($this->p($a['sum(nilai)'], $data->count())) * $a['en'];
        return $a;
    }
    public function p($current, $all)
    {
        $pn = @($current / $all);
        if (is_nan($pn)) {$pn = 0;}
        return $pn;
    }
    public function p2($p)
    {
        $pn = -$p * (log($p, 2));
        if (is_nan($pn)) {$pn = 0;}

        return $pn;
    }
    public function en($s)
    {

        return $s->sum('p2');
    }

}
