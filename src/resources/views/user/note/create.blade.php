@extends('seat-hr::user.layouts.view', [ 'viewname' => 'note' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::user.notes.title'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('seat-hr::user.notes.create.sub-title') }}</h3>
        </div>
        <form action="{{ route('seat-hr.profile.note.create', ['character' => $character]) }}" method="post">
            <div class="card-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="severity">{{ trans('seat-hr::user.notes_severity_header') }}</label>
                        <select name="severity" id="severity" class="form-control"  required>
                            <option value="info">{{ trans('seat-hr::user.severity_level_info') }}</option>
                            <option value="warning">{{ trans('seat-hr::user.severity_level_warning') }}</option>
                            <option value="danger">{{ trans('seat-hr::user.severity_level_danger') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note">{{ trans('seat-hr::user.notes_note_header') }}</label>
                        <textarea name="note" id="note" rows="5" class="form-control"></textarea>
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

