<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class BarangayAdmin extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'barangay_admins';

    private $user_id;
    private $barangay_id;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'barangay_id',
    ];

    public function barangay()
    {
        return $this->belongsTo('brisgis\Barangay');
    }

    public function user()
    {
        return $this->belongsTo('brisgis\User');
    }

}