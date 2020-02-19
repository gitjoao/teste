<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nome','email','contato', 'estado','cidade','data-nascimento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $dates = ['deleted_at'];
    
    public function planos() 
    {
        // return $this->belongsToMany('App\Models\Plano');
        return $this->belongsToMany('App\Models\Plano','clientes_planos', 'plano_id', 'cliente_id');
    }
}
