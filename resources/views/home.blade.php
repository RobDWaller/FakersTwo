@extends('master')

@section('title', 'Home')

@section('content')
<form method="post" action="{{url('/authenticate')}}">
    {{ csrf_field() }}
    <fieldset>
        <input name="connect" type="submit" value="Connect to Twitter" id="connect" />
    </fieldset>
</form>
@endsection
