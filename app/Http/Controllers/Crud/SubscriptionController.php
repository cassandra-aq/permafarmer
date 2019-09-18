<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Product;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('subscriptions.create');
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
            (new Subscription())->fill($request->all())->saveOrFail();
        });

        return redirect('subscriptions.index')->with('success', 'L\'abonnement a bien été ajouté.');
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
        return view('subscriptions.edit', compact('subscription'));
    }

    /**
     * @param Request $request
     * @param Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(Request $request, Subscription $subscription)
    {
        $subscription = $subscription->fill($request->all())->saveOrFail();
        return redirect('subscriptions.index')->with('success', 'L\'abonnement a bien été mis à jour.');
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect('subscriptions.index')->with('success', 'L\'abonnement a été supprimé.');
    }

}
