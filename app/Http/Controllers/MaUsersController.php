<?php namespace App\Http\Controllers;

use App\Models\MAUsers;
use Illuminate\Routing\Controller;

class MaUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /mausers
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = MAUsers::all();
		//formating data response angular / json
        $response = [
            'users' => $users
        ];
        return response()->json($response, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mausers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mausers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mausers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mausers/{id}/edit
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
	 * PUT /mausers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mausers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}