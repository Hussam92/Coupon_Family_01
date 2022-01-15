<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'newsletters';

    public $orderable = [
        'id',
        'template.name',
        'planned_at',
        'title',
    ];

    public $filterable = [
        'id',
        'template.name',
        'planned_at',
        'title',
    ];

    protected $casts = [
        'is_global_list' => 'boolean',
    ];

    protected $dates = [
        'planned_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'template_id',
        'planned_at',
        'title',
        'is_global_list',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getPlannedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setPlannedAtAttribute($value)
    {
        $this->attributes['planned_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
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
