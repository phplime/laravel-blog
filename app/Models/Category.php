<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $primary_key = 'id';
    protected $table = 'categories';
    protected $fillable = ['name','user_id'];
   
}
