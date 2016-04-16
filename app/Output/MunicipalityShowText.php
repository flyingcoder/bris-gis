<?php

namespace brisgis\Output;

use brisgis\Output\Contracts\MunicipalityShowInterface;

class MunicipalityShowText implements MunicipalityShowInterface
{
	public function show_all($municipality)
	{
		return $municipality;
	}
	
}