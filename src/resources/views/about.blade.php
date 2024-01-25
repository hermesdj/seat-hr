@extends('web::layouts.grids.12')

@section('title', trans('seat-hr::hr.about_title'))
@section('page_header', trans('seat-hr::hr.about_desc'))

@section('full')
    <div class="card">
        <div class="card-body">
            <h2>{{trans('seat-hr::hr.about_title')}}</h2>
            <p>{{trans('seat-hr::hr.about_desc')}}</p>
            <a href="https://github.com/cryocaustik/seat-hr" class="btn btn-primary">{{trans('seat-hr::hr.github_source')}}</a>
        </div>
    </div>
@stop
