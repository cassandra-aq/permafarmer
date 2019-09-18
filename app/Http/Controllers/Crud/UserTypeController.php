<?php

namespace App\Http\Controllers\Crud;

use App\User;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::all();
        return view('userTypes.index', ['userTypes' => $userTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            $userType = (new UserType)->fill($request->all())->saveOrFail();

            return redirect('userTypes.show', ['userType' => $userType])->with('success', 'UserType has been added');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        return view('userTypes.show', compact('userType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit(UserType $userType)
    {
        return view('userTypes.edit', compact('userType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $userType)
    {
        DB::transaction(function () use ($request, $userType) {
            $userType = $userType->fill($request->all())->saveOrFail();

            return redirect('userTypes.show', ['userType' => $userType])->with('success', 'UserType has been updated');
        });
    }

    /**
     * @param UserType $userType
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(UserType $userType)
    {
        $userType->delete();
        return redirect('userTypes.index')->with('success', 'UserType has been deleted successfully');
    }
}
