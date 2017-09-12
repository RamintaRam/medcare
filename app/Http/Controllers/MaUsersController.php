<?php namespace App\Http\Controllers;

use App\Models\MAUsers;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;


class MaUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /mausers
     *
     * @return Response
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->toUser();
        // when we are certain that the user is connected
        $users = MAUsers::all();
        // formating data to response angular/json
        $response = [
            'users' => $users,
            'user' => $user,
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
    public function store(Request $request)
    {

        $user = new MAUsers();
        $user->id = Uuid::uuid4();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->remember_token = 0;
        $user->position = $request->position;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);


       if($user->save()){
           return response()->json(['user' => $user], 201);
       } else {
           return response()->json(['error' => 'New user is NOT saved'], 400);
       }


    }

    /**
     * Display the specified resource.
     * GET /mausers/{id}
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        MAUsers::find($id)->delete();
        return response()->json(['success'=> 'user deleted successfully'], 200);
    }


    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        //        dd($credentials);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials!'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token!'], 500);
        }
        return response()->json(['token' => $token], 200);
    }

}