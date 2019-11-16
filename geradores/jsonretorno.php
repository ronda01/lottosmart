<?php header("Content-type: text/plain; charset=utf-8; Access-Control-Allow-Origin: *");

// $tipo = "lotofacilUltimo";

// $tipoConsulta = "lotofacilUltimo";
$tipoConsulta = $_REQUEST['tipo'];



if($tipoConsulta == "megasena1") {
    $pesquisa = json_decode(file_get_contents("json/megasena.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}

elseif($tipoConsulta == "lotofacil1") {
    $pesquisa = json_decode(file_get_contents("json/lotofacil.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
elseif($tipoConsulta == "quina1") {
    $pesquisa = json_decode(file_get_contents("json/quina.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
elseif($tipoConsulta == "lotomania1") {
    $pesquisa = json_decode(file_get_contents("json/lotomania.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
elseif($tipoConsulta == "timemania1") {
    $pesquisa = json_decode(file_get_contents("json/timemania.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
elseif($tipoConsulta == "duplasena1") {
    $pesquisa = json_decode(file_get_contents("json/duplasena.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
elseif($tipoConsulta == "diadesorte1") {
    $pesquisa = json_decode(file_get_contents("json/diadesorte.txt"),true);
    $registros = json_encode(end($pesquisa["sorteios"]));
    echo $registros;
}
else {

}

?>