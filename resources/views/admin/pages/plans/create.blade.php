@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <h1>Cadastrar novo plano</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plan.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans.form')
            </form>
        </div>
    </div>
@endsection