<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Item;

class PageController extends Controller
{
    //
    public function setUser(Request $request){
        $fields = $request->validate([
            'name'        => 'required|string',
            'username' => 'required|string',
            'password' => 'required|hash'
        ]);
        $user = User::create([
            'name'        => $fields['name'],
            'username' => $fields['username'],
            'password' => $fields['password']
        ]);

        return response($user, 201);
    }

    public function getUsers(){
        $arrayUsers = User::all();
        return response($arrayUsers, 201);
    }

    public function getUser($user, $pass){
        $arrayUsers = User::where('username', 'LIKE', '%'.$user.'%')
                        ->andWhere('password', 'LIKE', '%'.$pass.'%')
                        ->get();
        return response($arrayUsers, 201);
    }

    public function setMessage(Request $request){
        $fields = $request->validate([
            'message'        => 'required|string',
            'group_id' => 'required|integer',
            'sender_id' => 'required|integer'
        ]);
        $message = Messages::create([
            'message'        => $fields['message'],
            'group_id' => $fields['group_id'],
            'group_id' => $fields['group_id']
        ]);

        return response($message, 201);
    }

    public function getMessages(){
        $arrMessages = Messages::all();
        return response($arrMessages, 201);
    }

    public function getMessagesByGroupId(){
        $arrMessages = Messages::where('group_id', 'LIKE', $search)
                            ->get();
        return response($arrMessages, 201);
    }

    public function setGroup(Request $request){
        $fields = $request->validate([
            'user_1_id' => 'required|integer',
            'user_2_id' => 'required|integer'
        ]);
        $group = Groups::create([
            'user_1_id' => $fields['user_1_id'],
            'user_2_id' => $fields['user_2_id']
        ]);
        return response($group, 201);
    }
    public function getGroups(){
        $arrGroups = Groups::all();
        return response($arrGroups,201);
    }

    public function getGroupsByGroupId(){
        $arrGroups = Groups::where('group_id', 'LIKE', $search)
                                ->get();
        return response($arrGroups,201);
    }

    /* TODO

    public function getItem($search){
        $arryItems = Item::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('description', 'LIKE', '%'.$search.'%')
                        ->get();
        return response($arryItems, 201);
    }

    public function getItemsByCategory($search){
        $categories = Category::where('name', 'LIKE', '%'.$search.'%')->get();
        $items=[];
        if(sizeof($categories)>0){
            $idCat = $categories[0]->id;
            $items = Category::find($idCat)->items;
        }

        foreach ($items as $item) {
            // ...
        }
        return response($items, 201);
    }

    public function getCategoryByItem($search){
        $items = Item::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('description', 'LIKE', '%'.$search.'%')
                        ->get();
        if(isset($items) && sizeof($items)>0){
            $idItem= $items[0]->id;
            $category = Item::find($idItem)->category;
            return response([$category], 201);
        }
        return response([],201);
    }

    */
}