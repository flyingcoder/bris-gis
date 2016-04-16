<?php

namespace brisgis;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Repositories\Contracts\BarangayRepositoryInterface;
use brisgis\Output\Contracts\BarangayShowInterface;

class BarangayCRUD
{
	private $barangay;

	public function getAllBarangays(BarangayRepositoryInterface $repo)
	{
		$this->barangay = $repo->get_all();
	}

	public function showAllBarangays(BarangayShowInterface $i)
	{
		return $i->show_all($this->barangay);
	}

	public function getBarangay(BarangayRepositoryInterface $repo, $id)
    {
        $this->barangay = $repo->get($id);
    }

    public function showBarangay(BarangayShowInterface $i)
    {
    	return $i->show($this->barangay);
    }

    public function createBarangay(BarangayRepositoryInterface $repo, Request $request)
    {
        $this->barangay = $repo->set($request);
    }

    public function updateBarangay(BarangayRepositoryInterface $repo, Request $request, $id)
    {
        $this->barangay = $repo->update($request, $id);
    }

    public function deleteBarangay(BarangayRepositoryInterface $repo, $id)
    {
        $this->barangay = $repo->delete($id);
    }

}
