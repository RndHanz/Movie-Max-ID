<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    // table name matches migration 'signups' so default is fine
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public $timestamps = false;
}
