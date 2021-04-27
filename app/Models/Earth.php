<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Earth extends Model
{
    use SoftDeletes,Auditable, MultiTenantModelTrait;

    public $table = 'earths';

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [

        'inspectionDate',
        'propertyUPI',
        'province',
        'district',
        'sector',
        'cell',
        'village',
        'propertyOwner',
        'tenureType',
        'propertyType',
        'plotSize',
        'encumbranes',
        'mortgaged',
        'servedBy',
        'latitude',
        'longitude',
        'accuracy',
        'status',
        'users_id',
        'value',
        'reportFile',
        'map',
        'comment'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function property()
    {
        return $this->hasMany(Property::class);
    }

    public function land()
    {
        return $this->hasMany(Land::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
