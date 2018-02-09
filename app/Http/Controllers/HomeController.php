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
      Excel::create('ReporteExcelHombresEdad', function($excel) {
      $excel->sheet('EdadGenero', function($sheet) {
      $usersinfo = User::select(DB::raw("users.cc as Cedula_Ciudadania, users.lastname as Apellidos, users.name as Nombres, users.email as Email"))->get();
        $sheet->fromArray($usersinfo);
            });
      })->export('xls');

    }

    public function downloadPDF()
    {
       $pdf = PDF::loadView('pdfView');
       return $pdf->download('invoice.pdf');
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
