<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Property extends Model
{
    use SoftDeletes;

    public $table = 'properties';
    protected $casts = [
        'serviceAttached' => 'array'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [

        'accommodation',
        'buildingType',
        'builtUpArea',
        'elevation',
        'roof',
        'pavement',
        'ceiling',
        'doorAndWindows',
        'internal',
        'external',
        'fencelength',
        'securedByGate',
        'serviceAttached',
        'image',
        'earth_id' ,
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function earth()
    {
        return $this->belongsTo(Earth::class, 'earth_id');
    }


}
