<?php
namespace App\Services;
use App\Abstractions\ITasksService;
use App\Models\Task;

class TasksService implements ITasksService {

    public function get() {
        return Task::all();
    }
    public function find(int $id): string {
        return Task::find($id);
    }

    public function add($title, $path) {
        Task::create([
            'title' => $title,
            'path' => $path
        ]);
    }

    public function delete($id) {
        Task::find($id)->delete();
    }
}

?>
