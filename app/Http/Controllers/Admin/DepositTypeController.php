<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepositTypeRequest;
use App\Http\Requests\StoreDepositTypeRequest;
use App\Http\Requests\UpdateDepositTypeRequest;
use App\Models\DepositType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deposit_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositTypes = DepositType::all();

        return view('admin.depositTypes.index', compact('depositTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('deposit_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.depositTypes.create');
    }

    public function store(StoreDepositTypeRequest $request)
    {
        $depositType = DepositType::create($request->all());

        return redirect()->route('admin.deposit-types.index');
    }

    public function edit(DepositType $depositType)
    {
        abort_if(Gate::denies('deposit_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.depositTypes.edit', compact('depositType'));
    }

    public function update(UpdateDepositTypeRequest $request, DepositType $depositType)
    {
        $depositType->update($request->all());

        return redirect()->route('admin.deposit-types.index');
    }

    public function show(DepositType $depositType)
    {
        abort_if(Gate::denies('deposit_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.depositTypes.show', compact('depositType'));
    }

    public function destroy(DepositType $depositType)
    {
        abort_if(Gate::denies('deposit_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepositTypeRequest $request)
    {
        DepositType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
