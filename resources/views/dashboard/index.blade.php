@extends('layout.main')
@include('layout.sidebar')
@section('content')
@foreach($users as $i=>$user)
<div class="card" _vik>
    <div class="card-body" _vik>{{$i}}
        <p _vik>{{$user->email}}</p>
        <p _vik>{{$user->name}}</p>
        <p _vik>{{$user->address}}</p>
        <p _vik>{{$user->dob}}</p>
    </div>
</div>
@endforeach
{{ $users->links('pagination.default') }}
@stop