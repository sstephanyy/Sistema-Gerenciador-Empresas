<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarEmpresaRequest;
use App\Models\Empresas;
use App\Http\Resources\V1\EmpresaResource;

class EmpresaController extends Controller
{
   
    public function index()
    {
        return EmpresaResource::collection(Empresas::all());
    }

    public function store(GuardarEmpresaRequest $request)
    {
        Empresas::create($request->validated());
        return response()->json("Empresa adicionada ao bandco de dados com sucesso.");
    }


    public function show(Empresas $empresa)
    {
        return new EmpresaResource($empresa);
    }

    public function update(GuardarEmpresaRequest $request, Empresas $empresa)
    {
        $empresa->update($request->validated());
        return response()->json("Empresa atualizada");
    }

    public function destroy(Empresas $empresa)
    {
        $empresa->delete();
        return response()->json("Empresa removida com sucesso");
    }
}
