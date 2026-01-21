<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MasterSetting extends Model
{
    use HasFactory;

     protected $table = 'token_collections';

    protected $fillable = ['token_limit'];
}
