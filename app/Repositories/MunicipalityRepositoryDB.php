<?php

namespace brisgis\Repositories;

use brisgis\Municipality;
use Illuminate\Http\Request;
use App\Http\Requests;
use brisgis\Repositories\Contracts\MunicipalityRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class MunicipalityRepositoryDB
 * @package brisgis\Repositories
 */
class MunicipalityRepositoryDB implements MunicipalityRepositoryInterface 
{
	public function get_all($province_id)
	{
		$municipalities = DB::table('municipalities')
            ->join('provinces', 'provinces.id', '=', 'municipalities.province_id')
            ->select('municipalities.id', 'municipalities.name')
            ->where('municipalities.province_id', '=', $province_id)
            ->get();
		//return DB::statement("SELECT provinces.name, provinces.id, municipalities.id, municipalities.name from provinces, municipalities where provinces.id = municipalities.province_id and provinces.id = ".$province_id.";");
		return $municipalities;
	}

	public function set(Request $request, $province_id)
	{
		$municipality = new Municipality;

        $municipality->name = $request->name;
		$municipality->province_id = $province_id;

        return $municipality->save();
	}

	public function update(Request $request, $province_id, $municipality_id)
	{
        $updates = $request->all();
        
        $province = Municipality::find($municipality_id);
        return $province->update($updates);

	}

	public function delete($province_id, $municipality_id)
	{
		return Municipality::destroy($municipality_id);

	}

}