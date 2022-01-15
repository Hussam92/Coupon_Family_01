<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'offers';

    public $filterable = [
        'id',
        'description',
        'title',
        'expired_at',
        'duration_days',
        'template.name',
    ];

    public $orderable = [
        'id',
        'is_active',
        'description',
        'title',
        'expired_at',
        'duration_days',
        'template.name',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'expired_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'is_active',
        'description',
        'title',
        'expired_at',
        'duration_days',
        'template_id',
    ];

    public function getExpiredAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setExpiredAtAttribute($value)
    {
        $this->attributes['expired_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
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
