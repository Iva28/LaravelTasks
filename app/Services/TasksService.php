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
}

/* class TasksService implements ITasksService {
    private $books;
    public function __construct() {
        $this->books = [
            'CLR via Phalanger',
            'Pro Laravel.NET Core MVC 2',
            'PHP# in deep'
        ];
    }

    public function get(): array {
        return $this->books;
    }
    public function find(int $id): string {
        if (isset($this->books[$id]))
            return $this->books[$id];
        return null;
    }
} */
?>
