<?php

namespace App\Http\Controllers\Horario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Http\Requests\Horario\HorarioRequest;
use Auth;

class HorarioCtrl extends Controller{
    
    public function days_in_month($month, $year){
    // calculate number of days in a month
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    public function index_tras($mes_select = null){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
         
        if(isset($mes_select)) $nmonth = $mes_select;         
        else $nmonth = date('m'); 

        $horarios = Horario::where("user_id", Auth::User()->id)->whereMonth("dia", $nmonth)->whereYear("dia", '=', Date("Y"))->get();  
            
        if($horarios->isEmpty()){
            $this->create_horario();
            $horarios = Horario::where("user_id", Auth::User()->id)->whereMonth("dia", Date("m"))->whereYear("dia", '=', Date("Y"))->get(); 
        }
      
        $dt_marcacao = $this->formatDate(Date("Y-m-d"));                
        
        foreach($horarios as $h) {           
        
            $h->entrada = $h->entrada != "" ? date("H:i", strtotime($h->entrada)) : "";
            $h->saida =  $h->saida != "" ?  date("H:i", strtotime($h->saida)) : "";
            $h->aEntrada =  $h->aEntrada != "" ? date("H:i", strtotime($h->aEntrada)) : "";
            $h->aSaida =  $h->aSaida != "" ? date("H:i", strtotime($h->aSaida)) : "";
            $h->heEntrada =  $h->heEntrada != "" ? date("H:i", strtotime($h->heEntrada)) : "";
            $h->heSaida =   $h->heSaida != "" ? date("H:i", strtotime($h->heSaida)) : "";
 
            //  $h->entrada = $h->entrada == "" && $h->livre == "s" ? "Feriado" : $h->entrada; 
            //  $h->saida =  $h->saida == "" && $h->livre == "s" ? "Feriado" : $h->saida;
            //  $h->aEntrada =  $h->aEntrada == "" && $h->livre == "s" ? "Feriado" : $h->aEntrada;
            //  $h->aSaida =  $h->aSaida == "" && $h->livre == "s" ? "Feriado" : $h->aSaida;
            //  $h->heEntrada =  $h->heEntrada == "" && $h->livre == "s" ? "Feriado" : $h->heEntrada;
            //  $h->heSaida =   $h->heSaida == "" && $h->livre == "s" ? "Feriado" : $h->heSaida;
             
            $h->dia = $this->formatDate($h->dia);
 
            if($h->dia == $dt_marcacao) $h->marcar = true;
            else $h->marcar = false;         
        
         } 
      
         $meses_pt = $this->meses_pt();
         $mes_atual = $meses_pt[$nmonth];
 
         $dias_semana = $this->dias_semana();

         $nday = date('w', strtotime(Date('dd')));
    
         $dia_atual = $dias_semana[$nday];
                     
         $dia_atual = ucfirst(strftime($dia_atual.", %d de ".$mes_atual. " de %Y", strtotime('today')));

         $nEmpresa = $horarios[0]->emp;         
                 
         return view("admin.horarios.index", compact("horarios"))->with(["mes_atual" => $mes_atual
         , "dia_atual" => $dia_atual, "nEmpresa" => $nEmpresa]);

    }

    public function edit($id, $dia){

        $auth = Auth::User();       

        $horario = Horario::find($id);

        if($auth->id != $horario->user_id) 
            return response()->json(["Unauthorized"]);

        $dia = $this->formatDate($dia);
        
        $horario->entrada = $horario->entrada != "" ? date("H:i", strtotime($horario->entrada)) : "";
        $horario->saida =  $horario->saida != "" ?  date("H:i", strtotime($horario->saida)) : "";
        $horario->aEntrada =  $horario->aEntrada != "" ? date("H:i", strtotime($horario->aEntrada)) : "";
        $horario->aSaida =  $horario->aSaida != "" ? date("H:i", strtotime($horario->aSaida)) : "";
        $horario->heEntrada =  $horario->heEntrada != "" ? date("H:i", strtotime($horario->heEntrada)) : "";
        $horario->heSaida =  $horario->heSaida != "" ? date("H:i", strtotime($horario->heSaida)) : "";
                

        //$intervalo = $this->intervalo($horario->entrada, $horario->saida);


        //dd($intervalo);

        return view("admin.horarios.edit", compact("horario"))->with(["dia" => $dia]);   

    }
    
    private function formatDate($date){
        
        $date = date("d-m-Y", strtotime($date));        
        $date = str_replace("-", "/", $date);        
        
        return $date;
    }


    public function update(HorarioRequest $request, $id){

        $auth = Auth::User();
        
        $data = $request->all();
        $horario = Horario::find($id);

        if($auth->id != $horario->user_id) 
            return response()->json(["Unauthorized"]);

        $horario->update($data);
        return redirect()->route("horario.tras.index")->with("updated", true);

    }


    private function create_horario(){   
             
        $meses = 12;  
        
        $dias_semana = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
        
        for($m = 1; $m <= $meses; $m++){  
            $dias_mes[$m] = cal_days_in_month(CAL_GREGORIAN, $m, Date("Y"));
            //$dias_mes[$m] = $this->days_in_month($m, Date("Y"));
           
            for($d = 1; $d <= $dias_mes[$m]; $d++){
            
                $dia = Date("Y")."-".$m."-".$d;
                
                if(Horario::where("user_id", Auth::User()->id)->where("dia", $dia)->count() == 0){
                 
                    $dia_semana_numero = date("w", strtotime($dia));
                    $dSemana =  $dias_semana[$dia_semana_numero];
                    
                    Horario::create([
                        "dia" => $dia
                        ,"dia_semana" => $dSemana
                        ,"user_id" => Auth::User()->id
                        ,"emp" => "SMIT – Trasmontano"

                    ]); 
                    
                }
            }
            
        }
    }
    private function dias_semana(){
        $dias_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        return $dias_semana;
    }

    private function meses_pt(){

        $meses_pt["01"] = "Janeiro";
        $meses_pt["02"] = "Fevereiro";
        $meses_pt["03"] = "Março";
        $meses_pt["04"] = "Abril";
        $meses_pt["05"] = "Maio";
        $meses_pt["06"] = "Junho";
        $meses_pt["07"] = "Julho";
        $meses_pt["08"] = "Agosto";
        $meses_pt["09"] = "Setembro";
        $meses_pt["10"] = "Outubro";
        $meses_pt["11"] = "Novembro";
        $meses_pt["12"] = "Dezembro";

        return $meses_pt;
    }
     

    function intervalo( $entrada, $saida ) {
        $entrada = explode( ':', $entrada );
        $saida   = explode( ':', $saida );
        $minutos = ( $saida[0] - $entrada[0] ) * 60 + $saida[1] - $entrada[1];
        
        if( $minutos < 0 ) $minutos += 24 * 60;
            return $minutos;
     }
}
