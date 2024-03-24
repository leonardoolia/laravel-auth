@extends('layouts.app')

@section('title', 'Project')

@section('content')




<div class="card my-4">            
    <div class="card-header d-flex align-items-center gap-2">
        <strong>Tecnologie: </strong>{{$project->technologies}}        
    </div>
    <div class="card-body">
        <div class="row">
            @if($project->image)
            <div class="col-3">
                <img src="{{asset('storage/'. $project->image)}}" class="card-img-top" alt="{{$project->title}}">
            </div>
            @endif

            <div class="col">
                <h5 class="card-title">{{$project->title}}</h5>
                <h6 class="card-title">{{$project->created_at}}</h6>
                <p class="card-text">{{$project->description}}</p>                            
            </div>
        </div>
    </div>
</div>

<a href="{{route('guest.home')}}" class="btn btn-secondary">Torna indietro</a>

@endsection