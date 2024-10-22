@extends('layouts.app')
@section('content')
@section('title', 'Gyártók (GET Maker)')

<div>
    <table class="editable">
        <thead>
            <tr>
                <th>#</th>
                <th>Gyártó</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->name}}</td>
                    <!-- <td><img src="{{$entity->logo}}"></td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection