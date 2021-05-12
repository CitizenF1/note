<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Note::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "title" => ["required"],
                "body" => ["required"]
            ]
        );

        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        }

        $note = Note::create([
            "title" => $request->title,
            "body" => $request->body
        ]);

        return [
            "status" => true,
            "note" => $note
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                "status" => false,
                "message" => "note not found"
            ])->setStatusCode(404);
        }

        return $note;
    }
}
