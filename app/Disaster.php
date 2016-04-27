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
    private $description;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id', 'type', 'year', 'description',
    ];

    public function building()
    {
        return $this->belongsTo('brisgis\Building');
    }

}
