<?php

namespace brisgis\Output\Contracts;

interface ProvinceShowInterface
{
	public function show_all($province);

	public function show($province);
}