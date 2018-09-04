@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Campagins
                </div>
                <div class="card-body">
                    <a class="btn btn-primary btn-lg btn-block" href="{{url('/campaigns/create')}}">+ New Campaign</a>
                    <hr>
                    <ul class="list-group">
                        @foreach ($campaigns as $campaign)
                            <li class="list-group-item">{{$campaign->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
