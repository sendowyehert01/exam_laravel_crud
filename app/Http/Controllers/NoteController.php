<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function alldata() {
            $allnotes = [Note::latest('updated_at')->paginate(10), User::all(), Carbon::now()];
            return  view("notes.alldata")->with('allnotes', $allnotes);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $userId = Auth::id();
        // $notes = Note::where('user_id', $userId)->latest('updated_at')->paginate(2);
        // $notes = Auth::user()->notes()->latest('updated_at')->paginate(2);
        $notes = [Note::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(10), Auth::user()->name];
        // $notes->each(function($note) {
        //     dump($note->blog_title);
        // });

        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;
        return view('notes.create')->with('username', $username);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|max:120',
            'blog_writer' => 'required',
        ]);

        Auth::user()->notes()->create([
                'uuid' => Str::uuid(),
                'blog_title' => $request->blog_title,
                'blog_writer' => $request->blog_writer
            ]);

        return to_route('notes.index')->with('success', 'You added a BLOG successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {

        if ($note->user_id != Auth::id()) {
            return abort(403);
        }

        // $note = Note::where('uuid', $uuid)->where('user_id', Auth::id())->firstOrFail();
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id != Auth::id()) {
            return abort(403);
        }

        // $note = Note::where('uuid', $uuid)->where('user_id', Auth::id())->firstOrFail();
        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {

        if ($note->user_id != Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'blog_title' => 'required|max:120',
            'blog_writer' => 'required',
        ]);

        $note->update([
            'blog_title' => $request->blog_title,
            'blog_writer' => $request->blog_writer,
        ]);

        return to_route('notes.show', $note)->with('success', 'Your blog is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {   
        if ($note->user_id != Auth::id()) {
            return abort(403);
        }

        $note->delete();

    return to_route('notes.index')->with('success', 'Your blog is deleted successfully!');
    }
}
