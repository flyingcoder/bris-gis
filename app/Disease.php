<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diseases';

    private $id;
    private $resident_id;
    private $type;
    private $year;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'resident_id', 'type', 'year',
    ];

    public function resident()
    {
        return $this->belongsTo('brisgis\Resident');
    }
    
}
