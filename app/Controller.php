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
                {"name":"nis\/nisn","label":"NIS\/NISN","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":false,"tb":true,"var":"input[]","var2":"tb[]"},
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
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);

        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get());
        $data['extra'] = $data['training']->unique('ektrakurikuler')->pluck('ektrakurikuler');

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
                {"name":"nis\/nisn","label":"NIS\/NISN","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":false,"tb":true,"var":"input[]","var2":"tb[]"},
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
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);

        $fields1 = '[

                {"kdparameter":"seni","label":"Kesenian","type":"Nilai"},
                {"kdparameter":"kwn","label":"Kewarganegaran","type":"Nilai"},
                {"kdparameter":"pj","label":"Pendidikan Jasmani","type":"Nilai"},
                {"kdparameter":"mtk","label":"Matematika","type":"Nilai"},
                {"kdparameter":"bi","label":"Bahasa Indonesia","type":"Nilai"},
                {"kdparameter":"bpi","label":"Pengembangan IPTEK","type":"Bidang"},
                {"kdparameter":"bo","label":"Olahraga","type":"Bidang"},
                {"kdparameter":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"Bidang"},
                {"kdparameter":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"Bidang"}
                ]';
        $data['kondisi'] = collect(json_decode($fields1));
        $data['atribut'] = array();
        foreach ($data['kondisi'] as $k) {
            if ($k->type == 'Extra') {
                foreach ($extra as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } elseif ($k->type == 'Nilai') {
                foreach (['A', 'B', 'C', 'D'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } else {
                foreach (['Sanggat Tinggi', 'Tinggi', 'Rendah', 'Sanggat Rendah'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            }
        }
        $data['atribut'] = collect(json_decode(json_encode($data['atribut'])));
        /*
        ->groupBy('kdparameter')->map(function ($item, $key) {
        $item = $item->map(function ($item, $key) {
        return [$item->kdparameter => $item->atribut];
        });
        return $item;
        });
        $t = $data['atribut']['seni']->crossJoin($data['atribut']['kwn']->toArray())->map(function ($item, $key) {

        return array_merge($item[0], $item[1]);
        });
         */
        $string = file_get_contents("results.json");

        $data['hasil'] = json_decode($string);
        $string = file_get_contents("partisi.json");

        $data['partisi'] = json_decode($string);
        $data['partisi']->training = collect($data['partisi']->training);
        $data['partisi']->testing = collect($data['partisi']->testing);
        $data['kondisi'] = $data['kondisi']->groupBy('kdparameter');

        /*
        $x = ['hasil' => '', 'urut' => '', 'root' => ''];
        foreach ($data['kondisi'] as $k) {
        $x[$k->kdparameter] = 'kondisi';
        }
        $hasil = pohon2($data['hasil'], $x, 0, $data['kondisi']);
         */
        //dd(collect(pohon($data['hasil']))->flatten());
        // dd($data['hasil']);
        $this->Data = $data;
    }
    public function Kinerja()
    {
        $data = [
            'judul' => 'Evaluasi Kinerja',
            'path' => 'Pages/Kinerja',
            'induk' => 'Halaman',
            'link' => 'Kinerja',
        ];
        //$this->fields('data_training');
        $fields1 = '[
                {"name":"nama","label":"Nama","type":"text","max":"25","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"},
                {"name":"nis\/nisn","label":"NIS\/NISN","type":"text","max":"10","pnj":12,"val":null,"red":"","input":true,"up":false,"tb":true,"var":"input[]","var2":"tb[]"}

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
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);

        $fields1 = '[

                {"kdparameter":"seni","label":"Kesenian","type":"Nilai"},
                {"kdparameter":"kwn","label":"Kewarganegaran","type":"Nilai"},
                {"kdparameter":"pj","label":"Pendidikan Jasmani","type":"Nilai"},
                {"kdparameter":"mtk","label":"Matematika","type":"Nilai"},
                {"kdparameter":"bi","label":"Bahasa Indonesia","type":"Nilai"},
                {"kdparameter":"bpi","label":"Pengembangan IPTEK","type":"Bidang"},
                {"kdparameter":"bo","label":"Olahraga","type":"Bidang"},
                {"kdparameter":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"Bidang"},
                {"kdparameter":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"Bidang"}
                ]';
        $data['kondisi'] = collect(json_decode($fields1));
        $data['atribut'] = array();
        foreach ($data['kondisi'] as $k) {
            if ($k->type == 'Extra') {
                foreach ($extra as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } elseif ($k->type == 'Nilai') {
                foreach (['A', 'B', 'C', 'D'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } else {
                foreach (['Sanggat Tinggi', 'Tinggi', 'Rendah', 'Sanggat Rendah'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            }
        }
        $data['atribut'] = collect(json_decode(json_encode($data['atribut'])));
        /*
        ->groupBy('kdparameter')->map(function ($item, $key) {
        $item = $item->map(function ($item, $key) {
        return [$item->kdparameter => $item->atribut];
        });
        return $item;
        });
        $t = $data['atribut']['seni']->crossJoin($data['atribut']['kwn']->toArray())->map(function ($item, $key) {

        return array_merge($item[0], $item[1]);
        });
         */
        $string = file_get_contents("results.json");

        $data['hasil'] = json_decode($string);
        $string = file_get_contents("partisi.json");

        $data['partisi'] = json_decode($string);
        $data['partisi']->training = collect($data['partisi']->training);
        $data['partisi']->testing = collect($data['partisi']->testing);
        $data['kondisi'] = $data['kondisi']->groupBy('kdparameter');
        foreach ($data['partisi']->testing as $v => $k) {
            $c = kucing4($data['hasil'], $data, "views/Komponen", 1, $k);
            if ($c == 'Sesuai'):
            elseif ($c == 'Tidak Sesuai'):
            else:
                $c = "Pola tidak ditemukan";
            endif;
            $data['partisi']->testing[$v]->analisa = $c;
            if ($k->kesesuaian == 'Sesuai') {
                if ($c == 'Sesuai') {
                    $data['partisi']->testing[$v]->confusion = "TP";
                } else {
                    $data['partisi']->testing[$v]->confusion = "FP";

                }

            } else {
                if ($c == 'Tidak Sesuai') {
                    $data['partisi']->testing[$v]->confusion = "TN";
                } else {
                    $data['partisi']->testing[$v]->confusion = "FN";

                }
            }

        }

        /*
        $x = ['hasil' => '', 'urut' => '', 'root' => ''];
        foreach ($data['kondisi'] as $k) {
        $x[$k->kdparameter] = 'kondisi';
        }
        $hasil = pohon2($data['hasil'], $x, 0, $data['kondisi']);
         */
        //dd(collect(pohon($data['hasil']))->flatten());
        // dd($data['hasil']);
        $this->Data = $data;
    }
    public function Proses()
    {
        $data = [
            'judul' => 'Pohon Keputusan',
            'path' => 'Pages/Pohon',
            'induk' => 'Halaman',
            'link' => 'Pohon',
        ];

        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get())->shuffle();
        $data['jum'] = ceil(($data['training']->count() * $this->Request->partisi) / 100);
        $data['partisi.test'] = $data['training']->splice($data['jum']);
        $data['partisi.train'] = $data['training'];
        $data['training'] = $data['partisi.train'];
        $partisi = ['partisi' => $this->Request->partisi, 'training' => $data['partisi.train'], 'testing' => $data['partisi.test']];
        $fp = fopen('partisi.json', 'w');
        fwrite($fp, json_encode($partisi));
        fclose($fp);
        $result = json_decode(json_encode(['atr' => 'kesesuaian']));
        $result->data = $data['training']->unique($result->atr)->pluck($result->atr);

        $extra = $data['training']->unique('ektrakurikuler')->pluck('ektrakurikuler');

        $fields1 = '[

                {"kdparameter":"seni","label":"Kesenian","type":"Nilai"},
                {"kdparameter":"kwn","label":"Kewarganegaran","type":"Nilai"},
                {"kdparameter":"pj","label":"Pendidikan Jasmani","type":"Nilai"},
                {"kdparameter":"mtk","label":"Matematika","type":"Nilai"},
                {"kdparameter":"bi","label":"Bahasa Indonesia","type":"Nilai"},
                {"kdparameter":"bpi","label":"Pengembangan IPTEK","type":"Bidang"},
                {"kdparameter":"bo","label":"Olahraga","type":"Bidang"},
                {"kdparameter":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"Bidang"},
                {"kdparameter":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"Bidang"}
                ]';
        $data['kondisi'] = collect(json_decode($fields1));
        $data['atribut'] = array();
        foreach ($data['kondisi'] as $k) {
            if ($k->type == 'Extra') {
                foreach ($extra as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } elseif ($k->type == 'Nilai') {
                foreach (['A', 'B', 'C', 'D'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            } else {
                foreach (['Sanggat Tinggi', 'Tinggi', 'Rendah', 'Sanggat Rendah'] as $k2) {
                    array_push($data['atribut'], ['kdparameter' => $k->kdparameter, 'atribut' => $k2]);
                }

            }
        }
        $data['atribut'] = collect(json_decode(json_encode($data['atribut'])));
        $data['hasil'] = nodes($data['training'], $data['kondisi'], $data['atribut']);
        $fp = fopen('results.json', 'w');
        fwrite($fp, json_encode($data['hasil']));
        fclose($fp);
        $link = $_SERVER['HTTP_REFERER'];

        echo "<script>alert('Berhasil');</script>";
        echo "<script>location.href = '$link';</script>";
        die();
    }
    public function Analisa()
    {
        $data = [
            'judul' => 'Analisa Kesesuaian / Testing',
            'path' => 'Pages/Analisa',
            'induk' => 'Halaman',
            'link' => 'Analisa',
        ];
        $Request = json_decode(json_encode($_REQUEST));
        $data['training'] = collect($this->Crud->mysqli2->table('data_training')->select()->get());
        $data['extra'] = $data['training']->unique('ektrakurikuler')->pluck('ektrakurikuler');

        //$this->fields('data_training');

        $fields1 = '[

                {"kdparameter":"seni","label":"Kesenian","type":"Nilai"},
                {"kdparameter":"kwn","label":"Kewarganegaran","type":"Nilai"},
                {"kdparameter":"pj","label":"Pendidikan Jasmani","type":"Nilai"},
                {"kdparameter":"mtk","label":"Matematika","type":"Nilai"},
                {"kdparameter":"bi","label":"Bahasa Indonesia","type":"Nilai"},
                {"kdparameter":"bpi","label":"Pengembangan IPTEK","type":"Bidang"},
                {"kdparameter":"bo","label":"Olahraga","type":"Bidang"},
                {"kdparameter":"bksb","label":"Kelompok Seni Budaya (Fls2n)","type":"Bidang"},
                {"kdparameter":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"Bidang"}
                ]';
        $data['kondisi'] = collect(json_decode($fields1));

        $string = file_get_contents("results.json");

        $data['hasil'] = json_decode($string);
        $string = file_get_contents("angket.json");
        $data['angket'] = collect(json_decode($string));
        $data['angket'] = $data['angket']->groupBy('kdparamater');
        $data['angket.isi'] = [
            ['kd' => 'SS', 'label' => 'Sangat Setuju', 'nilai' => 4],
            ['kd' => 'S', 'label' => 'Setuju', 'nilai' => 3],
            ['kd' => 'TS', 'label' => 'Tidak Setuju', 'nilai' => 2],
            ['kd' => 'STS', 'label' => 'Sangat Tidak Setuju', 'nilai' => 1],

        ];
        $data['angket.isi'] = json_decode(json_encode($data['angket.isi']));
        $data['kondisi'] = $data['kondisi']->groupBy('kdparameter');
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
                {"name":"bpks","label":"Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial","type":"text","max":"15","pnj":12,"val":null,"red":"","input":true,"up":true,"tb":true,"var":"input[]","var2":"tb[]"}
                ]';
        $data['training.bidang'] = json_decode($fields1, true);
        $data['Request'] = json_decode(json_encode($Request), true);
        if (isset($Request->proses)) {
            foreach ($data['training.nilai'] as $k) {
                if ($data['Request'][$k['name']] >= 85) {
                    $data['Request'][$k['name']] = "A";
                } elseif ($data['Request'][$k['name']] < 85 && $data['Request'][$k['name']] >= 75) {
                    $data['Request'][$k['name']] = "B";

                } elseif ($data['Request'][$k['name']] < 75 && $data['Request'][$k['name']] >= 60) {
                    $data['Request'][$k['name']] = "C";

                } elseif ($data['Request'][$k['name']] < 60 && $data['Request'][$k['name']] >= 50) {
                    $data['Request'][$k['name']] = "D";

                } else {
                    $data['Request'][$k['name']] = "E";

                }
            }
            foreach ($data['training.bidang'] as $k) {
                $data['Request'][$k['name']] = array_sum($data['Request'][$k['name']]);
                if ($data['Request'][$k['name']] >= 27) {
                    $data['Request'][$k['name']] = "Sanggat Tinggi";
                } elseif ($data['Request'][$k['name']] < 27 && $data['Request'][$k['name']] >= 21) {
                    $data['Request'][$k['name']] = "Tinggi";

                } elseif ($data['Request'][$k['name']] < 21 && $data['Request'][$k['name']] >= 15) {
                    $data['Request'][$k['name']] = "Rendah";

                } else {
                    $data['Request'][$k['name']] = "Sanggat Rendah";

                }
            }
            $data['Request'] = json_decode(json_encode($data['Request']));

        }

        $this->Data = $data;
    }

}
function kondisi($hasil)
{
    $hasil = $hasil[0];

}

function pohon2($hasil, $x, $urut, $parameter)
{
    $pohon = [];

    foreach ($hasil as $bb => $k) {
        $x['hasil'] = 'Apakah Anda mengalami ' . $parameter->where('kdparameter', $k->root[0])->first()->label . '?';
        $x['root'] = $k->root[0];
        $x['urut'] = $urut;
        $x['ke'] = $bb;

        array_push($pohon, $x);

        foreach ($k->heads as $a) {
            $x[$a->kdparameter] = $a->kondisi;

            if (isset($a->cabang)) {
                if (is_array($a->cabang)) {

                    $c = pohon2($a->cabang, $x, $urut + 1, $parameter);
                    foreach ($c as $v) {
                        array_push($pohon, $v);

                    }

                } else {
                    $x[$k->root[0]] = $a->kondisi;
                    $x['hasil'] = $a->cabang;

                    array_push($pohon, $x);

                }

            }
        }

    }

    return $pohon;
}
function node($semua, $tes, $kdparameter, $kondisi)
{

    $allofall = $semua->count();

    $all = $tes->count();
    if ($all == 0) {
        //return;
    }
    $n = $tes->where('kesesuaian', 'Tidak Sesuai')->count();
    $a = $tes->where('kesesuaian', 'Sesuai')->count();
    @$pn = $n / $all;
    if (is_nan($pn)) {$pn = 0;}
    @$pa = $a / $all;
    if (is_nan($pa)) {$pa = 0;}

    $lpn = log($pn, 2);
    if (is_infinite($lpn)) {$lpn = 0;}

    $lpa = log($pa, 2);
    if (is_infinite($lpa)) {$lpa = 0;}

    $xn = -$pn * $lpn;
    $xa = -$pa * $lpa;
    $e = $xn + $xa;
    @$p = $all / $allofall;
    if (is_nan($p)) {$p = 0;}

    $pe = $e * $p;
    return collect(['kdparameter' => $kdparameter, 'kondisi' => $kondisi, 'all' => $all, 'n' => $n, 'a' => $a, "pn" => $pn, "pa" => $pa, 'lpn' => $lpn, 'lpa' => $lpa, 'xn' => $xn, 'xa' => $xa, "e" => $e, 'p' => $p, 'pe' => $pe]);

}
function gain($eall, $pekdparameter, $kdparameter)
{
    $g = $eall - $pekdparameter;
    return collect(['gain' => $g, 'kdparameter' => $kdparameter]);

}
function nodes($tes, $kondisi, $atribut)
{
    $hasil = collect([0 => collect()]);

    $hasil[0]->put('tb', collect());
    $hasil[0]->put('gain', collect());
    $hasil[0]->put('root', collect());

    $hasil[0]->put('heads', collect());

    $hasil[0]['tb']->push(node($tes, $tes, 'semua', 'semua'));
    foreach ($kondisi as $k) {
        foreach ($atribut->where('kdparameter', $k->kdparameter) as $i) {

            $node = node($tes, $tes->where($k->kdparameter, $i->atribut), $k->kdparameter, $i->atribut);
            if ($node != null) {
                $hasil[0]['tb']->push($node);

            }

        }
        $eall = $hasil[0]['tb']->where('kdparameter', 'semua')->sum('e');
        $pekdparameter = $hasil[0]['tb']->where('kdparameter', $k->kdparameter)->sum('pe');

        $hasil[0]['gain']->push(gain($eall, $pekdparameter, $k->kdparameter));

    }

    $hasil[0]['root']->push($hasil[0]['gain']->max()['kdparameter']);
    $hasil[0]['heads'] = $hasil[0]['tb']->where('kdparameter', $hasil[0]['root'][0]);
    foreach ($hasil[0]['heads']->keys() as $k) {
        # code...
        if ($hasil[0]['heads'][$k]['e'] == 0) {

            if ($hasil[0]['heads'][$k]['n'] > 0) {

                $hasil[0]['heads'][$k]->put('cabang', 'Tidak Sesuai');
            } else {
                $hasil[0]['heads'][$k]->put('cabang', 'Sesuai');

            }
        } else {
            $a = $tes->where($hasil[0]['heads'][$k]['kdparameter'], $hasil[0]['heads'][$k]['kondisi']);
            $b = $kondisi->where('kdparameter', '!=', $hasil[0]['root'][0]);
            if ($b->count() > 0) {
                $hasil[0]['heads'][$k]->put('cabang', nodes($a, $b, $atribut));

            } else {

                if ($hasil[0]['heads'][$k]['n'] > 0) {

                    $hasil[0]['heads'][$k]->put('cabang', 'Tidak Sesuai');
                } else {
                    $hasil[0]['heads'][$k]->put('cabang', 'Sesuai');

                }

            }

        }

    }
    return $hasil;
}
function pohon($hasil)
{
    $pohon = [];

    foreach ($hasil as $k) {
        $pohon[0]['root'] = $k->root[0];
        foreach ($k->heads as $a) {
            $pohon[0]['heads'][$a->kondisi]['kondisi'] = $a->kondisi;
            if (isset($a->cabang)) {
                # code...
                if (is_array($a->cabang)) {

                    $pohon[0]['heads'][$a->kondisi]['cabang'] = pohon($a->cabang);

                } else {
                    $pohon[0]['heads'][$a->kondisi]['cabang'] = $a->cabang;

                }

            }
        }
    }

    return $pohon;
}

function cekpohon($hasil, $s)
{

    $pohon = [];
    foreach ($hasil as $k) {
        $head = $k['heads']->where('kondisi', $s[$k['root'][0]]);
        $jum = $head->count();
        if ($jum > 0) {
            foreach ($head as $a) {

                if (isset($a['cabang'])) {
                    if ($a['cabang'] instanceof Collection) {

                        $c = cekpohon($a['cabang'], $s);
                        $pohon = $c;

                    } else {
                        if ($a['cabang'] == 'Tidak') {
                            $pohon = 1;

                        }
                        if ($a['cabang'] == 'Ya') {
                            $pohon = 2;

                        }

                    }

                }
            }

        } else {
            $pohon = 0;

        }

    }

    return $pohon;
}
function kucing4($hasil, $data, $komponen, $node, $Request)
{
    $hasil = $hasil[0];
    $tu = null;
    include $komponen . '/Hasil.php';
    return $tu;

}
