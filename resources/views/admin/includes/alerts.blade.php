@if($errors->any())
    @foreach ($errors->all() as $rowError)
        <div class="alert alert-danger">
        <p>{{ $rowError }}</p>
        </div>
    @endforeach
@endif