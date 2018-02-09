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
      Excel::create('ReporteExcel', function($excel) {
      $excel->sheet('EdadGenero', function($sheet) {
      $usersinfo = User::select(DB::raw("users.cc as Cedula_Ciudadania, users.lastname as Apellidos, users.name as Nombres, users.email as Email, users.cellphone as Celular, users.department as DepartamentoNac, users.city as CiudadNac, users.created_at as FechaRegistro"))->get();
        $sheet->fromArray($usersinfo);
            });
      })->export('xls');

    }

    public function downloadPDF($id = NULL, Request $request)
    {
      $consult = User::where('id',$id)->firstorFail();
      $view =  \View::make('pdfView', compact('consult'))->render();
      $pdf = \App::make('dompdf.wrapper');

      $pdf->loadHTML($view);
      return $pdf->stream('memorando');
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
      $data = User::orderBy('lastname','asc')->Paginate(5);
      return view('home',['lists'=>$data]);
    }
}
