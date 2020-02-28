<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Modelo\Beneficiarios;
use Yajra\Datatables\Datatables;
use App\Modelo\Formularios;
use App\Modelo\EstructuraJuridicas;
use Faker\Provider\Image;
use Illuminate\Support\Facades\DB;

class mantenedorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('mantenedor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTabla(){

        $formu = Formularios::select(['id','numero_form','lugar_firma','fecha_decla','tipo_formulario_id']);

        return Datatables::of($formu)
            ->make(true);
    }

    public function datos(){

        $datos = Formularios::where('id', '=', '10')
        ->first();
        //return $datos->juriFormu->declaJuridicos->beneficiario;//()->count();

        //return $datos->juriFormu->declaJuridicos;
        //return 0;

         //return $datos;
        $pdf=new \FPDF();

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Image('C:\xampp\htdocs\uaf\public\img\UAF icono.jpg', 15, -10, -150);
        $pdf->Ln();
        $pdf->Cell(300, 10, utf8_decode('N°'), 0, 1, 'C');
        $pdf->Cell(310, -10, utf8_decode($datos->id), 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 20, utf8_decode('DECLARACIÓN JURADA PARA LA IDENTIFICACIÓN DE BENEFICIARIOS'), 0, 1, 'C');
        $pdf->Cell(0, -10, utf8_decode('FINALES DE PERSONAS Y/O ESTRUCTURAS JURÍDICAS'), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 30, utf8_decode('Las personas y estructuras jurídicas (PJ) que cumplan los requisitos dispuestos en la Circular Nº57/2017 '), 0, 1);
        $pdf->Cell(0, -20, utf8_decode('de la Unidad de Análisis Financiero deberán proporcionar la siguiente información:'), 0, 1);
        $pdf->SetFont('Arial','B', 14);
        $pdf->Cell(0, 35, utf8_decode('1. ANTECEDENTES DE LA PERSONA JURÍDICA DECLARANTE'), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, utf8_decode('RUT/Nº identificación: '), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->rut_declaJ), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, utf8_decode('Razón social: '), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->razon_social), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, 'Domicilio: ', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->domi_declaJ), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, 'Ciudad: ', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->ciu_declaJ), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, utf8_decode('Lugar de constitución: '), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->pais_const), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, utf8_decode('Teléfono: '), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->telefono), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, utf8_decode('CNI/Nº identificación rep. legal: '), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->rep_rut), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, 'Nombre representante legal: ', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->rep_nombre), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -20, 'Tipo de sociedad: ', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 30, utf8_decode($datos->juriFormu->declaJuridicos->tipo_entidad), 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 5, utf8_decode('Identifique la alta gerencia de la persona o estructura jurídica:'), 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(40, 40, 40);
        $pdf->SetDrawColor(88, 88, 88);
        $pdf->Cell(50, 10, utf8_decode('RUT/Nº identificación'), 1, 0, 'C');
        $pdf->Cell(60, 10, 'Cargo', 1, 0, 'C');
        $pdf->Cell(80, 10, 'Nombre', 1, 0, 'C');
        $pdf->Ln();

        foreach($datos->juriFormu->declaJuridicos->estructuraJuridica as $dato ){

            $pdf->Cell(50, 10, utf8_decode($dato->rut_numero_gerencia), 1, 0, 'C');
            $pdf->Cell(60, 10, utf8_decode($dato->nombre), 1, 0, 'C');
            $pdf->Cell(80, 10, utf8_decode($dato->cargo), 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->SetFont('Arial','B', 14);
        $pdf->Cell(0, 20, utf8_decode('2. IDENTIFICACIÓN DE LOS BENEFICIARIOS FINALES'), 0, 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, -30, utf8_decode('Se entenderá como beneficiarios Finales a la(s) persona(s) natural(es) que finalmente posee, directa o'), 0, 1);
        $pdf->Cell(0, 40, utf8_decode('indirectamente, a través de sociedades u otros mecanismos, una participación igual o mayor al 10 % del'), 0, 1);
        $pdf->Cell(0, -30, utf8_decode('capital o de los derechos a voto de una persona jurídica determinada.'), 0, 1);
        $pdf->Cell(0, 40, utf8_decode('Asimismo, se entenderá como Beneficiario Final a la(s) persona(s) natural(es) que, sin perjuicio de poseer'), 0, 1);
        $pdf->Cell(0, -30, utf8_decode('directa o indirectamente una participación inferior al 10% del capital o de los derechos a voto de una persona'), 0, 1);
        $pdf->Cell(0, 40, utf8_decode('jurídica, a través de sociedades u otros mecanismos, ejerce el control efectivo de la persona o estructura'), 0, 1);
        $pdf->Cell(0, -30, utf8_decode('jurídica.'), 0, 1);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B', 13);
        $pdf->Cell(0, 20, utf8_decode('2.1 Beneficiarios Finales'), 0, 1);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, -10, utf8_decode('Identifique las personas naturales que tienen una participación en la persona o estructura jurídica '), 0, 1);
        $pdf->Cell(0, 20, utf8_decode('declarante igual o mayor al 10%.'), 0, 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(40, 40, 40);
        $pdf->SetDrawColor(88, 88, 88);
        $pdf->Cell(15, -15, utf8_decode('CNI/ID'), 1, 0, 'C');
        $pdf->Cell(40, -15, utf8_decode('Nombre Completo'), 1, 0, 'C');
        $pdf->Cell(40, -15, utf8_decode('Domicilio'), 1, 0, 'C');
        $pdf->Cell(40, -15, utf8_decode('Ciudad'), 1, 0, 'C');
        $pdf->Cell(20, -15, utf8_decode('País'), 1, 0, 'C');
        $pdf->Cell(30, -15, utf8_decode('% participación'), 1, 0, 'C');
        $pdf->Ln();
        foreach($datos->juriFormu->declaJuridicos->beneficiario as $dato){

            if($dato->participacion >= 10){
                $pdf->Cell(15, 45, utf8_decode($dato->rut_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->nombres_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->domi_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->ciu_bene), 1, 0, 'C');
                $pdf->Cell(20, 45, utf8_decode($dato->pais_bene), 1, 0, 'C');
                $pdf->Cell(30, 45, utf8_decode($dato->participacion), 1, 0, 'C');
                $pdf->Ln();
            }
        }
        $pdf->SetFont('Arial','B', 13);
        $pdf->Cell(0, 45, utf8_decode('2.2 Control Efectivo'), 0, 1);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, -30, utf8_decode('Identifique a las personas naturales que, sin perjuicio de poseer directa o indirectamente una participación'), 0, 1);
        $pdf->Cell(0, 40, utf8_decode('inferior al 10%, ejerce el control efectivo de la persona o estructura jurídica declarante.'), 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(40, 40, 40);
        $pdf->SetDrawColor(88, 88, 88);
        $pdf->Cell(15, -15, utf8_decode('CNI/ID'), 1, 0, 'C', 1);
        $pdf->Cell(40, -15, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
        $pdf->Cell(40, -15, utf8_decode('Domicilio'), 1, 0, 'C', 1);
        $pdf->Cell(40, -15, utf8_decode('Ciudad'), 1, 0, 'C', 1);
        $pdf->Cell(20, -15, utf8_decode('País'), 1, 0, 'C', 1);
        $pdf->Cell(30, -15, utf8_decode('% participación'), 1, 0, 'C', 1);
        $pdf->Ln();
        foreach($datos->juriFormu->declaJuridicos->beneficiario as $dato){

            if($dato->participacion < 10){
                $pdf->Cell(15, 45, utf8_decode($dato->rut_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->nombres_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->domi_bene), 1, 0, 'C');
                $pdf->Cell(40, 45, utf8_decode($dato->ciu_bene), 1, 0, 'C');
                $pdf->Cell(20, 45, utf8_decode($dato->pais_bene), 1, 0, 'C');
                $pdf->Cell(30, 45, utf8_decode($dato->participacion), 1, 0, 'C');
                $pdf->Ln();
            }
        }
        $pdf->SetFont('Arial','B', 13);
        $pdf->Cell(0, 45, utf8_decode('3. ANTECEDENTES DE LA PERSONA QUE REALIZA LA PRESENTE DECLARACIÓN'), 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, -25, utf8_decode('Nacionalidad: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->origen), 0, 1);
        $pdf->Cell(0, -25, utf8_decode('CNI/Nº identificación: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->rut_declaN), 0, 1);
        $pdf->Cell(0, -25, utf8_decode('Nombres: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->nombres_declaN), 0, 1);
        $pdf->Cell(0, -25, utf8_decode('Apellido Paterno: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->apel_pat_declaN), 0, 1);
        $pdf->Cell(0, -25, utf8_decode('Apellido Materno: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->apel_mat_declaN), 0, 1);
        $pdf->Cell(0, -25, utf8_decode('Lugar de origen: '), 0, 1);
        $pdf->Cell(0, 40, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->origen), 0, 1);
        $pdf->Ln();
        $pdf->Cell(0, 0, utf8_decode('Relación con la persona jurídica declarante: '), 0, 1);
        $pdf->Cell(0, 10, utf8_decode($datos->juriFormu->declaJuridicos->DeclaNaturales[0]->relacion_juridica), 0, 1);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 200, utf8_decode('Declaro bajo juramento, que la información proporcionada en este formulario es completa y veraz.'), 0, 1);
        $pdf->Cell(180, -80, utf8_decode('En '), 0, 1, 'C');
        $pdf->Cell(200, 80, utf8_decode($datos->lugar_firma), 0, 1, 'C');
        $pdf->Cell(220, -80, utf8_decode(', a'), 0, 1, 'C');
        $pdf->Cell(265, 80, utf8_decode($datos->created_at), 0, 1, 'C');
        $pdf->Output();
        exit();
    }
}
