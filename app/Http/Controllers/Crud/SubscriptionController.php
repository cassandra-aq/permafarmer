<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Product;
use App\Subscription;
use App\User;
use Carbon\Traits\Date;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::paginate(20);
        return view('subscriptions.index',
            ['subscriptions' => $subscriptions]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('subscriptions.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $subscription = new Subscription();
            $subscription->end_at = now()->addMonths($request->get('duration'));
            $subscription->user()->associate($request->get("user"));
            $subscription->fill($request->all())->saveOrFail();
        });

        return redirect()->route('subscriptions.index')->with('success', 'L\'abonnement a bien été ajouté.');
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Subscription $subscription)
    {
        $users = User::all();
        return view('subscriptions.edit', compact('subscription', 'users'));
    }

    /**
     * @param Request $request
     * @param Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(Request $request, Subscription $subscription)
    {
        DB::transaction(function () use ($request, $subscription) {
            $subscription->fill($request->all())->saveOrFail();
        });
        return redirect()->route('subscriptions.index')->with('success', 'L\'abonnement a bien été mis à jour.');
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'L\'abonnement a été supprimé.');
    }

}
