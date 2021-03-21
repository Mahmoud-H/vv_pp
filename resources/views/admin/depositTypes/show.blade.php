@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.depositType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deposit-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.depositType.fields.id') }}
                        </th>
                        <td>
                            {{ $depositType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.depositType.fields.deposit_type_desc') }}
                        </th>
                        <td>
                            {{ $depositType->deposit_type_desc }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deposit-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection