@extends('layout.main')
@include('layout.sidebar')
@section('content')
<div class="row" _vik>
@foreach($users as $i=>$user)
<div class="col-sm-6 card" _vik>
        <div class="card-body" _vik>
            <div class="col-sm-12" _vik>{{$user->id}}</div>
            <div class="col-sm-12" _vik>{{$user->name}}</div>
            <div class="col-sm-12" _vik>{{$user->address}}</div>
            <div class="col-sm-12" _vik>{{$user->dob}}</div>
            <div class="col-sm-12" _vik>
                <div class="dropdown" _vik>
                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" _vik>Action</button>
                    <div class="dropdown-menu dropdown-menu-right" _vik>
                        <button type="button" class="btn dropdown-item" _vik><span class="fas fa-pen" _vik>Edit</span></button>
                        <button type="button" class="btn dropdown-item" _vik><span class="fas fa-trash" _vik>Delete</span></button>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach
</div>
{{ $users->links('pagination.default') }}
@stop
<script>
    jQuery('.dropdown-menu button').on('click', function () {
        jQuery('#confirmation').modal('show');
    })
</script>
<div class="modal fade in out" _vik id="confirmation">
    <div _vik class="modal-dialog modal-dialog-centered modal-sm">
        <div _vik class="modal-content">
            <div _vik>
                <button _vik type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div _vik class="modal-body">
                <div class="text-center">
                    <p class="alert alert-danger">Are You sure?</p>
                    <div class="wrapper">
                        <button _vik class="btn fancy-button bg-gradient1" type="button"><span>Yes</span></button>
                        <button _vik class="btn fancy-button bg-gradient2" type="button" data-dismiss="modal"><span>No</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>