<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musicboard extends Model
{
  protected $fillable = [
    'file_name', 'user_id', 'good_count', 'hits'

  ];
}
