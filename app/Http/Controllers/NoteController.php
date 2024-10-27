<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:10000',
        ]);
    
        $title = $request->input('title');
        $content = $request->input('content');
    
        if (empty($title) && empty($content)) {
            return redirect()->back()->withErrors(['message' => 'You must provide a title or content.'])->withInput();
        }
    
        if (empty($title) && !empty($content)) {
            $title = substr($content, 0, 50);
        }
    
        $note = new Note();
        $note->title = $title;
        $note->content = $content;
        $user = User::first(); 
        $note->user_id = $user->id;
        $note->save();
    
        return redirect()->route('notes.index');
    }

    public function show(string $id)
    {
        $note = Note::findOrFail($id);
        return view('note.show', compact('note'));
    }

    public function edit(string $id)
    {
        $note = Note::findOrFail($id);
        return view('note.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:10000',
        ]);

        $note = Note::findOrFail($id);
        $title = $request->input('title');
        $content = $request->input('content');

        if (empty($title) && empty($content)) {
            return redirect()->back()->withErrors(['message' => 'You must provide a title or content.'])->withInput();
        }

        if (empty($title) && !empty($content)) {
            $title = substr($content, 0, 50);
        }

        $note->title = $title;
        $note->content = $content;
        $note->save();

        return redirect()->route('notes.index');
    }

    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route('notes.index');
    }
}
