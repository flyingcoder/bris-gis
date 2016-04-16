<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    private $id;
    private $purok_id;
    private $name;
    private $year_constructed;
    private $net_value;
    private $usage;
    private $structure;
    private $area;
    private $no_stories;
    private $holding;
    private $if_flooded;
    private $date_flooded;
    private $flood_height;
    private $building_height;
    private $date_entry;
    private $longitude;
    private $latitide;

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
        'usage',
        'structure',
        'area',
        'no_stories',
        'holding',
        'if_flooded',
        'date_flooded',
        'flood_height',
        'building_height',
        'date_entry',
        'longitude',
        'latitide',

    ];
}
