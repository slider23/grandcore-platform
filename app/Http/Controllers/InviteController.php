<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Model\Invite;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // пока все выведу потом доработаем с пагинацией
        $invites = Invite::all();

        return response()->json([
            'data' => [
                'invites' => $invites
            ],
            'status' => 'success'
        ], 200);
    }

    public function generateInviteCode()
    {
        return response()->json([
            'data' => [
                'invite' => Str::random(10)
            ],
            'status' => 'success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InviteRequest $request
     * @return JsonResponse
     */
    public function store(InviteRequest $request)
    {
        $invite = Invite::create([
            'max_count_register' => $request->input('max_count_register'),
            'invite_symbols' => $request->input('invite_symbols'),
        ]);

        return response()->json([
            'data' => [
                'invite' => $invite
            ],
            'status' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
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
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
