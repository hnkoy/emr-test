<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataValues extends Model
{
    /** @use HasFactory<\Database\Factories\DataValuesFactory> */
    use HasFactory;

    protected $fillable = [
        'agregate_dhs2_id',
        'dataElement',
        'value',
    ];

    public function agregateDhs2()
    {
        return $this->belongsTo(AgregateDhs2::class, 'agregate_dhs2_id');
    }
}
