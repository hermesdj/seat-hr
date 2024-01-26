@extends('web::layouts.grids.12')

@section('title', trans('seat-hr::corp.create.title'))
@section('page_header', trans('seat-hr::corp.create.title'))

@section('full')
    <div class="card">
        <h5 class="card-header">{{ trans('seat-hr::corp.create.sub-title') }}</h5>
        <form action="{{ route('seat-hr.config.corp.create') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="corporation_id">{{trans('seat-hr::corp.fields.name')}}</label>
                    <select name="corporation_id" id="corporation_id" class="form-control" required>
                        @foreach($available_corps as $corp)
                            <option value="{{ $corp->corporation_id }}">{{ $corp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="hr_head">{{trans('seat-hr::corp.fields.hr_head')}}</label>
                    <input type="text" class="form-control" name="hr_head" required>
                </div>

                <div class="custom-control custom-switch">
                    <input type="hidden" class="custom-control-input" name="has_restricted_questions" value="0">
                    <input type="checkbox" class="custom-control-input" name="has_restricted_questions"
                           id="has_restricted_questions" value="1">
                    <label for="has_restricted_questions"
                           class="custom-control-label">{{trans('seat-hr::corp.fields.has_restricted_questions')}}</label>
                </div>

                <div class="custom-control custom-switch">
                    <input type="hidden" class="custom-control-input" name="accepting_applications" value="0">
                    <input type="checkbox" class="custom-control-input" name="accepting_applications"
                           id="accepting_applications" value="1" checked>
                    <label for="accepting_applications"
                           class="custom-control-label">{{trans('seat-hr::corp.fields.accepting_applications')}}</label>
                </div>

                <div class="form-group">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">{{trans('seat-hr::hr.save_btn')}}</button>
                <a href="{{ route('seat-hr.config.corp.view') }}"
                   class="btn btn-secondary">{{trans('seat-hr::hr.cancel_btn')}}</a>
            </div>
        </form>
    </div>
@stop

@push('javascript')

@endpush
