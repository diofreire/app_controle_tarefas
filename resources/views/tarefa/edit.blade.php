@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Tarefa</div>

                    <div class="card-body">
                        <form action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">

                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}<br>



                                <label class="form-label">Tarefa</label>
                                <input type="text" name="tarefa" value="{{ $tarefa->tarefa ?? old('tarefa') }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data limite conclusão</label>
                                <input type="date" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao ?? old('data_limite_conclusao') }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
