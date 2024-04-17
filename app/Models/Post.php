<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //koneksi sesama model
    public function category(){
        return $this->belongsTo(Category::class); 
    }
}