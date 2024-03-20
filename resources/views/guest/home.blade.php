@extends('layouts.app')

@section('title', 'Home')

@section('content')

<header class="margin-bottom">
    <h1>Progetti di Leonardo</h1>
    <address>Full Stack Web Developer</address>

{{-- Paginazione --}}
@if($projects->hasPages())
  {{$projects->links()}}
@endif

</header>

<section id="guest-home">
    @forelse ($projects as $project)
        <div class="card">            
                <div class="card-header">
                    <strong>Tecnologie: </strong>{{$project->technologies}}
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($project->image)
                        <div class="col-3">
                            <img src="{{$project->image}}" class="card-img-top" alt="{{$project->title}}">
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
    @empty
        <h3 class="text-center">Non ci sono progetti da mostrare</h3>        
    @endforelse
</section>

@endsection