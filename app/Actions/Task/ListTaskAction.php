<?php

namespace App\Actions\Task;

use App\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListTaskAction
{
    public function handle($request)
    {
        $result = QueryBuilder::for(Task::class);
        $status = $request['status'];

        if ($status != NULL) {
            throw_unless(
                $status === 'COMPLETED' || $status === 'ACTIVE',
                HttpException::class,
                400,
                'Status not found',
            );

            $result = $result->where('status', $request['status']);
        }

        return $result->get();
    }
}
