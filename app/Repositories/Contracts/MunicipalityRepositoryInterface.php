<?php

namespace brisgis\Repositories\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Interface MunicipalityRepository
 * @package brisgis\Repositories\Contracts
 */
interface MunicipalityRepositoryInterface 
{
    public function get_all($province_id);

    public function set(Request $request, $province_id);

    public function update(Request $request, $province_id, $municipality_id);

    public function delete($province_id, $municipality_id);

}