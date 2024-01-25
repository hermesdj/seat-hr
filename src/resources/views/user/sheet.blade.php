@extends('seat-hr::user.layouts.view', [ 'viewname' => 'sheet' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::hr.sheet'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{trans('seat-hr::user.roles_header')}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{trans('seat-hr::user.role_header')}}</th>
                        <th>{{trans('seat-hr::user.description_header')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seat_hr_user->roles()->get() as $role)
                        <tr>
                            <td>
                                @if($role->logo)
                                    <img src="{{ $role->logo }}" class="img-sm img-fluid">
                                @endif
                                <span class="pl-2">{{ $role->title }}</span>
                            </td>
                            <td>{{ $role->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop

