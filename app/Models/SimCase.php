<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class SimCase extends Model
{
    //
    protected function casts(): array
    {
        return [
            'vorbereitung' => 'array',
            'fallbeispiel' => 'array',
            'debriefing' => 'array',
            'files' => 'array',
        ];
    }
}
