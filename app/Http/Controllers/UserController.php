<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                ->addColumn('action', function ($data) {
                    $editBtn = '<a href="#" class="btn btn-warning">Edit</a>';
                    $deleteBtn = '<a href="#" class="btn btn-danger">Delete</a>';

                    return '<div class="mx-3">' . $editBtn . $deleteBtn . '</div>';
                })
                ->rawColumns(['name', 'email', 'created_at', 'updated_at', 'action'])
                ->toJson();
        }

        return view('admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        dd($data->toArray());
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
