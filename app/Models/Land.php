<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Land extends Model
{
    use SoftDeletes,Auditable;

    public $table = 'land';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [

        'currentUsage',
        'image1',
        'image2',
        'image3',
        'image4',
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
