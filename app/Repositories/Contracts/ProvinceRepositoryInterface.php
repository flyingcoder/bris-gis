<?php

namespace brisgis\Repositories\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Interface ProvinceRepository
 * @package brisgis\Repositories\Contracts
 */
interface ProvinceRepositoryInterface 
{
    public function get_all();

    public function get($id);

    public function get_municipalities($id);

    public function set(Request $request);

    public function update(Request $request, $id);

    public function delete($id);

}