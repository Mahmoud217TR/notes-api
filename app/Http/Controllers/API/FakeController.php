<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fake\GenereateNotesRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakeController extends Controller
{
    public function generateNotes(GenereateNotesRequest $request)
    {
        $amount = $request->amount;
        $user = $request->getUserModel();
        DB::transaction(fn() => Note::factory($amount)->forUser($user)->create());
        return response()->json([
            'message' => "Created {$amount} notes for {$user->name} ({$user->id}) successfully",
        ]);
    }
}
