<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfferController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offer.create');
    }

    public function edit(Offer $offer)
    {
        abort_if(Gate::denies('offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offer.edit', compact('offer'));
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->load('template', 'team');

        return view('admin.offer.show', compact('offer'));
    }
}
