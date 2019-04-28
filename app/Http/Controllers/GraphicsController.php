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
        $prom_monto_pedido = $this->promedio_montos_por_pedido();

        return view('graphics.report')->with('porc_pago',$porc_pago)->with('prom_monto_pedido',$prom_monto_pedido);
    }

    public function porcentaje_pago(){

        $division_por_metodo = $this->cantidad_cliente_por_tipo();
        $total_pedido = 
        \DB::select(DB::raw("SELECT count(*)
                             from pago p, pedido pe, usuario u, metodo_pago pa
                             where pe.fk_usuario = u.cod and
                             p.fk_pedido = pe.id and
                             p.fk_metodo = pa.cod"));
        foreach($total_pedido as $total);

        foreach ($division_por_metodo as $dm){
            $dm->count = ($dm->count/$total->count)*100;
        }

        return $division_por_metodo;
    }
    
    public function promedio_montos_por_pedido(){

        $suma_por_pedido = $this->suma_montos_por_pedido();

        foreach ($suma_por_pedido as $sp){
            $sp->sum = $sp->sum/$sp->count;
        }
        
         return $suma_por_pedido;
    }

    public function cantidad_cliente_por_tipo(){
        
        $cant_cliente_por_tipo = 
        \DB::select(DB::raw("SELECT pa.tipo_pago,count(*)
                             from pago p, pedido pe, usuario u, metodo_pago pa
                             where pe.fk_usuario = u.cod and
                             p.fk_pedido = pe.id and
                             p.fk_metodo = pa.cod
                             group by pa.tipo_pago;"));

        return $cant_cliente_por_tipo;
    }

    public function suma_montos_por_pedido(){
      
        $sum_montos_por_pedido = 
        \DB::select(DB::raw("SELECT pe.tipo,sum(pa.monto),count(*)
                             from pedido pe, pago pa, usuario u
                             where pe.fk_usuario = u.cod and
                                   pa.fk_pedido = pe.id
                             group by pe.tipo;"));

        return $sum_montos_por_pedido;
    }
}
