<?php

namespace App\Validators;

class SermonStatusValidator extends AbstractBaseValidator
{
    public function rules()
    {
        return [
            'stream_started' => 'sometimes|boolean',
            'stream_ended' => 'sometimes|boolean',
            'recording_done' => 'sometimes|boolean',
        ];
    }
}