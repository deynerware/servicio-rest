<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
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
    public function auth(Request $request)
    {
        $token = 'AJHJHJXKJ8879KJGJKDGJHG87567KHSDG';

        $user = User::find($request->get('email'));

        if ($user->password == $request->get('password')) {
            return $token;
        }

        return 'Error Validacion';
    }

}
