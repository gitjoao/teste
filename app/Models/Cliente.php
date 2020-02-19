<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'email', 'contato', 'estado', 'cidade', 'data-nascimento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $dates = ['deleted_at'];

    public function planos()
    {
        return $this->belongsToMany('App\Models\Plano', 'clientes_planos', 'cliente_id', 'plano_id');
    }

    public function verfica_estado($dados, $estado)
    {
        if ($dados['estado'] == $estado) {
            return true;
        } else {
            return false;
        }

    }

    public function verifica_plano($dados, $plano)
    {
        $cont = 0;
        foreach ($dados as $item) {
            if($item['nome'] == $plano) {
                $cont++;
            }
        }

        if($cont == 0){
            return false;
        } else {
            return true;
        }
    }

    public function valida_email($email)
    {
        
    }
}
