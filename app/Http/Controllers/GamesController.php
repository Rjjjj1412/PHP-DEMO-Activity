<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    protected $game_list;

    public function __construct()
    {
        $this->game_list = require __DIR__ . '/../../../database/datasource.php';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Step 3. Your code here
        $games = $this->game_list;
        return view('games.list', compact('games'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Step 4.
            $results = array_filter($this->game_list, function ($game) use ($id) {
                return $game['id'] == $id; //Keep the game with matching ID
            });

            $game = reset($results); // Get the first and only result

            if (!$game) {
                // Return a custom view or redirect
                return response()->view('games.notfound', [], 404);
            }

            $game = (object) reset($results);

            return view('games.show', compact('game'));
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $results = array_filter($this->game_list, function ($game) use ($id) {
            return $game['id'] != $id; // Keep the games that do not match the ID
        });
        return response()->json([
            'message' => 'Record Successfull Deleted.',
            'content' => $results
        ], 200);
    }
}
