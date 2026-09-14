<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Support\Facades\Auth;


class TrashedController extends Controller
{
    public function index(){

        $user_id= Auth::id();
        $notes = Note::where('user_id', $user_id)->onlyTrashed()->latest('updated_at')->paginate(5);
        $notebooks = Notebook::where('user_id', $user_id)->get();

        return view('note.index', compact('notes', 'notebooks'));
    }

    public function show(Note $note){

        if($note->user_id !== Auth::id()){
            abort(403);
        }

        return view('note.show', ['note' => $note]); 
    }

    public function update(Note $note){

        if($note->user_id !== Auth::id()){
            abort(403);
        }

        $note->restore();

        return redirect()
            ->route('notes.show', ['note' => $note])
            ->with('success', 'Note restored Successfully');
    }


    public function destroy(Note $note){

        if($note->user_id !== Auth::id()){
            abort(403);
        }

        $note->forceDelete();

        return redirect()
            ->route('trashed.index')
            ->with('success', 'Note deleted forever');
    }
}
