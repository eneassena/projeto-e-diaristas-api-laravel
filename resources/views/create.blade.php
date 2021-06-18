@extends('app')
@section('title', 'Criar Diarista')
@section('conteudo')
    <h1 class="text-center">Criar nova diarista</h1>
    <form action="{{route('diaristas.store')}}" method="post" enctype="multipart/form-data">
        @include('_form')
    </form>
@endsection
