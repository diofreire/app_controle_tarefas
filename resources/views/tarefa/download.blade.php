@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if($error)
                    <div class='alert alert-danger' role='alert'>Algo deu errado. Tente novamente</div>
                @endif

                <div class="card">
                    <div class="card-header">Download da Tarefa</div>
                    <div class="card-body">
                        Tipo de arquivo
                        <form method="post" action="{{route('tarefa.exportacao')}}">
                            @csrf
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="extensao" id="exampleRadios1" value="pdf" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    PDF
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="extensao" id="exampleRadios2" value="xlsx">
                                <label class="form-check-label" for="exampleRadios2">
                                    XLSX
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="extensao" id="exampleRadios3" value="csv">
                                <label class="form-check-label" for="exampleRadios3">
                                    CSV
                                </label>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Download</button>
                            <a href="{{ route('tarefa.index')  }}" type="submit" class="btn btn-primary">Voltar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
