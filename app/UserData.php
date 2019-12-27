<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'name', 'phone', 'country', 'city', 'zip', 'address',
  ];

  
}
