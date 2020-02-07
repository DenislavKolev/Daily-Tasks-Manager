<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
         protected $fillable = [
             'user_id', 'text', 'date', 'status'
         ];

         public function scopeRemoveTask($query, $id){
             return $query->where('id', $id)->select();
         }

         public function scopeGetTasks($query, $user_id, $date){
            return $query -> where([
                'user_id' => $user_id,
                'date' => $date,
            ])->select('id', 'text', 'status');
         }

         public function scopeUpdateTask($query, $id){
             return $query->where('id', $id)->select('status');
         }
}
