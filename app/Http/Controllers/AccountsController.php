<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $accounts = DB::table('accounts')->get();
        $page_title = 'Accounts';
        $accounts = Account::all();

        return view('accounts.index', compact('accounts', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Account';

        return view('accounts.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'type'     => 'required',
            'currency' => 'required',
        ]);

        Account::create([
            'name'     => request('name'),
            'type'     => request('type'),
            'currency' => request('currency'),
            'user_id'  => auth()->id(),
        ]);

        return redirect('/accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param Account $account
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        // $account = DB::table('accounts')->find($id);

        $page_title = 'Account Details';

        return view('accounts.show', compact('account', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
