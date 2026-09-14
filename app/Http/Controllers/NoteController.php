<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {  
        $user_id= Auth::id();
        $notes = Note::where('user_id', $user_id)->latest('updated_at')->paginate(5);
        $notebooks = Notebook::where('user_id', $user_id)->get();

        return view('note.index', compact('notes', 'notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'text' => 'required',
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text,
            'notebook_notebook_id' => $request->notebook
        ]);

        return redirect()
            ->route('note.index')
            ->with('success', 'Note Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort(403);
        }
        $user_id= Auth::id();
        $notebooks = Notebook::where('user_id', $user_id)->get();

        return view('note.show', ['note' => $note, 'notebooks' => $notebooks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort(403);
        }

        $notebooks = Notebook::where('user_id', Auth::id())->get();
        return view('note.edit', ['note' => $note, 'notebooks' => $notebooks]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'text' =>  'required',
        ]);

        $note->update([
            'title' => $request->title,
            'text' => $request->text,
            'notebook_id' => $request->notebook
        ]);

        return redirect()
            ->route('note.show', ['note' => $note])
            ->with('success', 'Note Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if($note->user_id !== Auth::id()){
            abort(403);
        }
        
        $note->delete();

        return redirect()
            ->route('note.store', ['note' => $note])
            ->with('success', 'Note moved to trash Successfully');
    }
}
