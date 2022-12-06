<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('name')) {
            return School::where('name', 'like', $request->input('name') . '%')->get();
        }

        return School::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:schools|digits:9',
            'name' => 'required|unique:schools|max:255',
            'address' => 'required|unique:schools|max:255',
        ]);
        return School::create($request->all());
    }

    public function show($code, Request $request)
    {
        return School::find($code);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $Restaurant = School::find($id);
        $Restaurant->update($request->all());
        return $Restaurant;
    }

    public function destroy($id)
    {
        return School::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
}
