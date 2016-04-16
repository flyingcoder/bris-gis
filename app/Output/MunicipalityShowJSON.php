<?php

namespace brisgis\Output;

use brisgis\Output\Contracts\MunicipalityShowInterface;
use Illuminate\Support\Facades\Response;

class MunicipalityShowJSON implements MunicipalityShowInterface
{
	public function show_all($municipality)
	{        
		$outputs = array();

        foreach ($municipality as $m) 
        {
            $outputs += array($m->id => $m->name);
        }
        return Response::json($outputs);
	}
	
}