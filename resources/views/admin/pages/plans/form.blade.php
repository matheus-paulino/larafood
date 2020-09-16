@include('admin.includes.alerts')

<div class="form-group">
    <label for="name" class="col-form-label">Nome do plano</label>
    <input type="text" value="{{ $plan->name ?? old('name') }}" name="name" id="name" class="form-control" placeholder="Nome do plano">
</div>
<div class="form-group">
    <label for="price" class="col-form-label">Preço do plano</label>
    <input type="text" value="{{ $plan->price ?? old('price') }}" name="price" id="price" class="form-control" placeholder="Preço do plano">
</div>
<div class="form-group">
    <label for="description" class="col-form-label">Descrição do plano</label>
    <input type="text" value="{{ $plan->description ?? old('description') }}" name="description" id="description" class="form-control" placeholder="Descrição do Plano">
</div>
<div class="from-group text-center">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>