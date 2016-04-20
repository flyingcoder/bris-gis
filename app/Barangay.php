<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'barangays';

    private $id;
    private $name;
    private $municipality_id;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'municipality_id',
    ];

    public function municipality()
    {
        return $this->belongsTo('brisgis\Municipality');
    }

    public function barangayAdmins()
    {
        return $this->hasMany('brisgis\BarangayAdmin');
    }

    public function puroks()
    {
        return $this->hasMany('brisgis\Purok');
    }

    public function floodMaps()
    {
        return $this->hasMany('brisgis\FloodMap');
    }

}
