<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = "claims";
    protected $primaryKey = 'id';
    protected $fillable = ['author', 'content'];

}
