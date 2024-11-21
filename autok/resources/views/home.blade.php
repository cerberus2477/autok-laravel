@extends('layouts.app')

@section('title', 'Autók projekt')

@section('content')
<h1>Autók projekt</h1>
<p>Nyomj az egyik menüpontra.</p>
<strong>A <a href="{{route('fuels.index')}}"> Fuels</a> menüpont működik úgy ahogy. </strong>
@endsection