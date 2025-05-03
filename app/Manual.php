<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    //use HasFactory;
    protected $table = "manuals";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'manualName', 'description', 'filePath'];
}
