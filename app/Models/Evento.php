<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Commonarea;
use App\Models\Statu;
use App\Models\Adminauth;
class Evento extends Model
{
    use HasFactory;

    static $rules= [
        'users_id' => 'required',
        'title'=> 'required',
        'descripcion'=> 'required',
        'start' => 'required',
        'end' => 'required',
        'commonareas_id' => 'required',     
      ];
  
      public $timestamps = true;
  
      protected $table = 'eventos';
  
      protected $fillable = ['commonareas_id', 'users_id','title','descripcion','start','end'];
      public function users()
      {
          return $this->hasOne(User::class, 'id', 'users_id');
      }
      public function commonareas()
      {
          return $this->hasOne(Commonarea::class, 'id', 'commonareas_id');
      }
      public function status()
      {
          return $this->hasOne(Statu::class, 'id', 'status_id');
      }
      public function adminauths()
      {
          return $this->hasOne(Adminauth::class, 'id', 'adminauths_id');
      }
}

