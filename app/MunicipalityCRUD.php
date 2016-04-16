<?php

namespace brisgis;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Repositories\Contracts\MunicipalityRepositoryInterface;
use brisgis\Output\Contracts\MunicipalityShowInterface;


class MunicipalityCRUD 
{
	private $municipality;

	public function getAllMunicipalities(MunicipalityRepositoryInterface $repo, $province_id)
	{
		$this->municipality = $repo->get_all($province_id);
	}

	public function showAllMunicipalities(MunicipalityShowInterface $i)
	{
		return $i->show_all($this->municipality);
	}

    public function createMunicipality(MunicipalityRepositoryInterface $repo, Request $request, $province_id)
    {
        $this->municipality = $repo->set($request, $province_id);
    }

    public function updateMunicipality(MunicipalityRepositoryInterface $repo, Request $request, $province_id, $municipality_id)
    {
        $this->municipality = $repo->update($request, $province_id, $municipality_id);
    }

    public function deleteMunicipality(MunicipalityRepositoryInterface $repo, $province_id, $municipality_id)
    {
        $this->municipality = $repo->delete($province_id, $municipality_id);
    }
}

