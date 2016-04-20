<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class FloodMap extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'flood_maps';

    private $id;
    private $barangay_id;
    private $return_period;
    private $shape;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barangay_id', 'return_period', 'shape',
    ];

    public function barangay()
    {
        return $this->belongsTo('brisgis\Barangay');
    }

/*    protected $hidden = array(
        'shape'
    );*/

}
