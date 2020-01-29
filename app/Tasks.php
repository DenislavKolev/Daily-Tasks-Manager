<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
         protected $fillable = [
             'user_id', 'text', 'date', 'status'
         ];

         public function scopeGetTasks($query, $user_id){
            return $query -> where('user_id', $user_id)->select('text', 'status');
         }
}
