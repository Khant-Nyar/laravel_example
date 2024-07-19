<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->ajax()) {
            return datatables()->of($users)
                ->editColumn("name", function ($data) {
                    return Str::limit($data->name, 6, '###');
                })
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return Carbon::parse($data->updated_at);
                })
                ->rawColumns(['name', 'email', 'created_at', 'updated_at'])
                ->toJson();
        }

        return view('admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
