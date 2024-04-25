@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tarefas
                        <a class="float-right" href="{{ route('tarefa.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Título</th>
                                <th scope="col">Data Conclusão</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tarefas as $key => $t)
                                <tr>
                                    <td>{{ $t['id'] }}</td>
                                    <td>{{ $t['tarefa'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($t['data_limite_conclusao'])) }}</td>
                                    <td>
                                        <a href="{{ route('tarefa.edit', ['tarefa' => $t['id']]) }}" data-bs-toggle="tooltip" title="Editar" >
                                            <i class="bi-pencil-fill"></i>
                                        </a>
                                    <td>
                                        <form id='form_{{$t['id']}}' action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$t['id']}}').submit()" data-bs-toggle="tooltip" title="Excluir">
                                                <i class="bi-trash-fill"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Anterior</a></li>
                                @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Próximo</a></li>
                            </ul>
                        </nav>
                        Exibindo {{ $tarefas->count() }} tarefas de {{ $tarefas->total() }} de {{ $tarefas->firstItem() }} a {{ $tarefas->lastItem() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
