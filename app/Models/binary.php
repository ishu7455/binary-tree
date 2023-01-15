<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binary extends Model
{
    use HasFactory;
    protected $table = "binaries";
    protected $primarykey = "id";
}
