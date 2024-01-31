<?php

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder{

    public function days_in_month($month, $year){
        // calculate number of days in a month
            return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }
        
    public function run(){
        $meses = 12;  
        
        $dias_semana = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
        
        for($m = 1; $m <= $meses; $m++){     
            $dias_mes[$m] = cal_days_in_month(CAL_GREGORIAN, $m, Date("Y"));
           
            //$dias_mes[$m] = $this->days_in_month($m, Date("Y"));              

            for($d = 1; $d <= $dias_mes[$m]; $d++){

                $dia = Date("Y")."-".$m."-".$d;
                if(Horario::where("dia", $dia)->count() == 0){
                   
                    $dia_semana_numero = date("w", strtotime($dia));
                    $dSemana =  $dias_semana[$dia_semana_numero];
                    
                    Horario::create([
                        "dia" => $dia
                        ,"dia_semana" => $dSemana
                        ,"user_id" => 1
                        ,"emp" => "SMIT – Trasmontano"

                    ]); 
                    
                }
            }
            
        }
    }
}
