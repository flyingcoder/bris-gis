<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'families';

    private $id;
    private $building_id;
    private $family_identifier;
    private $monthly_income;
    private $if_other_livelihood;
    private $livelihood;
    private $if_4ps;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id', 
        'family_identifier', 
        'monthly_income',
        'if_other_livelihood',
        'livelihood',
        'if_4ps',
    ];

    public function building()
    {
        return $this->belongsTo('brisgis\Building');
    }

    public function familyMembers()
    {
        return $this->hasMany('brisgis\FamilyMember', 'family_id', 'id');
    }

}
