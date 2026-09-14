<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $primaryKey = 'notebook_id';
    protected $table= 'notebooks';
    protected $fillable = [
        'name',
        'user_id'
    ];

   public function notes(){
     return $this->hasMany(Note::class);
   }
}
