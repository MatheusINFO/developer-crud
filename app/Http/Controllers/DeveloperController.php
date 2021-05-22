<?php

namespace App\Http\Controllers;

use App\Developer;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class DeveloperController extends Controller
{
    protected $developer;

    public function __construct(Developer $developer){
        $this->developer = $developer;
    }

    public function index(){
        try {
            return response()->json($this->developer->listAllDevelopers(), 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Erro ao listar desenvolvedores"], 404);
        }
    }

    public function show(int $id){
        try {
            return response()->json($this->developer->listOneDeveloper($id), 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Erro ao listar desenvolvedor"], 404);
        }
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
        } catch (\Throwable $th) {
            return response()->json(["message" => "Erro ao criar um novo desenvolvedor"], 400);
        }
    }
}
