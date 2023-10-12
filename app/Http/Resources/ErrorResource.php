<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    static $wrap='errors';
    public function toArray(Request $request): array
    {

        return[
            'success'=>'false',
            'message'=>'error',
            'errors'=> parent::toArray($request),
        ];

    }
}
