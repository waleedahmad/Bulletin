<?php

namespace App\Http\Controllers;

use App\Boards;
use App\Config;
use App\LayoutInfo;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function showBoards(){
        $boards = Boards::all();
        return view('boards')->with('boards', $boards);
    }

    public function getEditor(){
        $boards = Boards::all();
        return view('editor')->with('boards', $boards);
    }

    public function createBoard(Request $request){
        $board = new Boards();
        $board->name = $request->name;

        if($board->save()){
            return response()->json([
                'created' => true,
                'id'    =>  $board->id
            ]);
        }

        return response()->json([
            'created' => false,
            'id'    =>  null
        ]);
    }

    public function updateBoard(Request $request){
        $board = Boards::find($request->id);
        $board->name = $request->name;

        return response()->json([
            'updated' => $board->save()
        ]);
    }

    public function deleteBoard(Request $request){
        $board = Boards::find($request->id);
        return response()->json([
            'deleted' => $board->delete()
        ]);
    }

    public function setupInfo(Request $request){
        $info = new LayoutInfo();
        $info->board_id = $request->id;
        $info->row = $request->row;
        $info->col = $request->col;
        $info->size_x = $request->size_x;
        $info->size_y = $request->size_y;
        if($info->save()){
            return response()->json([
                'created' => true,
            ]);
        }
    }

    public function updateInfo(Request $request){
        $info = Boards::find($request->id)->info;
        $info->row = $request->row;
        $info->col = $request->col;
        $info->size_x = $request->size_x;
        $info->size_y = $request->size_y;
        if($info->save()){
            return response()->json([
                'updated' => true,
            ]);
        }
    }

    public function updateColor(Request $request){
        return response()->json([
            'updated'   =>  Config::where('name', '=', 'background_color')->update(['value' => $request->color])
        ]);
    }
}
