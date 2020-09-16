@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano <b class="text-primary">{{ $plan->name }}</b></h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    Nome: <strong>{{ $plan->name }}</strong>
                </li>
                <li>
                    URL: <strong>{{ $plan->url }}</strong>
                </li>
                <li>
                    Preço: <strong> R$ {{ number_format($plan->price, 2, ',', '.') }}</strong>
                </li>
                <li>
                    Descrição: <strong>{{ $plan->decription }}</strong>
                </li>
            </ul>
        </div>
    </div>
@endsection