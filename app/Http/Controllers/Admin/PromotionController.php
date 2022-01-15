<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promotion.index');
    }

    public function create()
    {
        abort_if(Gate::denies('promotion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promotion.create');
    }

    public function edit(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promotion.edit', compact('promotion'));
    }

    public function show(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotion->load('template', 'team');

        return view('admin.promotion.show', compact('promotion'));
    }
}
