<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{

    /**
     * Construtor com metodo auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $tarefas = Tarefa::where('user_id', auth()->user()->id)->paginate(10);
        return view(
            'tarefa.index',
            [
                'tarefas' => $tarefas,
                'request' => $request->all()
            ]);

        /*if(auth()->check()) {
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $email = auth()->user()->email;

            return "ID: $id | Nome: $name | Email: $email";
        } else {
            return "Não está logado";
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        // Envio de Email
//        Mail::to(auth()->user()->email)
//            ->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Tarefa $tarefa
     * @return Application|Factory|View
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tarefa $tarefa
     * @return Application|Factory|View
     */
    public function edit(Tarefa $tarefa)
    {
        if(!($tarefa->user_id == auth()->user()->id)) {
            return view('acesso-negado');
        }

        return view('tarefa.edit',
            [
                'tarefa' => $tarefa
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tarefa $tarefa
     * @return RedirectResponse
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if(!($tarefa->user_id == auth()->user()->id)) {
            return view('acesso-negado');
        }

        $tarefa->update($request->all());
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tarefa $tarefa
     * @return RedirectResponse
     */
    public function destroy(Tarefa $tarefa)
    {
        if(!($tarefa->user_id == auth()->user()->id)) {
            return view('acesso-negado');
        }

        $tarefa->delete();
        return redirect()->route('tarefa.index');
    }
}
