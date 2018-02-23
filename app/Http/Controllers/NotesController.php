<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Auth\PostNoteRequest;
use App\Note;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function add_note() {
        return view('add_note');
    }

    public function post_note(PostNoteRequest $request) {
        $logged_in_user_id = Auth::id();
        $logged_in_user = Auth::user();

        if ($logged_in_user->banned_at != null) {
            return 'Your account has been banned.';
        }

        Note::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'user_id' => $logged_in_user_id]
        );

        return redirect()->route('user', ['user_id' => $logged_in_user_id]);
    }

    public function show_user_notes($user_id) {
        $user = User::find($user_id);

        if ($user == null)
            return 'User not found.';

        return view('users_notes', compact('user'));
    }

    public function banned() {
        return view('banned');
    }
}
