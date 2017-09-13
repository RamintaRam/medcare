<?php namespace App\Http\Controllers;


use App\Models\MAPosts;
use App\Models\MAUsers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Ramsey\Uuid\Uuid;
use JWTAuth;

class MAPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /maposts
     *
     * @return Response
     */
    public function index()
    {
        $posts = MAPosts::all();
        $response = [
            'posts' => $posts,
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     * GET /maposts/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /maposts
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $post = new MAPosts();

        $user = JWTAuth::parseToken()->toUser();
//        $post->id = Uuid::uuid4();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = $user->id;


        if ($post->save()) {
            return response()->json(['post' => $post], 201);
        } else {
            return response()->json(['error' => 'New post is NOT saved'], 400);
        }


    }

    /**
     * Display the specified resource.
     * GET /maposts/{id}
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
     * GET /maposts/{id}/edit
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
     * PUT /maposts/{id}
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
     * DELETE /maposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}