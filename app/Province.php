<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provinces';

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