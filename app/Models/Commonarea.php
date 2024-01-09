<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commonarea extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'commonareas';

    protected $fillable = ['name','description','capacity'];
    public function empleados()
    {
        return $this->hasOne(User::class, 'id', 'empleados_id');
    }
}
