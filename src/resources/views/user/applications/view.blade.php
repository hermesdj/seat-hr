@extends('seat-hr::user.layouts.view', [ 'viewname' => 'applications' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::user.applications.view'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{trans('seat-hr::user.applications.application.title', ['application_id' => $application->id])}}</h3>
        </div>

        <div class="card-text">
            <table class="table">
                <thead>
                <tr>
                    <td>{{trans('seat-hr::user.applications.application.columns.status')}}</td>
                    <td>{{trans('seat-hr::user.applications.application.columns.can_reapply')}}</td>
                    <td>{{trans('seat-hr::user.applications.application.columns.created_at')}}</td>
                    <td>{{trans('seat-hr::user.applications.application.columns.last_updated')}}</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="bg-{{ $application->currentStatus->status->color }}">{{ $application->currentStatus->status->name }}</td>
                    <td class="text-{{ $application->can_reapply == 1 ? 'primary' : 'danger' }}">
                        {{ $application->can_reapply == 1 ? trans('seat-hr::user.applications.reapply.yes') : trans('seat-hr::user.applications.reapply.no') }}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $application->created_at }}">
                        {{ $application->created_at->diffForHumans() }}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $application->updated_at }}">
                        {{ $application->updated_at->diffForHumans() }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{trans('seat-hr::user.applications.answers.title')}}</h3>
        </div>

        <div class="card-text">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>{{trans('seat-hr::user.applications.answers.columns.question')}}</td>
                    <td>{{trans('seat-hr::user.applications.answers.columns.response')}}</td>
                </tr>
                </thead>
                <tbody>

                @foreach($application->answers as $i => $answer)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $answer->question->name }}</td>

                        @if($answer->question->type == 'boolean')
                            <td>{{ $answer->response == 1 ? trans('seat-hr::user.applications.answers.boolean.yes') : trans('seat-hr::user.applications.answers.boolean.no') }}</td>
                        @elseif(in_array($answer->question->type, ['date', 'datetime']))
                            <td>{{ $answer->response }}</td>
                        @else
                            <td>{{ $answer->response }}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
