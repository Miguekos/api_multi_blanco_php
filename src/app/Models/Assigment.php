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
        'customer',
        'processor',
        'specialty',
        'description',
        'comment',
        'address',
        'policy_number',
        'insurance_company',
        'insurance_phone',
        'date',
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


    public function setCustomerAttribute($value)
    {
        $this->attributes['customer'] = strtolower($value);
    }

    public function getCustomerAttribute($value)
    {
        return ucwords($value);
    }

    public function setProcessorAttribute($value)
    {
        $this->attributes['processor'] = strtolower($value);
    }

    public function getProcessorAttribute($value)
    {
        return ucwords($value);
    }

    public function setSpecialtyAttribute($value)
    {
        $this->attributes['specialty'] = strtolower($value);
    }

    public function getSpecialtyAttribute($value)
    {
        return ucfirst($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtolower($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = strtolower($value);
    }

    public function getCommentAttribute($value)
    {
        return ucfirst($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtolower($value);
    }

    public function getAddressAttribute($value)
    {
        return ucwords($value);
    }

    public function setStartAttribute($value)
    {
        $start = new Carbon($value);
        $this->attributes['start'] = $start->format("Y-m-d H:i:s");
    }

    public function getStartAttribute($value)
    {
        $start = new Carbon($value);
        return $start->toRfc7231String();
    }

    public function setEndAttribute($value)
    {
        $end = new Carbon($value);
        $this->attributes['end'] = $end->format("Y-m-d H:i:s");
    }

    public function getEndAttribute($value)
    {
        $end = new Carbon($value);
        return $end->toRfc7231String();
    }
}
