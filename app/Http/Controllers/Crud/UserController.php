<?php

namespace App\Http\Controllers\Crud;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('user_admin', ['only' => ['create', 'store', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->paginate(10);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param UserStoreRequest $request
     */
    public function store(UserStoreRequest $request)
    {
        $request = $request->merge([
            'password' => Hash::make($request->get('password')),
            'barcode' => randomBarcode()
        ]);

        DB::transaction(function () use ($request) {
            $user = (new User)->fill($request->all())->saveOrFail();

            return redirect('users.show', ['user' => $user])->with('success', 'User has been added');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $request = $request->merge([
            'password' => Hash::make($request->get('password'))
        ]);

        DB::transaction(function () use ($request, $user) {
            $user = $user->fill($request->all())->saveOrFail();

            return redirect('users.show', ['user' => $user])->with('success', 'User has been updated');
        });
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users.index')->with('success', 'User has been deleted successfully');
    }
}
