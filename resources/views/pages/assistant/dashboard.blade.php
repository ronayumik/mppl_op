@extends('layouts.boxed')

@section('title')
    Dashboard Assistant
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Dashboard Assistant</h1>
    </section>
    <section class="content">
    </section>


@stop
@section('custom_foot')
    <script type="text/javascript">
        $(function(){
        });
    </script>
@stop
