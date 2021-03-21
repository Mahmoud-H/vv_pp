@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.visitor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.id') }}
                        </th>
                        <td>
                            {{ $visitor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.visitor_id_num') }}
                        </th>
                        <td>
                            {{ $visitor->visitor_id_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.visitor_name') }}
                        </th>
                        <td>
                            {{ $visitor->visitor_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.mobile_num') }}
                        </th>
                        <td>
                            {{ $visitor->mobile_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.office') }}
                        </th>
                        <td>
                            {{ $visitor->office->office_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.governorate') }}
                        </th>
                        <td>
                            {{ $visitor->governorate->governorate_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.dept') }}
                        </th>
                        <td>
                            {{ $visitor->dept->dept_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.in_date_time') }}
                        </th>
                        <td>
                            {{ $visitor->in_date_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.out_date_time') }}
                        </th>
                        <td>
                            {{ $visitor->out_date_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.deposit_type') }}
                        </th>
                        <td>
                            {{ $visitor->deposit_type->deposit_type_desc ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.deposit') }}
                        </th>
                        <td>
                            {{ $visitor->deposit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.deposit_taken') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $visitor->deposit_taken ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.notes') }}
                        </th>
                        <td>
                            {{ $visitor->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.acreated_by') }}
                        </th>
                        <td>
                            {{ $visitor->acreated_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection