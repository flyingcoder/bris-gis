<?php

namespace brisgis\Output;

use brisgis\Output\Contracts\BarangayShowInterface;

class BarangayShowText implements BarangayShowInterface 
{
    public function show_all($barangay)
    {
        return $barangay;
    }

    public function show($barangay)
    {
        return $barangay;
    }
    
}