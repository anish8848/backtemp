@extends('backend.layouts.app')

@section('content')

{{ Form::open(['route' =>'page.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
      @include('backend.page.form', ['header' => 'Create a Page'])
      {{ Form::close() }}


@endsection
