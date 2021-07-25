<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'processor_id',
        'operator_id',
        'specialty_id',
        'registration_id',
        'status_id',
        'description',
        'policy_number',
        'insurance_company',
        'insurance_phone',
        'start',
        'end',
    ];

    /**
     * The operator to this assigment.
     */
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }
}
