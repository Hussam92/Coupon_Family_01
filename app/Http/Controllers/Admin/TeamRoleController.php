<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamRole;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamRoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team-role.index');
    }

    public function create()
    {
        abort_if(Gate::denies('team_role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team-role.create');
    }

    public function edit(TeamRole $teamRole)
    {
        abort_if(Gate::denies('team_role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team-role.edit', compact('teamRole'));
    }

    public function show(TeamRole $teamRole)
    {
        abort_if(Gate::denies('team_role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamRole->load('permissions', 'team');

        return view('admin.team-role.show', compact('teamRole'));
    }
}
