<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentcategory extends Model
{
    use HasFactory;
    protected $table="parentcategory";
    protected $primaryKey="parentid";
}
