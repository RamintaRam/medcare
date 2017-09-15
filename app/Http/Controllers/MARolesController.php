<?php namespace App\Http\Controllers;

use App\Models\MARoles;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class MARolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /maroles
	 *
	 * @return Response
	 */
	public function index()
	{
        $roles = MARoles::all();
        $response = [
            'roles' => $roles
        ];

        return response()->json($response, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /maroles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /maroles
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $role = new MARoles();
        $role->id = Uuid::uuid4();
        $role->name = $request->name;

        if($role->save()){
            return response()->json(['role' => $role], 201);
        } else {
            return response()->json(['error' => 'New role is NOT saved'], 400);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /maroles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $role = MARoles::find($id);

        if($role) {
            return response()->json(['role' => $role], 200);
        }else{
            return response()->json(['error'=>'Role is not found'], 400);
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /maroles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /maroles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $role = MARoles::find($id);

        $role->name = $request->name;


        if($role->save()){
            return response()->json(['success' => $role], 201);
        } else {
            return response()->json(['error' => 'Role is NOT updated'], 401);
        }


    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /maroles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}