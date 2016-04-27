<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buildings';

    private $id;
    private $purok_id;
    private $name;
    private $year_constructed;
    private $net_value;
    private $building_usage;
    private $structure;
    private $area;
    private $no_stories;
    private $holding;/*
    private $if_flooded;
    private $date_flooded;
    private $flood_height;
    private $building_height;*/
    private $date_entry;
    private $longitude;
    private $latitude;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'purok_id', 
        'name',
        'year_constructed',
        'net_value',
        'building_usage',
        'structure',
        'area',
        'no_stories',
        'holding',
        'date_entry',
        'longitude',
        'latitude',

    ];

    public function purok()
    {
        return $this->belongsTo('brisgis\Purok');
    }

    public function families()
    {
        return $this->hasMany('brisgis\Family');
    }

    public function disasters()
    {
        return $this->hasMany('brisgis\Disaster');
    }

    public function householdHead()
    {
        return $this->hasOne('brisgis\HouseholdHead');
    }

}
