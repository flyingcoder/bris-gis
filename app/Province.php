<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    private $id;
    private $name;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function municipalities()
    {
        return $this->hasMany('brisgis\Municipality');
    }

}
