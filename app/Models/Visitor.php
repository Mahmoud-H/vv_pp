<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Visitor extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'visitors';

    protected $dates = [
        'in_date_time',
        'out_date_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'visitor_id_num',
        'visitor_name',
        'mobile_num',
        'office_id',
        'governorate_id',
        'dept_id',
        'in_date_time',
        'out_date_time',
        'deposit_type_id',
        'deposit',
        'deposit_taken',
        'notes',
        'acreated_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function dept()
    {
        return $this->belongsTo(Departement::class, 'dept_id');
    }

    public function getInDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setInDateTimeAttribute($value)
    {
        $this->attributes['in_date_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getOutDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setOutDateTimeAttribute($value)
    {
        $this->attributes['out_date_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function deposit_type()
    {
        return $this->belongsTo(DepositType::class, 'deposit_type_id');
    }

    public function acreated_by()
    {
        return $this->belongsTo(User::class, 'acreated_by_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
