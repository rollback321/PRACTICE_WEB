<?php 
namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model{
    protected $table      = 't_usuarios';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';


    public function obtener_usuarios($data){
        $usuario = $this->db->table('t_usuarios');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
}