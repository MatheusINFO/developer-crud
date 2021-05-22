<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    protected $developer;

    public function __construct(Developer $developer){
        $this->developer = $developer;
    }

    public function index(Request $request){
        try {
            $filters = ['nome', 'idade', 'sexo', 'hobby', 'datanascimento'];
            $query = [
                "nome" => "%",
                "idade" => "%",
                "sexo" => "%",
                "hobby" => "%",
                "datanascimento" => "%"
            ];
            $hasQuery = false;
            foreach($filters as $filter){
                if($request->query($filter)){
                    $query[$filter] = $request->query($filter);
                    $hasQuery = true;
                }
            }
            if(!$hasQuery){
                return response()->json($this->developer->listAllDevelopers([]), 200);
            }
            return response()->json($this->developer->listAllDevelopers($query), 200);
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

    public function update(Request $request, int $id){
        try {
            $request->validate([
                'nome' => ['bail', 'max:25'],
                'sexo',
                'idade',
                'hobby' => ['max:250'],
                'datanascimento'
            ]);
            return response()->json($this->developer->updateDeveloper($request->toArray(), $id), 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Erro ao atualizar desenvolvedor"], 400);
        }
    }

    public function destroy(int $id){
        try {
            $this->developer->deleteDeveloper($id);
            return response()->json('', 204);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Erro ao listar desenvolvedor"], 404);
        }
    }
}
