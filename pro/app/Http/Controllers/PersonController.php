<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Datatables;

class PersonController extends Controller
{
    public function index()
    {
        return view('sistema.person');
    }

    public function anyData(){
        $users = Person::with('municipality')->get();

        return Datatables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/Y h:i:s a');
            })
            ->editColumn('name_one', function ($person) {
                return $person->name_one.' '.$person->name_two.' '.$person->last_name_one.' '.$person->last_name_two;
            })            
            ->editColumn('municipality.name', function ($person) {
                return $person->municipality->name.', '.$person->direction;
            })            
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('d/m/Y h:i:s a');
            })
            ->addColumn('accion', function ($person) {
                $model = 'Person';

                $acciones = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='{{ $person }}' data-original-title='Edit' class='btn btn-sm btn-warning btn-just-icon edit{{ $model }}'><i class='material-icons'>edit</i></a>";
                $acciones .= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='{{ $person }}' data-original-title='Show' class='btn btn-sm btn-info btn-just-icon show{{ $model }}'><i class='material-icons'>pageview</i></a>";
                $acciones .= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='{{ $person }}' data-original-title='Delete' class='btn btn-sm btn-danger btn-just-icon show{{ $model }}'><i class='material-icons'>delete</i></a>";
                return $acciones;
            })    
            ->rawColumns(['accion'])        
            ->addIndexColumn()
            ->make(true);
    }    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Person $person)
    {
        //
    }

    public function edit(Person $person)
    {
        //
    }

    public function update(Request $request, Person $person)
    {
        //
    }

    public function destroy(Person $person)
    {
        //
    }
}
