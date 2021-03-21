<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGovernorateRequest;
use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Models\Governorate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GovernoratesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('governorate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $governorates = Governorate::all();

        return view('admin.governorates.index', compact('governorates'));
    }

    public function create()
    {
        abort_if(Gate::denies('governorate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.governorates.create');
    }

    public function store(StoreGovernorateRequest $request)
    {
        $governorate = Governorate::create($request->all());

        return redirect()->route('admin.governorates.index');
    }

    public function edit(Governorate $governorate)
    {
        abort_if(Gate::denies('governorate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.governorates.edit', compact('governorate'));
    }

    public function update(UpdateGovernorateRequest $request, Governorate $governorate)
    {
        $governorate->update($request->all());

        return redirect()->route('admin.governorates.index');
    }

    public function show(Governorate $governorate)
    {
        abort_if(Gate::denies('governorate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.governorates.show', compact('governorate'));
    }

    public function destroy(Governorate $governorate)
    {
        abort_if(Gate::denies('governorate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $governorate->delete();

        return back();
    }

    public function massDestroy(MassDestroyGovernorateRequest $request)
    {
        Governorate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
