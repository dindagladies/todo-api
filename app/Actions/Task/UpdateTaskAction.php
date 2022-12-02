<?php

namespace App\Actions\Task;

use App\Models\Task;

class UpdateTaskAction
{
    public function handle(Task|int $task, array $data)
    {
        $task->update($data);
    }
}
