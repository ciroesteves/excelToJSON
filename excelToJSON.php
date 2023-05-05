<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$arquivo = 'planilha.xlsx';
$spreadsheet = IOFactory::load($arquivo);
$pagina = $spreadsheet->getActiveSheet();
$qtd_linhas = $pagina->getHighestRow();
$qtd_colunas = $pagina->getHighestColumn();
$dados = array();

$header = $pagina->rangeToArray('A1:' . $qtd_colunas . '1', null, true, false)[0];

for ($linha = 2; $linha <= $qtd_linhas; $linha++) {
    $dados_linha = $pagina->rangeToArray('A' . $linha . ':' . $qtd_colunas . $linha, null, true, false)[0];
    $campo = array_combine($header, $dados_linha);
    $dados[] = $campo;
}

$json = json_encode($dados);
echo $json;
?>