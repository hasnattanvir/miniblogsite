<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=['created_at','deleted_at','updated_at'];


    public function posts(){
        // onak gulo post thake se tag ta blong kore
        return $this->belongsToMany(Post::class);
    }
}
