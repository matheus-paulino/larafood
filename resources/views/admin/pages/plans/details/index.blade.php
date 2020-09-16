@extends('adminlte::page')

@section('title', 'Planos')
    
@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plan.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plan.detail.index', $plan->url) }}">Detalhes</a></li>
    </ol>
       
    <h2 class="btn btn-success"> Detalhes do plano {{ $plan->name}}</h2>
@endsection

@section('content')
    <div class="card">
  
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
                    @foreach ($details as $rowDetail)
                        <tr>
                            <td>
                                {{ $rowDetail->name }}
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
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@endsection