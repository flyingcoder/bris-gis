<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'municipalities';

    private $id;
    private $province_id;
    private $name;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'name',
    ];

    public function province()
    {
        return $this->belongsTo('brisgis\Province');
    }

    public function barangays()
    {
        return $this->hasMany('brisgis\Barangay');
    }

}
