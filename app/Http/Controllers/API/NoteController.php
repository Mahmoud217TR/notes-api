<?php

namespace App\Http\Controllers\API;

use App\Actions\Note\DeleteNote;
use App\Actions\Note\StoreNote;
use App\Actions\Note\UpdateNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\Note\IndexRequest;
use App\Models\Note;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Http\Resources\NoteResource;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Note::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $notes = user()->notes()
            ->latest()
            ->when(filled($request->keyword), fn($query) => $query->searchWithKeyword($request->keyword));
        return NoteResource::collection($notes->paginate($request->getPerPage()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, StoreNote $action)
    {
        $note = $action->execute(user(), $request->all());
        return response()->json([
            'message' => "Created Successfully",
            'note' => new NoteResource($note)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return new NoteResource($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Note $note, UpdateNote $action)
    {
        $note = $action->execute($note, $request->all());
        return response()->json([
            'message' => "Updated Successfully",
            'note' => new NoteResource($note)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note, DeleteNote $action)
    {
        $action->execute($note);
        return response()->json([
            'message' => "Deleted Successfully"
        ]);
    }
}
