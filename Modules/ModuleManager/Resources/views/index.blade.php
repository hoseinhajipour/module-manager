@extends('voyager::master')

@section('page_title', 'pressta')

@section('page_header')

@stop

@section('content')

    <div class="page-content browse container-fluid" align="left">
        <form action="{{route('module.upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="btn btn-primary">upload</button>
        </form>
        @foreach($Modules_ as $Module)
            <b> {{$Module['name']}}</b>
            <form action="{{route('toggle.module.enabled')}}" method="POST">
                <input type="hidden" name="name" value="{{$Module['name']}}">
                @csrf

                @if($Module['active'])
                    <button type="submit" class="btn btn-primary">
                        <b> enabled</b>
                    </button>
                @else
                    <button type="submit" class="btn btn-dark">
                        <b> disabled</b>
                    </button>
                @endif

            </form>
            <hr/>
        @endforeach
    </div>
@stop

@section('css')

@stop

@section('javascript')

@stop
