<?php

namespace App\Http\Controllers;

use App\Developer;
use Exception;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    protected $developer;

    public function __construct(Developer $developer){
        $this->developer = $developer;
    }

    public function store(Request $request){
        try {
            $request->validate([
                'nome' => ['bail', 'required', 'max:25'],
                'sexo' => ['required'],
                'idade' => ['required'],
                'hobby' => ['required', 'max:250'],
                'datanascimento' => ['required']
            ]);
            return response()->json($this->developer->storeDeveloper($request->toArray()), 201);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao criar um novo desenvolvedor"], 400);
        }
    }
}
