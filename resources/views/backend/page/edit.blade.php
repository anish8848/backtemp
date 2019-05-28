@extends('backend.layouts.app')

@section('title', '')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($page, ['route' =>['page.update', $page->slug],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('backend.page.form', ['header' => 'Edit Page <span class="text-primary">('.str_limit($page->title, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>

@endsection
