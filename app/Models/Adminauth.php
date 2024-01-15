<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminauth extends Model
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
  
      protected $table = 'adminauths';
  
      protected $fillable = ['name', 'description',];
      public function users()
      {
          return $this->hasOne(User::class, 'id', 'users_id');
      }
      public function commonareas()
      {
          return $this->hasOne(Commonarea::class, 'id', 'commonareas_id');
      }
}
