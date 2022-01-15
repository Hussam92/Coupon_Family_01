<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.template.index');
    }

    public function create()
    {
        abort_if(Gate::denies('template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.template.create');
    }

    public function edit(Template $template)
    {
        abort_if(Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.template.edit', compact('template'));
    }

    public function show(Template $template)
    {
        abort_if(Gate::denies('template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template->load('team');

        return view('admin.template.show', compact('template'));
    }
}
