<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {

        $usuario = "admin";
        $nombre = "Development";
        $ap_paterno = "junior";
        $ap_materno = "infinity";
        $ci="123343543";
        $password = password_hash("123",PASSWORD_DEFAULT);
        $rol = "admin";

        $dato = [
            'nombre' => $nombre,
            'ap_paterno' => $ap_paterno,
            'ap_materno' => $ap_materno,
            'ci' => $ci,
            'usuario' => $usuario,
            'password' => $password,
            'rol' => $rol
        ];

        $this->db->table('t_usuarios')->insert($dato);
       }
}
