<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    use SoftDeletes;

    protected $table = 'planos';
    protected $primaryKey = 'id';
    protected $fillable = ['nome','mensalidade'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $dates = ['deleted_at'];

    public function clientes() 
    {
        return $this->belongsToMany('App\Models\Cliente','clientes_planos','plano_id', 'cliente_id');
    }
}
