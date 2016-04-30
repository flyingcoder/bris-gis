<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'residents';

    private $id;
    private $first_name;
    private $last_name;
    private $middle_name;
    private $birthdate;
    private $gender;
    private $civil_status;
    private $contact_number;
    private $education;
    private $occupation_category;
    private $occupation_specific;
    private $if_voter;
    private $if_disabled;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birthdate',
        'gender',
        'civil_status',
        'contact_number',
        'education',
        'occupation_category',
        'occupation_specific',
        'if_voter',
        'if_disabled',
    ];

    public function familyMember()
    {
    	return $this->hasOne('brisgis\FamilyMember', 'resident_id', 'id');
    }

    public function houdeholdHead()
    {
    	return $this->hasOne('brisgis\HouseholdHead', 'resident_id', 'id');
    }

    public function diseases()
    {
        return $this->hasMany('brisgis\Disease');
    }
    
    public function getAgeAttribute() 
    {
        $birthdate = new \DateTime($this->attributes['birthdate']);
        $date_today   = new \DateTime('today');
       $age = $birthdate->diff($date_today)->y;

        return $age;
    }
}
