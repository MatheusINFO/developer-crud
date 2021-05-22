<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $table = 'developers';
    protected $fillable = ['nome', 'sexo', 'idade', 'hobby', 'datanascimento'];

    public function listAllDevelopers()
    {
        $developers = Developer::all();
        return $developers;
    }

    public function storeDeveloper(array $request)
    {
        $developer = Developer::create($request);
        return $developer;
    }
}
