@extends('adminlte::page')

@section('title', 'Planos')
    
@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="#">Listar</a></li>
    </ol>
       
    <a href="{{ route('plan.create') }}" class="btn btn-success"><i class="far fa-plus-square"></i> Adicionar novo plano</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form form-inline" action="{{ route('plan.search') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="filter" id="filter" placeholder="Pesquise pelo nome do plano" class="form-control">
                    <button type="submit" class="btn btn-dark ml-1">Pesquisar</button>
                </div>
            </form>
        </div>
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
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('plan.show', $plan->url) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" href="{{ route('plan.destroy', $plan->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@endsection