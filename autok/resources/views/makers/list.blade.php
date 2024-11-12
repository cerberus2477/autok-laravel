@extends('layouts.app')
@section('content')
@section('title', 'Gyártók (GET Maker)')

<div>
    <h3>Ide majd a fuelből kimásolva frissíteni kéne a templatet (pl legyenek gombok)</h3>
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