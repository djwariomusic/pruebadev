<?php

namespace App\Http\Controllers;

use App\user;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function excel()
    {
      /** Controlador de Generar Excel */
      Excel::create('ReporteExcel', function($excel) {
      $excel->sheet('Usuarios', function($sheet) {
      /** Query para generar Reporte */
      $usersinfo = User::select(DB::raw("users.cc as Cedula_Ciudadania, users.lastname as Apellidos, users.name as Nombres, users.email as Email, users.cellphone as Celular, users.department as DepartamentoNac, users.city as CiudadNac, users.created_at as FechaRegistro"))->get();
        $sheet->fromArray($usersinfo);
            });
      })->export('xls');

    }

    public function downloadPDF($id = NULL, Request $request)
    {
      /** Controlador de Generar Excel */
      /** Controlador recibe Id User por get para consultar datos y enviarlos a la Vista PDF */
      $consult = User::where('id',$id)->firstorFail();
      $view =  \View::make('pdfView', compact('consult'))->render();
      $pdf = \App::make('dompdf.wrapper');

      $pdf->loadHTML($view);
      return $pdf->stream('documento');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /** Query para retonarnar listado paginado de Usuarios Registrados */
      $data = User::orderBy('lastname','asc')->Paginate(5);
      return view('home',['lists'=>$data]);
    }
}
