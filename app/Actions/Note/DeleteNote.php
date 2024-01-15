<?php

namespace App\Actions\Note;

use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Spatie\QueueableAction\QueueableAction;

class DeleteNote extends NoteAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Note $note): bool
    {
        return DB::transaction(fn() => $this->notes->delete($note));
    }
}
