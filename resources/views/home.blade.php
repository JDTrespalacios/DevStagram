@extends('layouts.app')

@section('titulo')
    Main Page
@endsection

@section('contenido')
    <x-list-post :posts="$posts"/>
@endsection