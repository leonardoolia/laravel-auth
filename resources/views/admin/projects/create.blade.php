@extends('layouts.app')

@section('title', 'Crea progetto')

@section('content')

<header class="my-4 border-bottom">
    <h1>Crea un nuovo progetto</h1>
</header>

<section id="new-project-form">
    @include('includes.projects.form')
</section>

@endsection

@section('scripts')
    @vite('resources/js/image_preview.js')
@endsection