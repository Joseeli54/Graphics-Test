<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $porc_pago = $this->porcentaje_pago();

        return view('graphics.report', compact('porc_pago'));
    }

    public function porcentaje_pago(){

        $cantidad_debito = $this->cantidad_debito();
        $cantidad_credito = $this->cantidad_credito();
        $cantidad_efectivo = $this->cantidad_efectivo();
        $cantidad_paypal = $this->cantidad_paypal();

        $porcentaje_debito = ( $cantidad_debito / ($cantidad_debito + $cantidad_credito + $cantidad_efectivo + $cantidad_paypal))*100;
        $porcentaje_credito = ( $cantidad_credito / ($cantidad_credito+$cantidad_debito+$cantidad_efectivo+ $cantidad_paypal))*100;
        $porcentaje_efectivo = ($cantidad_efectivo / ($cantidad_efectivo+$cantidad_credito+ $cantidad_debito+ $cantidad_paypal))*100;
        $porcentaje_paypal = ( $cantidad_paypal / ($cantidad_paypal+$cantidad_credito+ $cantidad_efectivo+ $cantidad_debito))*100;

        //$arreglo_porcentajes = array( $porcentaje_debito,  $porcentaje_credito, $porcentaje_efectivo, $porcentaje_paypal);

        $objeto = (object)["debito"=>$porcentaje_debito, "credito"=>$porcentaje_credito,
                           "efectivo"=>$porcentaje_efectivo, "paypal"=>$porcentaje_paypal]; #variable objeto

        return $objeto;
    }

    public function cantidad_debito(){
        
        $cantidad_deb = 
        \DB::select(DB::raw("SELECT count(*) from pago p, pedido pe, usuario u, debito d where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and d.cod = p.fk_debito;"));
        foreach ($cantidad_deb as $deb);

        return $deb->count;
    }

    public function cantidad_credito(){
        
        $cantidad_cred = 
        \DB::select(DB::raw("SELECT count(*) from pago p, pedido pe, usuario u, credito c where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and c.cod = p.fk_credito;"));
        foreach ($cantidad_cred as $cred);

        return $cred->count;
    }

     public function cantidad_efectivo(){
        
        $cantidad_efect = 
        \DB::select(DB::raw("SELECT count(*) from pago p, pedido pe, usuario u, efectivo e  where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and e.cod = p.fk_efectivo;"));
        foreach ($cantidad_efect as $efect);

        return $efect->count;
    }

     public function cantidad_paypal(){
        
        $cantidad_pay = 
        \DB::select(DB::raw("SELECT count(*) from pago p, pedido pe, usuario u, paypal pa where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and pa.cod = p.fk_paypal;"));
        foreach ($cantidad_pay as $pay);
        
        return $pay->count;
    }
}
