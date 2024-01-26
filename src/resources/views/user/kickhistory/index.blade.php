@extends('seat-hr::user.layouts.view', [ 'viewname' => 'kickhistory' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::user.kick_history.title'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('seat-hr::user.kick_history.title') }}</h3>
            <a href="{{ route('seat-hr.profile.kickhistory.create', ['character' => $character]) }}"
               class="btn btn-sm btn-primary float-right">
                <i class="fas fa-plus"></i>
                {{ trans('seat-hr::hr.add_btn') }}
            </a>
        </div>
        <div class="card-text">
            <table class="table">
                <thead>
                <tr>
                    <td>{{ trans('seat-hr::user.kick_history.columns.id') }}</td>
                    <td>{{ trans('seat-hr::user.kick_history.columns.kicked_by') }}</td>
                    <td>{{ trans('seat-hr::user.kick_history.columns.kicked_at') }}</td>
                    <td>{{ trans('seat-hr::user.kick_history.columns.reason') }}</td>
                    <td>{{ trans('seat-hr::hr.created_by_header') }}</td>
                    <td>{{ trans('seat-hr::hr.created_at_header') }}</td>
                    <td>{{ trans('seat-hr::hr.updated_at_header') }}</td>
                    <td>{{ trans('seat-hr::hr.actions_header') }}</td>
                </tr>
                </thead>
                <tbody>
                @foreach($seat_hr_user->kickhistory as $kick)
                    <tr>
                        <td>{{ $kick->id }}</td>
                        <td>{{ $kick->kicked_by }}</td>
                        <td>{{ $kick->kicked_at }}</td>
                        <td style="white-space: pre-wrap;">{{ $kick->reason }}</td>
                        <td>{{ $kick->creator->name }}</td>
                        <td>{{ $kick->created_at }}</td>
                        <td>{{ $kick->updated_at }}</td>
                        <td>@include('seat-hr::user.kickhistory.partials.actions')</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

