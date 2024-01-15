<?php

namespace App\Repositories;

use App\Models\Note;
use App\Models\User;

class NoteRepository
{
    public function store(
        User $user,
        array $data
    ): Note {
        return $user->notes()->create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
    }

    public function update(
        Note $note,
        array $data
    ):Note {
        $note->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
        return $note;
    }

    public function delete(
        Note $note
    ): bool {
        return $note->delete();
    }
}
