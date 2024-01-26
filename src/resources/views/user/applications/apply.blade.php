@extends('seat-hr::user.layouts.view', [ 'viewname' => 'applications' ])

@section('page_header', trans('seat-hr::user.title') . ': ' . trans('seat-hr::user.applications.apply'))

@section('profile_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('seat-hr::user.applications.apply') }}</h3>
        </div>
        @if(isset($corporation))
            <form
                    method="post"
                    action="{{ route('seat-hr.profile.applications.apply', [
                                'character' => $character->character_id,
                                'corporation' => $corporation->id ]) }}"
            >
                @csrf
                <div class="card-body">
                    @if(count($corp_questions) > 0)
                        @foreach($corp_questions as $corp_q)
                            @if(in_array($corp_q->question->type, ['string', 'number']))
                                <div class="form-group">
                                    <label for="{{ $corp_q->question_id }}">{{ $corp_q->question->name }}</label>
                                    <input type="{{ $corp_q->question->type }}" name="id-{{ $corp_q->question_id }}"
                                           id="{{ $corp_q->question_id }}" class="form-control">
                                </div>
                            @elseif($corp_q->question->type == 'boolean')
                                <div class="form-group form-check">
                                    <input type="hidden" value="0" name="id-{{ $corp_q->question_id }}"
                                           class="form-check-input">
                                    <input type="checkbox" value="1" name="id-{{ $corp_q->question_id }}"
                                           id="{{ $corp_q->question_id }}" class="form-check-input">
                                    <label for="{{ $corp_q->question_id }}" class="form-check-label">
                                        {{ $corp_q->question->name }}
                                    </label>
                                </div>
                            @elseif($corp_q->question->type == 'text')
                                <div class="form-group">
                                    <label for="{{ $corp_q->question_id }}">{{ $corp_q->question->name }}</label>
                                    <textarea name="id-{{ $corp_q->question_id }}" id="{{ $corp_q->question_id }}"
                                              class="form-control"></textarea>
                                </div>
                            @elseif($corp_q->question->type == 'date')
                                <div class="form-group">
                                    <label for="{{ $corp_q->question_id }}">{{ $corp_q->question->name }}</label>
                                    <input type="date" name="id-{{ $corp_q->question_id }}"
                                           id="{{ $corp_q->question_id }}" class="form-control">
                                </div>
                            @elseif($corp_q->question->type == 'datetime')
                                <div class="form-group">
                                    <label for="{{ $corp_q->question_id }}">{{ $corp_q->question->name }}</label>
                                    <input type="datetime-local" name="id-{{ $corp_q->question_id }}"
                                           id="{{ $corp_q->question_id }}" class="form-control">
                                </div>
                            @else
                                <label for="{{ $corp_q->question_id }}">{{ $corp_q->question->name }}</label>
                                <span class="text-danger">{{trans('seat-hr::question.unknown_type')}}</span>
                            @endif
                        @endforeach
                    @else
                        <p>{{ trans('seat-hr::corp.no_question_configured', ['name' => $corporation->name])  }} </p>
                    @endif
                </div>
                <div class="card-footer">
                    <button class="btn btn-success btn-block" type="submit">
                        <i class="fas fa-save"></i>
                        {{ trans('seat-hr::hr.submit_btn') }}
                    </button>
                </div>
            </form>
        @else
            <div class="card-body">
                @if(isset($recruiting_corps) && count($recruiting_corps) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ trans('seat-hr::corp.columns.name') }}</th>
                            <th>{{ trans('seat-hr::corp.columns.contact') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recruiting_corps as $corp)
                            <tr>
                                <td>{{ $corp->corporation->name }}</td>
                                <td>{{ $corp->hr_head }}</td>
                                <td>
                                    @if($corp->can_reapply)
                                        <a
                                                href="{{ route('seat-hr.profile.applications.apply', [
                                                    'character' => $character->character_id,
                                                    'corporation' => $corp->id ]) }}"
                                                class="btn btn-success btn-sm">
                                            {{ trans('seat-hr::user.applications.apply_short') }}
                                        </a>
                                    @else
                                        <div class="btn btn-info btn-sm disabled">
                                            {{ trans('seat-hr::user.applications.pending') }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>{{ trans('seat-hr::user.applications.no_corp_recruiting') }}</p>
                @endif
            </div>
        @endif

    </div>

@stop
