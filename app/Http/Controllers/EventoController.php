<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Evento;
use App\Models\Area;
use App\Models\Commonarea;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $title, $descripcion, $start, $end,$areas_id;
    public $updateMode = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rol_name = auth()->user()->getRoleNames()->first();
        $users_id=auth()->user()->id;
        switch ($rol_name)
        {
            case "admin" :
                $empleados= User::all();
                $commonareas=Commonarea::all();
                  break;  
            case "coordinador" :
                $empleados= User::where('ponencias_id', auth()->user()->ponencias_id)->get();
                $commonareas=Commonarea::all();
            break;  
            case "magistrado" :
                $empleados= User::all();
                $commonareas=Commonarea::all();
            break;
          default:
                $empleados= User::where('id', $users_id)->get();
                $commonareas=Commonarea::all();
               
        }
        $areas=Commonarea::all();
       
        return view('evento.index',compact('empleados','id','commonareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evento::$rules);
        $evento=Evento::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {

        $rol_name = auth()->user()->getRoleNames()->first();
        $users_id=auth()->user()->id;
        switch ($rol_name)
        {
            case "admin" :
                $evento=Evento::all();
                  break;  
            case "manager" :
                 //$evento=Evento::all();
                 $evento = DB::Select('SELECT eventos.* FROM `eventos`, users, commonareas 
                 WHERE eventos.users_id=users.id AND users.ponencias_id = ponencias.id AND users.ponencias_id='.auth()->user()->ponencias_id);
            break;
            case "user" :
                //$evento=Evento::all();
                $evento=DB::Select('SELECT * FROM `eventos`, commonareas, users WHERE eventos.users_id=users.id
                 AND eventos.commonareas_id=commonareas.id AND eventos.users_id='.$users_id.' AND eventos.commonareas_id=2');
                //$evento=Evento::where('users_id',$users_id)->get();
           break;   
          default:
                 $evento=Evento::where('users_id',$users_id)->get();
        }

      
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento=Evento::find($id);
        $evento->start=Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d'); 
        $evento->end=Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d'); 
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {   
        request()->validate(Evento::$rules);
        $evento->update($request->all());    
        return response()->json($evento);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento=Evento::find($id)->delete();
        return response()->json($evento);
    
    }
}
