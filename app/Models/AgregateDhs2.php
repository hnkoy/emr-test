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
        'dataValues',
    ];

    protected $casts = [
        'completeDate' => 'date',
        'dataValues' => 'json',
    ];

    public function getDataValuesAttribute($value)
    {
        // Normalize stored value to an array for UI consumption.
        // Accepts arrays, valid JSON strings, and repeatedly-decode double-encoded JSON.
        if (is_array($value)) {
            return $value;
        }

        if (empty($value)) {
            return [];
        }

        // If it's a JSON-encoded string (possibly double-encoded), try to decode until array or non-string.
        $decoded = $value;
        $maxAttempts = 5;
        $attempt = 0;

        while ($attempt < $maxAttempts) {
            if (is_string($decoded)) {
                $next = json_decode($decoded, true);
                // If json_decode returns null and decoded string isn't 'null', stop
                if ($next === null && $decoded !== 'null') {
                    break;
                }

                $decoded = $next;
                $attempt++;
                continue;
            }

            break;
        }

        if (is_array($decoded)) {
            return $decoded;
        }

        return [];
    }
}
