<?php

namespace brisgis;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    private $id;
    private $first_name;
    private $last_name;
    private $middle_name;
    private $email;
    private $password;
    private $capability;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'capability',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function barangayAdmins()
    {
        return $this->hasMany('brisgis\BarangayAdmin');
    }
    
}
