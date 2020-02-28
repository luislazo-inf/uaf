<?php

namespace App\Http\Controllers;

use App\Modelo\EstructuraJuridicas;
use App\Modelo\Beneficiarios;
use App\Modelo\BeneficioJuridico;
use App\Modelo\DeclaJuridicos;
use App\Modelo\DeclaNaturales;
use App\Modelo\Formularios;
use App\Modelo\JuridicoNatural;
use App\Modelo\JuriForm;

use function GuzzleHttp\json_decode;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class formularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje = null;
        return view('formulario', compact('mensaje'));
    }

    public function create()
    {
    }

    public function Prueba(Request $request){


    }

    public function guardar(Request $request)
    {

        //rescatar los datos de la tabla y transformarlo en array
       $datos = json_decode($request->input('inputarray'));
       $notas = json_decode($request->input('inputarray1'));
       foreach ($datos as $dato) {


        //tabla beneficiarios
        $bene = new Beneficiarios();

            $bene->rut_bene = $dato[0]->registro1;
            $bene->nombres_bene = $dato[1]->registro2;
            $bene->apellidos_bene = $dato[2]->registro3;
            $bene->domi_bene = $dato[3]->registro4;
            $bene->ciu_bene = $dato[4]->registro5;
            $bene->pais_bene = $dato[5]->registro6;
            $bene->participacion = $dato[6]->registro7;

            $bene->save();
        }

         //tabla formularios
         $formu = new Formularios();
         $formu->numero_form = '1';
         $formu->lugar_firma = $request['firma'];
         $formu->fecha_decla = Carbon::now()->toDateString();
         $formu->tipo_formulario_id = '1';
         $formu->save();


           //tabla declaJuridicos

           $declaJuri = new DeclaJuridicos();
           $declaJuri->rut_declaJ = $request['rut'];
           $declaJuri->razon_social = $request['razon_social'];
           $declaJuri->domi_declaJ = $request['domicilio'];
           $declaJuri->ciu_declaJ = $request['ciudad'];
           $declaJuri->pais_const = $request['pais_const'];
           $declaJuri->telefono = $request['telefono'];
           $declaJuri->rep_rut = $request['rep_rut'];
           $declaJuri->rep_nombre = $request['rep_nom'];
           $declaJuri->tipo_entidad = $request['tipo_entidad'];
           $declaJuri->save();

           //tabla juriform
            //consulta de los id de las tablas a relacionar formularios y decla_juridicos
           $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
           $idF = DB::table('Formularios')->where('numero_form', '1')->get()->first();

           $juriform = new JuriForm();
           $juriform->decla_juridicos_id = $idJ->id;
           $juriform->formularios_id = $idF->id;
           $juriform->save();

           //tabla decla naturales

           $declaNatu = new DeclaNaturales();
           $declaNatu->rut_declaN = $request['rutD'];
           $declaNatu->nombres_declaN = $request['nombreD'];
           $declaNatu->apel_pat_declaN = $request['apelP'];
           $declaNatu->apel_mat_declaN = $request['apelM'];
           $declaNatu->origen = $request['lugarOrigen'];
           $declaNatu->relacion_juridica = $request['relacion'];
           $declaNatu->save();

           //tabla beneficios juridicos

           foreach($datos as $dato){
            $idB = DB::table('beneficiarios')->where('rut_bene', $dato[0]->registro1)->get()->first();
           }
           $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();

           $beneJuri = new BeneficioJuridico();
           $beneJuri->decla_juridicos_id = $idJ->id;
           $beneJuri->beneficiarios_id = $idB->id;
           $beneJuri->save();

           //tabla juridico natural
           $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
           $idN = DB::table('decla_naturales')->where('rut_declaN', $request['rutD'])->get()->first();

           $juriNatu = new JuridicoNatural();
           $juriNatu->decla_juridicos_id = $idJ->id;
           $juriNatu->decla_naturales_id = $idN->id;
           $juriNatu->save();

           $beneficiarios = DB::table('beneficiarios')
           ->join('beneficio_juridico', 'beneficiarios.id', '=', 'beneficio_juridico.beneficiarios_id')
           ->join('decla_juridicos', 'beneficio_juridico.decla_juridicos_id', '=', 'decla_juridicos.id')
           ->join('juri_form', 'decla_juridicos.id', '=', 'juri_form.decla_juridicos_id')
           ->join('formularios', 'juri_form.formularios_id', '=', 'formularios.id')
           ->get();

           //tabla estructuras juridicas
           foreach($notas as $nota){

            $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
            $estruJuridica = new EstructuraJuridicas();

            $estruJuridica->rut_numero_gerencia = $nota[0]->anotacion1;
            $estruJuridica->nombre = $nota[1]->anotacion2;
            $estruJuridica->cargo = $nota[2]->anotacion3;
            $estruJuridica->decla_juridico_id = $idJ->id;
            $estruJuridica->save();
         }

       $declaJuri = Beneficiarios::join('beneficio_juridico', 'beneficiarios.id', '=', 'beneficio_juridico.beneficiarios_id')->get();
       $mensaje = 'registro guardado exitosamente';
       return view('formulario', compact('mensaje'));
    }

    public function store(Request $request)
    {

        //rescatar los datos de la vista del formulario por medio de un request

        //$data = json_decode($_POST('inputarray'));
        //datos de la persona juridica

        try {

            $rules = [
                'rut_bene' => 'required|max:12',
                'nombres' => 'required|min:3|max:40',
                'apellidos_bene' => 'required|max:40',
                'domi_bene' => 'required|min:3|max:25',
                'ciu_bene' => 'required|max:40',
                'pais_bene' => 'required|min:3|max:25',
                'participacion' => 'required|numeric|min:1|max:3',
            ];

            $this->validate($request, $rules);
            //tabla beneficiarios
            $bene = new Beneficiarios();

            $bene->rut_bene = $request->input('cedulaBF');
            $bene->nombres_bene = $request->input('nombresBF');
            $bene->apellidos_bene = $request->input('apellidosBF');
            $bene->domi_bene = $request->input('domicilioBF');
            $bene->ciu_bene = $request->input('ciudadBF');
            $bene->pais_bene = $request->input('paisBF');
            $bene->participacion = $request->input('porcentaje');
            $bene->rut_bene = $request->

            $bene->save();

            return back()->with('status', 'Datos cargados correctamente');

        } /*catch(Exception $e){

        $mensaje = 'Error al registrar, verifique datos!';
        return view('formulario', compact('mensaje'));
         */
         catch (\Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));

        }

        try {
            //tabla formularios
            $formu = new Formularios();
            $formu->numero_form = '1';
            $formu->lugar_firma = $request['firma'];
            $formu->fecha_decla = Carbon::now()->toDateString();
            $formu->tipo_formulario_id = '1';
            $formu->save();

        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            //tabla declaJuridicos

            $declaJuri = new DeclaJuridicos();
            $declaJuri->rut_declaJ = $request['rut'];
            $declaJuri->razon_social = $request['razon_social'];
            $declaJuri->domi_declaJ = $request['domicilio'];
            $declaJuri->ciu_declaJ = $request['ciudad'];
            $declaJuri->pais_const = $request['pais_const'];
            $declaJuri->telefono = $request['telefono'];
            $declaJuri->rep_rut = $request['rep_rut'];
            $declaJuri->rep_nombre = $request['rep_nom'];
            $declaJuri->tipo_entidad = $request['tipo_entidad'];
            $declaJuri->save();
        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            //tabla juriform
            //consulta de los id de las tablas a relacionar formularios y decla_juridicos
            $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
            $idF = DB::table('Formularios')->where('numero_form', '1')->get()->first();
            $juriform = new JuriForm();
            $juriform->decla_juridicos_id = $idJ->id;
            $juriform->formularios_id = $idF->id;
            $juriform->save();

        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            //tabla decla naturales

            $declaNatu = new DeclaNaturales();
            $declaNatu->rut_declaN = $request['rutD'];
            $declaNatu->nombres_declaN = $request['nombreD'];
            $declaNatu->apel_pat_declaN = $request['apelP'];
            $declaNatu->apel_mat_declaN = $request['apelM'];
            $declaNatu->origen = $request['lugarOrigen'];
            $declaNatu->relacion_juridica = $request['relacion'];
            $declaNatu->save();
        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            //tabla beneficios juridicos
            $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
            $idB = DB::table('beneficiarios')->where('rut_bene', $request['cedulaBF'])->get()->first();

            $beneJuri = new BeneficioJuridico();
            $beneJuri->decla_juridicos_id = $idJ->id;
            $beneJuri->beneficiarios_id = $idB->id;
            $beneJuri->save();
        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            //tabla juridico natural
            $idJ = DB::table('decla_juridicos')->where('rut_declaJ', $request['rut'])->get()->first();
            $idN = DB::table('decla_naturales')->where('rut_declaN', $request['rutD'])->get()->first();

            $juriNatu = new JuridicoNatural();
            $juriNatu->decla_juridicos_id = $idJ->id;
            $juriNatu->decla_naturales_id = $idN->id;
            $juriNatu->save();
        } catch (Exception $e) {
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact($e, 'mensaje'));
        }

        try {
            $beneficiarios = DB::table('beneficiarios')
                ->join('beneficio_juridico', 'beneficiarios.id', '=', 'beneficio_juridico.beneficiarios_id')
                ->join('decla_juridicos', 'beneficio_juridico.decla_juridicos_id', '=', 'decla_juridicos.id')
                ->join('juri_form', 'decla_juridicos.id', '=', 'juri_form.decla_juridicos_id')
                ->join('formularios', 'juri_form.formularios_id', '=', 'formularios.id')
                ->get();

            $declaJuri = Beneficiarios::join('beneficio_juridico', 'beneficiarios.id', '=', 'beneficio_juridico.beneficiarios_id')->get();
            $mensaje = 'registro guardado exitosamente';
            return view('formulario', compact('mensaje'));

        } catch (Exception $e) {

            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact('mensaje'));
        }

        try{

            //tabla estructuras juridicas

            $estruJuridica = new EstructuraJuridicas();
            $estruJuridica->rutGerencia = $request['rut_numero_gerencia'];
            $estruJuridica->nombre = $request['nombre'];
            $estruJuridica->cargo = $request['cargo'];
            $estruJuridica->decla_juridico_id = $idJ->id;
            $estruJuridica->save();
        } catch(Exception $e){
            $mensaje = 'Error al registrar, verifique datos!';
            return view('formulario', compact('mensaje'));
        }
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
}
