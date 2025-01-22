<?php

namespace App\Http\Controllers;

use App\Models\task as ModelsTask;
use App\Models\User;

use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tasks = ModelsTask::all();

        return view('tasks.index', compact('tasks'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $validatedata= $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'date'=>'required'


        ]);
        ModelsTask::create($validatedata);
        return view('tasks.index')->with('success', 'Task created successfully.');

    }

    /**
     * Display the specified resource.
     */
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task=ModelsTask::find($id);
        return view('tasks.edit', compact('task'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date'=>'required'
        ]);
        $post =ModelsTask::find($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $post = ModelsTask::find($id);
     

     $post->delete();
     return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');

    }
    public function iscomplete(string $id){
        $post = ModelsTask::find($id);
        
    if($post->is_completed=false)
        $post->is_completed=true;
    else
        $post->is_completed=false;
        $post->save();
        return redirect()->route('tasks.index')->with('success', 'Task completed successfully.');
    }
}
