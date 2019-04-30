<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abstractions\ITasksService;
use App\Models\Task;
use Storage;

class TasksController extends Controller
{
    private $tasksService;
    function __construct(ITasksService $service) {
        $this->tasksService = $service;
    }

    public function index(Request $req) {
        $tasks = $this->tasksService->get();
        return view('index')->with('tasks', $tasks);
    }

    /* public function find($id) {
        $task = $this->tasksService->find($id);
        return view('details')->with('task', $task);
    } */

    public function addFile(){
        return view('addTask');
    }

    public function addFilePost(Request $request){
        $title = $request->input('title');
        if($request->input('taskType') === "fileType") {
            $request->validate([
                'fileToUpload' => 'required|file|mimes:docx,pdf,txt'
            ]);
            // $fileName = basename($request->fileToUpload->getClientOriginalName(), '.'.$fileExt);
            $fileExt = request()->fileToUpload->getClientOriginalExtension();
            $file = $title.'_'.time().'.'.$fileExt;
            $request->fileToUpload->storeAs('tasks', $file);
        } else {
            $text = $request->input('taskText');
            $file = $title.'_'.time().'.txt';
            Storage::put('tasks/'.$file, $text);
        }

        $this->tasksService->add($title, $file);
        return back() ->with('success','You have successfully upload file');
    }

    public function download($id)
    {
        $task = Task::find($id);
        return response()->download(storage_path("app\\tasks\\$task->path"));
    }
}
