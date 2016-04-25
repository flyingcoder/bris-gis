<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'puroks';

    private $id;
    private $name;
    private $barangay_id;
    private $description;
    private $president;
    private $population;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'barangay_id', 'description', 'president', 'population',
    ];

    public function barangay()
    {
        return $this->belongsTo('brisgis\Barangay');
    }

    public function purokBoundaries()
    {
        return $this->hasMany('brisgis\PurokBoundary');
    }

    public function buildings()
    {
        return $this->hasMany('brisgis\Building');
    }
}
