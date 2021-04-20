<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    use ApiResponse;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $notes = Note::all();

        return $this->successReponse($notes);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $rules = [
            'note' => 'required',
            'subject' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $note = Note::create($request->all());

        return $this->successReponse($note, Response::HTTP_CREATED);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return $this->successReponse($note);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'subject' => 'max:255'
        ];

        $this->validate($request, $rules);

        $note = Note::findOrFail($id);

        $note->fill($request->all());

        if ($note->isClean()) {
            return $this->errorResponse('At least ine value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $note->save();

        return $this->successReponse($note);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return $this->successReponse($note);
    }
}
