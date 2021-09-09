<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;

class ToDoListController extends Controller
{
    public function index(){
        return ToDoList::all();
    }

    public function store(Request $request){
        $result = [
            'status'    => false,
            'message'   => '',
        ];
        try{
            $to_do_list                 = new ToDoList();
            $to_do_list->name           = $request->name;
            $to_do_list->title          = $request->title;
            $to_do_list->description    = $request->description;
            $to_do_list->save();

            $result['status']   = true;
            $result['message']  = 'Success To Store Data';
            return response()->json($result);
        }catch(\Exception $e){
            $result['message'] = $e->getMessage();
            return response()->json($result);
        }
    }

    public function show($id){
        $to_do_list = ToDoList::find($id);
        return $to_do_list;
    }

    public function edit($id){
        $to_do_list = ToDoList::find($id);
        return $to_do_list;
    }

    public function update(Request $request, $id){
        $to_do_list                 = ToDoList::find($id);
        $to_do_list->name           = $request->name;
        $to_do_list->title          = $request->title;
        $to_do_list->description    = $request->description;
        $to_do_list->save();

        return $to_do_list;
    }

    public function destroy($id){
        $to_do_list = ToDoList::find($id);
        $to_do_list->delete();
        return $to_do_list;
    }
}
