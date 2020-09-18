@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.detail.index', $plan->url) }}">Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plan.detail.create', $plan->url) }}">Adicionar novo</a></li>
</ol>

<h2> Adicionar novo detalhe do plano <span class="text-primary">{{ $detail->name}}</span> </h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plan.detail.store', $plan->url)}}" method="POST" class="form">
            @include('admin.pages.plans.details.__partials.form')
        </form>
    </div>
</div>
@endsection