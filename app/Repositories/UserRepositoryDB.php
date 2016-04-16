<?php

namespace brisgis\Repositories;

use brisgis\User;
use brisgis\Repositories\Contracts\UserRepositoryInterface;

/**
 * Class UserRepositoryDB
 * @package brisgis\Repositories
 */
class UserRepositoryDB implements UserRepositoryInterface 
{
    public function get_all() 
    {
        return User::all();
    }
    
}