<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'email',
        'address',
        'emergency_contact_name',
        'emergency_contact_phone',
        'allergies',
        'current_medications',
        'facility_name',
        'facility_id',
        'case',
        'notes'
    ];
}
