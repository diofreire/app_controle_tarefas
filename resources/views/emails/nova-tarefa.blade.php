@component('mail::message')
# {{ $tarefa }}

Data limite de conclusão: {{ $data_limite_conclusao }}

@component('mail::button', ['url' => $url])
Visualizar tarefa
@endcomponent

Att.,<br>
{{ config('app.name') }}
@endcomponent
