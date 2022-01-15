<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsletterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newsletter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletter.index');
    }

    public function create()
    {
        abort_if(Gate::denies('newsletter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletter.create');
    }

    public function edit(Newsletter $newsletter)
    {
        abort_if(Gate::denies('newsletter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletter.edit', compact('newsletter'));
    }

    public function show(Newsletter $newsletter)
    {
        abort_if(Gate::denies('newsletter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletter->load('template', 'team');

        return view('admin.newsletter.show', compact('newsletter'));
    }
}
