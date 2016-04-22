<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurokBoundary extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purok_boundaries';

    private $id;
    private $purok_id;
    private $shape;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purok_id', 'shape',
    ];



    public function getShapeAttribute(){
        $id =  $this->attributes['id'];
        $wkt = DB::table('purok_boundaries')->find( $id, array(DB::raw('ST_AsText(shape) AS shape')));
        $shape = $wkt->shape;
        return $shape;
     }


    public function purok()
    {
        return $this->belongsTo('brisgis\Purok');
    }
}
