<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disasters';

    private $id;
    private $building_id;
    private $type;
    private $year;
    private $value;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id', 'type', 'year', 'value',
    ];

    public function building()
    {
        return $this->belongsTo('brisgis\Building');
    }

}
