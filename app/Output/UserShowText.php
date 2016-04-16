<?php

namespace brisgis\Output;

use brisgis\Output\Contracts\UserShowInterface;

class UserShowText implements UserShowInterface 
{
    public function show_all($user)
    {
        return $user;
    }
}