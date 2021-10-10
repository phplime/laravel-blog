<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $table = 'posts';
    protected $fillable = ['title','slug','user_id'];
}
