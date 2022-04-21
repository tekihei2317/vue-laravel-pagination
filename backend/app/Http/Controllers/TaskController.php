<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(
        private Task $taskModel
    ) {
    }

    public function index()
    {
        return TaskResource::collection($this->taskModel->with('status')->paginate(10));
    }
}
