<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
{
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            return [
                'code' => 404,
                'data' => [],
                'message' => "No resources for update action!"
            ];
        }

        return is_array($this->resource) ? $this->resource : [
            'code' => 200,
            'data' => $this->resource->toArray(),
            'message' => 'Successfully updated project!'
        ];
    }
}
