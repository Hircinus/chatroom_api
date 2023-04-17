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

    /* TODO

    public function setItem(Request $request){
        $fields = $request->validate([
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|decimal:2',//there is not validate double
            'image'         => 'image|nullable|max:1999',
            'category_id'   => 'required|integer',
        ]);
       $item = Item::create([
            'name'        => $fields['name'],
            'description' => $fields['description'],
            'price'       => $fields['price'],
            //'image'=> $fields['image']:null,
            'category_id'  => $fields['category_id']
        ]);

        return response($item, 201);
    }

    public function getItems(){
        $arryItems = Item::all();
        return response($arryItems, 201);
    }

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