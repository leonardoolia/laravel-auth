@extends('layouts.app')

@section('title', 'Crea progetto')

@section('content')

<header class="my-4 border-bottom">
    <h1>Crea un nuovo progetto</h1>
</header>

<section id="new-project-form">
    <form action="{{route('admin.projects.store')}}" method="POST" novalidate>
        @csrf

        <div class="row">
            {{-- Title --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titolo..." value="{{old('title', '')}}" required>
                </div>
            </div>

            {{-- Technologies --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="technologies" class="form-label">Tecnologie utilizzate</label>
                    <input type="text" name="technologies" class="form-control" id="technologies" placeholder="HTML, CSS..."  value="{{old('technologies', '')}}" required>
                </div>
            </div>

            {{-- Description --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione del progetto</label>
                    <textarea class="form-control" name="description" id="description" rows="15">{{old('description', '')}}</textarea>
                </div>
            </div>

            {{-- Url --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="url" class="form-label">Indirizzo al progetto</label>
                    <input type="url" name="url" class="form-control" id="url" placeholder="https..."  value="{{old('url', '')}}">
                </div>
            </div>

            {{-- Image --}}
            <div class="col-5">
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="url" name="image" class="form-control" id="image" placeholder="https...">
                </div>
            </div>

            {{-- Preview immagine --}}
            <div class="col-1">
                <img src="{{old('image','https://marcolanci.it/boolean/assets/placeholder.png')}}" alt="immagine post" id="preview" class="img-fluid">
            </div>

            {{-- Start date --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="start_date" class="form-label">Data di inizio</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" placeholder="20-03-2024"  value="{{old('start_date', '')}}">
                </div>
            </div>

            {{-- End date --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="end_date" class="form-label">Data di fine</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" placeholder="20-03-2024"  value="{{old('end_date', '')}}">
                </div>
            </div>

            {{-- Status --}}
            <div class="col-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select form-select-md" id="status" name="status">                    
                    <option value="Completato" @if(old('status')==='Completato') selected @endif>Completato</option>
                    <option value="In corso" @if(old('status')==='In corso') selected @endif>In corso</option>
                    <option value="Cancellato" @if(old('status')==='Cancellato') selected @endif>Cancellato</option>
                </select>
            </div>

        </div>

        {{-- Pulsanti --}}
        <div class="d-flex align-items-center justify-content-between my-4">
            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Torna indietro</a>

            <div class="d-flex align-items-center justify-content-between gap-2">
                <button type="reset" class="btn btn-danger"><i class="fas fa-eraser me-2"></i>Svuota i campi</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
            </div>
        </div>
    </form>
</section>

@endsection

@section('scripts')
    <script>

        // Preview dell'immagine nel form per aggiungere un nuovo progetto

        const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');

        input.addEventListener('input', () => {
            preview.src = input.value ? input.value : placeholder;
        })

    </script>
@endsection