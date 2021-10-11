<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Login extends Model implements AuthenticatableContract {
    use Authenticatable;
    protected $primary_key = 'id';
    protected $table = 'users';
}
