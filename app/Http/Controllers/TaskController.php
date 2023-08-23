<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Backtrace\Arguments\ReduceArgumentsAction;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index')->with(compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulesValidator = [
            'nome' => 'required',
            'status' => 'required'
        ];

        $messagesValidator = [
            'nome.required' => 'O campo nome é um campo obrigatório.',
            'status.required' => 'O campo status deve ser preenchido.'
        ];

        $validator = Validator::make($request->all(), $rulesValidator, $messagesValidator);

        if ($validator->fails()) {
            return redirect('/tasks/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $name = $request->input('nome');
        $status = $request->input('status');

        if ($name && $status) {
            $task = new Task();
            $task->name = $name;
            $task->status = $status;
            
            $task->save();

            return redirect('/')->with('msg', [
                'msg' => 'Task inserida com sucesso!',
                'action' => 'success'
            ]);
        }

        return redirect('/')->with('msg', [
            'msg' => 'Task não inserida!',
            'action' => 'danger'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('nome');
        $status = $request->input('status');

        Task::findOrFail($id)->update([
            'name' => $name,
            'status' => $status
        ]);
        return redirect('/')->with('msg', [
            'msg' => 'Task atualizada com sucesso!',
            'action' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        
        return redirect('/')->with('msg', [
            'msg' => 'Task deletada com sucesso',
            'action' => 'success'
        ]);
    }
}
