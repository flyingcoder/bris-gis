<?php

namespace brisgis\Repositories;

use Illuminate\Http\Request;
use App\Http\Requests;
use brisgis\Barangay;
use brisgis\Repositories\Contracts\BarangayRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class BarangayRepositoryDB
 * @package brisgis\Repositories
 */
class BarangayRepositoryDB implements BarangayRepositoryInterface 
{
    public function get_all() 
    {
    	$barangays = DB::table('barangays')
    		->join('municipalities', 'municipalities.id', '=', 'barangays.municipality_id')
            ->join('provinces', 'provinces.id', '=', 'municipalities.province_id')
            ->select('provinces.name AS province_name', 
            		'municipalities.name AS municipality_name',
            		'barangays.id',
            		'barangays.name')
            ->get();
		//return DB::statement("SELECT provinces.name, provinces.id, municipalities.id, municipalities.name from provinces, municipalities where provinces.id = municipalities.province_id and provinces.id = ".$province_id.";");
		return $barangays;
        //return Barangay::all();
    }

    public function get($id) 
    {
        return Barangay::find($id);
    }

	public function set(Request $request)
	{
		$inputs = $request->all();

		return Barangay::create($inputs);

	}

	public function update(Request $request, $id)
	{
        $updates = $request->all();
        
        $barangay = Barangay::find($id);
        return $barangay->update($updates);

	}

	public function delete($id)
	{
		return Barangay::destroy($id);

	}


}