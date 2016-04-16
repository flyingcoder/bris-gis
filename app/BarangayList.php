<?php

namespace brisgis;

use brisgis\Repositories\Contracts\BarangayRepositoryInterface;
use brisgis\Output\Contracts\BarangayShowInterface;

class BarangayList
{
    private $barangay;

    function __construct(BarangayRepositoryInterface $repo)
    {
        $this->barangay = $repo->get_all();
    }

    public function show_all(BarangayShowInterface $i)
    {
        return $i->show_all($this->barangay);
    }
}
