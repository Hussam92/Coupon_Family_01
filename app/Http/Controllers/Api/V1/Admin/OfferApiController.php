<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Resources\Admin\OfferResource;
use App\Models\Offer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfferApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferResource(Offer::with(['template', 'team'])->get());
    }

    public function store(StoreOfferRequest $request)
    {
        $offer = Offer::create($request->validated());

        return (new OfferResource($offer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferResource($offer->load(['template', 'team']));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->validated());

        return (new OfferResource($offer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
