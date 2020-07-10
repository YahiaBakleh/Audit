<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

         public function career()
          {
            return $this->belongsTo('App\Models\Section' , 'career_id');
          }
}
