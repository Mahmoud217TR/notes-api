<?php

namespace App\Actions\Note;

use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Spatie\QueueableAction\QueueableAction;

class UpdateNote extends NoteAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Note $note, array $data): Note
    {
        return DB::transaction(fn() => $this->notes->update($note, $data));
    }
}
