<?php
namespace App\Abstractions;

interface ITasksService {
    public function get();
    public function find(int $id): string;
}

?>
