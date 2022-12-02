<?php

namespace App\Actions\Task;

use App\Models\Task;

class AddTaskAction
{
    public function handle(array $data)
    {
        Task::create($data);
    }
}
