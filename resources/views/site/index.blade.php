@extends('layouts/master')

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.vision')
    @include('sections.message')
    @include('sections.values')
    {{--@include('sections.projects')--}}
    @include('sections.team')
    @include('sections.contact')
    @include('sections.contactform')
@endsection