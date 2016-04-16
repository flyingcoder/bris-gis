<?php

namespace brisgis\Output;

use brisgis\Output\Contracts\ProvinceShowInterface;

class ProvinceShowText implements ProvinceShowInterface
{
	public function show_all($province)
	{
		return $province;
	}

	public function show($province)
	{
		return $province;
	}
	
}