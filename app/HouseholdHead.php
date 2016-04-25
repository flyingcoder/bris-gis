<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class HouseholdHead extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'household_heads';

    private $building_id;
    private $resident_id;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id', 'resident_id',
    ];

    public function building()
    {
        return $this->belongsTo('brisgis\Building');
    }

    public function resident()
    {
        return $this->belongsTo('brisgis\Resident');
    }
    
}
