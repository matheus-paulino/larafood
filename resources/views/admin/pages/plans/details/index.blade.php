@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plan.detail.index', $plan->url) }}">Detalhes</a></li>
</ol>

<h2> Detalhes do plano <span class="text-primary">{{ $plan->name}}</span> <a href="{{ route('plan.detail.create', $plan->url) }}" class="btn btn-success">Adicionar novo detalhe</a></h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>Preço</th>
                    <th width="50">Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $rowDetail)
                <tr>
                    <td>
                        {{ $rowDetail->name }}
                    </td>

                    <td>
                        <a href="{{ route('plan.show', $plan->url) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                        <a href="{{ route('plan.detail.edit', [$plan->url, $rowDetail->id]) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $details->appends($filters)->links() !!}
        @else
        {!! $details->links() !!}
        @endif
    </div>
</div>
@endsection