<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Task */
        $task = $this->resource;
        assert($task->relationLoaded('status'));

        return [
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'status' => $task->status->name,
        ];
    }
}
