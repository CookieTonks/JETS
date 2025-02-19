<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registros_tecnicos extends Model
{
    use HasFactory;
      protected $fillable = [
        'ot', 'tecnico', 'tiempo'];
}
