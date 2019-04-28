<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTax extends Model
{
    protected $table = 'user_tax';
    protected $fillable = ['content'];
}
