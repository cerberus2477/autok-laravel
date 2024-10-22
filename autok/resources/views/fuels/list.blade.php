@extends('layouts.app')
@section('content')
@section('title', 'Üzemanyag (GET Fuel)')

<div>
    <table class="editable">
        <thead>
            <tr>
                <th>#</th>
                <th>Üzemanyag</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection