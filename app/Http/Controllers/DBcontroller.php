<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DBcontroller extends Controller
{
    public function afficher(Request $request)
    {
        $users = DB::select('select * from users;');
        $message = $request->header('message');

        echo Session::get('message');;

        return view('users', [
            'message' => $message,
            'users' => $users
        ]);
    }

    public function adduser(Request $request)
    {
        $id = $request->input('id');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $dateNaissance = $request->input('dateNaissance');

        DB::insert('insert into users values (?, ?, ?, ?)', [$id, $nom, $prenom, $dateNaissance]);

        return redirect('/database')->with(['message' => 'User with id ' . $id . ' added successfully']);
    }

    public function delete(int $id): View
    {
        return view("confirm", [
            "id" => $id,
        ]);
    }

    public function confirmDelete(int $id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect('/database')->with(['message' => 'User with id ' . $id . ' deleted successfully']);

        // return view('users', [
        //     'message' => 'User with id ' . $id . ' deleted successfully',
        //     'users' => $users
        // ]);
    }

    public function modify(int $id): View
    {
        $user = DB::table('users')->where('id', $id)->first();

        $nom = $user->nom;
        $prenom = $user->prenom;
        $dateNaissance = $user->dateNaissance;

        return view("modify", [
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "dateNaissance" => $dateNaissance,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $dateNaissance = $request->input('dateNaissance');
        DB::table('users')
            ->where('id', $id)
            ->update([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'dateNaissance' => $dateNaissance
            ]);

        return redirect('/database')->with(['message' => 'User with id ' . $id . ' updated successfully']);
    }
}
