<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'family_members';

    private $family_id;
    private $resident_id;
    private $relation_head;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_id', 'resident_id', 'relation_head',
    ];

    public function family()
    {
        return $this->belongsTo('brisgis\Family', 'family_id', 'id');
    }

    public function resident()
    {
        return $this->belongsTo('brisgis\Resident', 'resident_id', 'id');
    }
    
}
