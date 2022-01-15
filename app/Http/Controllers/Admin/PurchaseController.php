<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PurchaseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchase.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchase.create');
    }

    public function edit(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchase.edit', compact('purchase'));
    }

    public function show(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->load('product', 'team');

        return view('admin.purchase.show', compact('purchase'));
    }
}
