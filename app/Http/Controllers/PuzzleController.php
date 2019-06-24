<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puzzle;

class PuzzleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puzzles = Puzzle::all();
        return response()->json($puzzles);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'content',
        ]);

        try {
            Puzzle::create($data);
            $result = [
                'message' => true,
            ];
        } catch (Exception $e) {
            $result = [
                'message' => false,
            ];
        }

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puzzle = Puzzle::find($id);

        return response()->json($puzzle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'content',
        ]);

        try {
            $puzzle = Puzzle::find($id);
            $puzzle->update($data);
            $result = [
                'message' => true,
            ];
        } catch (Exception $e) {
            $result = [
                'message' => false,
            ];
        }

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $puzzle = Puzzle::find($id);
            $puzzle->delete();
            $result = [
                'status' => true,
            ];
        } catch (Extention $e) {
            $result = [
                'status' => false,
            ];
        }

        return response()->json($result);
    }
}
