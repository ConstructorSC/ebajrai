<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = "shop";
    protected $fillable = ['desc','monThu','friday','saturday','location','phoneNum','fax'];
}