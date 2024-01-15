<?php

namespace App\Actions\Note;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\QueueableAction\QueueableAction;

class StoreNote extends NoteAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(User $user, array $data): Note
    {
        return DB::transaction(fn() => $this->notes->store($user, $data));
    }
}
