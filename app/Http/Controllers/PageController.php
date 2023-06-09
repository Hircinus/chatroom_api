<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Message;
use App\Models\User;
use App\Models\Group;

class PageController extends Controller
{
    //
    public function setUser(Request $request){
        $fields = $request->validate([
            'name'        => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string'
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
        $arrayUsers = User::where('username', 'LIKE', $user)
                        ->where('password', 'LIKE', $pass)
                        ->get();
        return response($arrayUsers, 201);
    }

    public function getUserById($id) {
        $arrayUsers = User::where('id', 'LIKE', $id)
                        ->get();
        return response($arrayUsers, 201);
    }

    public function validateUser($user){
        $arrayUsers = User::where('username', 'LIKE', $user)
                        ->get();
        return response($arrayUsers, 201);
    }

    public function setMessage(Request $request){
        $fields = $request->validate([
            'message'        => 'required|string',
            'group_id' => 'required|integer',
            'sender_id' => 'required|integer'
        ]);
        $message = Message::create([
            'message'        => $fields['message'],
            'group_id' => $fields['group_id'],
            'sender_id' => $fields['sender_id']
        ]);

        return response($message, 201);
    }

    public function getMessages(){
        $arrMessages = Message::all();
        return response($arrMessages, 201);
    }

    public function getMessagesByGroupId($groupId){
        $arrMessages = Message::where('group_id', 'LIKE', $groupId)
                            ->get();
        return response($arrMessages, 201);
    }

    public function getMessageById($search){
        $arrGroups = Message::where('id', 'LIKE', $search)
                                ->get();
        return response($arrGroups,201);
    }

    public function setGroup(Request $request){
        $fields = $request->validate([
            'user_1_id' => 'required|integer',
            'user_2_id' => 'required|integer'
        ]);
        $group = Group::create([
            'user_1_id' => $fields['user_1_id'],
            'user_2_id' => $fields['user_2_id']
        ]);
        return response($group, 201);
    }
    public function getGroups(){
        $arrGroups = Group::all();
        return response($arrGroups,201);
    }

    public function getGroupById($search){
        $arrGroups = Group::where('id', 'LIKE', $search)
                                ->get();
        return response($arrGroups,201);
    }

    public function getGroup($sender, $receiver) {
        $group = Group::where('user_1_id', 'LIKE', $sender)
        ->where('user_2_id', 'LIKE', $receiver)
                                ->get();
        if(isset($group)) {
            return response($group,201);
        }
        else {
            return response($group, 404);
        }
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