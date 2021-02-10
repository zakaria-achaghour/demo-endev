<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $attributes = [
        'totalHT' => 0,
        'totalTTC' => 0,
    ];
}
