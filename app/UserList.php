<?php

namespace brisgis;

use brisgis\Output\Contracts\UserShowInterface;
use brisgis\Repositories\Contracts\UserRepositoryInterface;

class UserList
{
    private $user;

    function __construct(UserRepositoryInterface $repo)
    {
        $this->user = $repo->get_all();
    }

    public function show_all(UserShowInterface $i){
        return $i->show_all($this->user);
    }
}
