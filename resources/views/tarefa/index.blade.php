@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tarefas
                        <a class="float-right" href="{{ route('tarefa.create') }}" data-bs-toggle="tooltip" title="Adicionar nova">
                            <i class="bi-file-plus-fill" style="font-size: 1.5rem;"></i>
                        </a>
                        <a class="float-right mr-3" href="{{ route('tarefa.download') }}" data-bs-toggle="tooltip" title="Exportar Tarefas">
                            <i class="bi-cloud-arrow-down-fill" style="font-size: 1.5rem;"></i>
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
