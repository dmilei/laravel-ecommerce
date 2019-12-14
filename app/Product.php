<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'price', 'image', 'description'
    ];

    public function getRouteKeyName()
    {
      return 'slug';
    }

    /**
     * Delete Post image from storage
     * @return void
     *
     */
    public function deleteImage()
    {
      Storage::delete($this->image);
    }

}
