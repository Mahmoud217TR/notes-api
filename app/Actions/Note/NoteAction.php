<?php

namespace App\Actions\Note;

use App\Repositories\NoteRepository;

abstract class NoteAction
{
    public NoteRepository $notes;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(NoteRepository $notes)
    {
        $this->notes = $notes;
    }
}
