<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'user_id', 'user_pass',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  // protected $hidden = [
  //     'user_pass', 'remember_token',
  // ];
}


?>
