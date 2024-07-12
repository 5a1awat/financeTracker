<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Services\AccountService;
use App\Services\BalanceCalculation;

class AccountController extends Controller
{
    public function __construct(
        private readonly AccountService $service,
        private readonly BalanceCalculation $balanceCalculation
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountsWithBalance = $this->service->getAllWithBalance();
        $totalBalance = $this->balanceCalculation->getTotalBalance();
        $defaultCurrency = config('currency.default');;

        return view('accounts.index', compact('accountsWithBalance', 'totalBalance', 'defaultCurrency'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = $this->service->getAllTypes();
        $currencies = $this->service->getAllCurrencies();

        return view('accounts.create', compact('types', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $this->service->create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $types = $this->service->getAllTypes();
        $currencies = $this->service->getAllCurrencies();

        return view('accounts.edit', compact('account', 'types', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $this->service->update($account->id, $request->all());
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
