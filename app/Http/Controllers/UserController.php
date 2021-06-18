<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function home()
    {
//        $dados = [
//            'name' =>'Maria',
//            'email' => 'maria@gmail.com',
//            'password' => '123456',
//        ];
//        $user = User::create($dados);

//    1
//        $phone = [
//            'nome' => 'Iphone 8',
//            'user_id' => 1
//        ];
//        Phone::create($phone);
//        $phone = Phone::all();

        $user= User::find(1);
        $phone_user = User::find((int) $user->id)->phone;
        echo "<pre>";
        echo "<p>User: Id $user->id</p>";
        echo "<p>Nome: $user->name</p>";
        echo "<p>Dados do produto de $user->name</p>";
        echo "<p>Telefone $phone_user->nome</p>";

    }

}
