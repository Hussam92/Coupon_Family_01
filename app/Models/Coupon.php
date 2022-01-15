<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'coupons';

    public $orderable = [
        'id',
        'code',
        'expired_at',
        'redeemed_at',
        'offer.title',
    ];

    public $filterable = [
        'id',
        'code',
        'expired_at',
        'redeemed_at',
        'offer.title',
    ];

    protected $fillable = [
        'code',
        'expired_at',
        'redeemed_at',
        'offer_id',
    ];

    protected $dates = [
        'expired_at',
        'redeemed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getExpiredAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setExpiredAtAttribute($value)
    {
        $this->attributes['expired_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getRedeemedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setRedeemedAtAttribute($value)
    {
        $this->attributes['redeemed_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
