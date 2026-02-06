<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgregateDhs2 extends Model
{
    /** @use HasFactory<\Database\Factories\AgregateDhs2Factory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dataSet',
        'completeDate',
        'period',
        'orgUnit',
        'dataValues'
    ];

    protected $casts = [
        'dataValues' => 'json',
    ];
}
