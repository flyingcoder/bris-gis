<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\User;
use brisgis\BarangayAdmin;
use narutimateum\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show invoice
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('barangayAdmin', 'barangayAdmin.barangay', 'barangayAdmin.barangay.municipality', 'barangayAdmin.barangay.municipality.province')->get();
        
        return view('pages.users.index')->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store Admin a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $password = bcrypt($request->password);
        $inputs = array_merge( (array)$inputs, array( 'password' => $password ) );
        $user = User::create($inputs);

        $capability = $request->capability;
        if($capability != 'Admin')
        {
            $inputs = array_merge( (array)$inputs, array( 'user_id' => $user->id ) );
            BarangayAdmin::create($inputs);
        }
        Toastr::success('Successfully Added!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updates =  $request->all();
        $password = bcrypt($request->password);
        $updates = array_merge( (array)$updates, array( 'password' => $password ) );
        $user = User::find($id);
        $user = $user->update($updates);
        Toastr::info('Successfully Updated!');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Toastr::error('Successfully Remove!');
        return redirect()->route('users.index');
    }
}
