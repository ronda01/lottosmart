<?php header("Content-type: text/html; charset=utf-8");





// CALCULO DAS APOSTAS

// PEGANDO ULTIMO SORTEIO


$todosSorteios = [];
// $nSorteios = 7; // os n ultimos sorteios

//N = -13; 
//$nSorteios = -13;

$pesquisa = json_decode(file_get_contents("json/lotofacil.txt"),true);
$registro = $pesquisa["sorteios"];

// $registro = end($pesquisa["sorteios"]);

foreach($registro as $item) { //foreach element in $arr

	


    $strMatrizDezenasSorteio = $item['matrizDezenas']; //etc
	$concurso = $item['sorteio'];
	$strData = $item['data'];
	$dataSorteio = date('d/m/Y', strtotime($strData));

    $sorteio = [];
    for($i=0; $i<=28; $i+=2){
        $dez = substr($strMatrizDezenasSorteio, $i, 2);
        $dezInt = intval($dez);
        array_push($sorteio, $dezInt);
    }

    array_push($todosSorteios, $sorteio);


}



$sorteioAtual = $todosSorteios[count($todosSorteios)-1];
$sorteioAnterior = $todosSorteios[count($todosSorteios)-2];


// $varJson = "{\"resultados\" :[";
$varJson = "{\"resultado\" : \"";


$varJson .= printResultado($sorteioAtual, $sorteioAnterior, $concurso, $dataSorteio);

$varJson .= "\"}";

print_r($varJson); 




// PEGANDO APOSTAS




// FUNCTIONS



function printResultado($sorteioAtual, $sorteioAnterior, $concurso, $dataSorteio) {
	
	// var_dump($sorteioAtual);
 //    die;

	$pares = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24];
	
	$repetidas = count(array_intersect($sorteioAtual, $sorteioAnterior));
	
	$qPares = count(array_intersect($sorteioAtual, $pares));
	
	$qImpares = 15-$qPares;
	
	
	$L1 = [1, 2, 3, 4, 5];
    $L2 = [6, 7, 8, 9, 10];
    $L3 = [11, 12, 13, 14, 15];
    $L4 = [16, 17, 18, 19, 20];
    $L5 = [21, 22, 23, 24, 25];

    $C1 = [1, 6, 11, 16, 21];
    $C2 = [2, 7, 12, 17, 22];
    $C3 = [3, 8, 13, 18, 23];
    $C4 = [4, 9, 14, 19, 24];
    $C5 = [5, 10, 15, 20, 25];
	
	$qLinha1 = count(array_intersect($sorteioAtual, $L1));
    $qLinha2 = count(array_intersect($sorteioAtual, $L2));
    $qLinha3 = count(array_intersect($sorteioAtual, $L3));
    $qLinha4 = count(array_intersect($sorteioAtual, $L4));
    $qLinha5 = count(array_intersect($sorteioAtual, $L5));

    $linhas = $qLinha1.$qLinha2.$qLinha3.$qLinha4.$qLinha5;

    $qColuna1 = count(array_intersect($sorteioAtual, $C1));
    $qColuna2 = count(array_intersect($sorteioAtual, $C2));
    $qColuna3 = count(array_intersect($sorteioAtual, $C3));
    $qColuna4 = count(array_intersect($sorteioAtual, $C4));
    $qColuna5 = count(array_intersect($sorteioAtual, $C5));

    $colunas = $qColuna1.$qColuna2.$qColuna3.$qColuna4.$qColuna5;
	
	$resultado = "<div class='column'>";
	$resultado .=  "SORTEIO Nº ".$concurso." ".$dataSorteio;
    $resultado .=  "<br />";
	$resultado .=  "<br />";
    $resultado .=  "<table style='width: 80%'>";
	

	
	
	$r=0;
    $n=1;
    for ($i=$r;$i<5;$i++) {

        $d=0;
        $resultado .= "<tr>";

        for ($j=$d;$j<5;$j++) {


            //$d = $j+1;
            $w = ($n < 10 ? "0".$n : $n);


            if(in_array($n, $sorteioAtual)) {
                if(in_array($n, $sorteioAnterior)) {
                    $estilo = "#58ACFA";
                }	
                else {
                    $estilo = "orange";
                }
            }	

            else {
                $estilo = "white";
            }



            //$estilo = (in_array($n, $volante) ? 'orange' : 'white');
            $resultado .= "    <td style='text-align: center; width: 20px; height: 20px; padding: 4px; border: 2px solid #E9E9E9; background-color: ".$estilo."'>".$w."</td>";
            //echo $k." <br />\n"; // Teste
            $n+=1;
        }
        $resultado .= "</tr>";
    }
	

    $resultado .=  "</table>";
	// $resultado .=  "<br />";
	// $resultado .=  "Soma: ".$soma;
 //    $resultado .=  "<br />";
	$resultado .=  "Repetidas: ".$repetidas;
    $resultado .=  "<br />";
	$resultado .=  "Par/Impares: ".$qPares."/".$qImpares;
	$resultado .=  "<br />";
	
    
	$resultado .=  "</div>";

	return $resultado;
	

}


?>

