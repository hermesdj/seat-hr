@extends('seat-hr::user.layouts.view', [ 'viewname' => 'kickhistory' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::user.kick_history.title'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('seat-hr::user.kick_history.create.sub-title') }}</h3>
        </div>
        <form action="{{ route('seat-hr.profile.kickhistory.create', ['character' => $character]) }}" method="post">
            <div class="card-body">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="kicked_by">{{ trans('seat-hr::user.kick_history.columns.kicked_by') }}</label>
                    <input type="text" name="kicked_by" id="kicked_by" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kicked_at">{{ trans('seat-hr::user.kick_history.columns.kicked_at') }}</label>
                    <input type="date" name="kicked_at" id="kicked_at" class="form-control">
                </div>

                <div class="form-group">
                    <label for="reason">{{ trans('seat-hr::user.kick_history.columns.reason') }}</label>
                    <textarea name="reason" id="reason" rows="5" class="form-control"></textarea>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success btn-block" type="submit">
                    <i class="fas fa-save"></i>
                    {{ trans('seat-hr::hr.submit_btn') }}
                </button>
            </div>
        </form>

    </div>
@stop

