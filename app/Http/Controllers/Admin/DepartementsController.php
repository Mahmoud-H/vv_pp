<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepartementRequest;
use App\Http\Requests\StoreDepartementRequest;
use App\Http\Requests\UpdateDepartementRequest;
use App\Models\Departement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartementsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('departement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departements = Departement::all();

        return view('admin.departements.index', compact('departements'));
    }

    public function create()
    {
        abort_if(Gate::denies('departement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departements.create');
    }

    public function store(StoreDepartementRequest $request)
    {
        $departement = Departement::create($request->all());

        return redirect()->route('admin.departements.index');
    }

    public function edit(Departement $departement)
    {
        abort_if(Gate::denies('departement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departements.edit', compact('departement'));
    }

    public function update(UpdateDepartementRequest $request, Departement $departement)
    {
        $departement->update($request->all());

        return redirect()->route('admin.departements.index');
    }

    public function show(Departement $departement)
    {
        abort_if(Gate::denies('departement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.departements.show', compact('departement'));
    }

    public function destroy(Departement $departement)
    {
        abort_if(Gate::denies('departement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departement->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartementRequest $request)
    {
        Departement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
