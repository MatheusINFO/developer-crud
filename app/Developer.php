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

    public function listOneDeveloper(int $id)
    {
        $developer = Developer::find($id);
        return $developer;
    }

    public function storeDeveloper(array $request)
    {
        $developer = Developer::create($request);
        return $developer;
    }

    public function updateDeveloper(array $request, int $id)
    {
        $developer = Developer::find($id);
        $developer->update($request);
        return $developer;
    }

    public function deleteDeveloper(int $id)
    {
        $developer = Developer::destroy($id);
        return $developer;
    }
}
