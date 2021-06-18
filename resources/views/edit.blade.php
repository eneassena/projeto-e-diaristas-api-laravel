@extends('app')
@section('title', 'Editar Diarista')
@section('conteudo')
    <h1 class="text-center mt-3">Editar diarista</h1>
    <form action="{{route('diaristas.update', $diarista )}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('_form')
    </form>
@endsection
