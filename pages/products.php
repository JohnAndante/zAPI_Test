<?php
// URL real: http://seusite.com/001/dl/gs1/01/00000000020725?11=230411&17=230413&3922=000140&3952=002690

// Recupera a numeração de 001 a 011
$codLoja = substr($_SERVER['REQUEST_URI'], 11, 3);

// URL do site de origem
$url = "https://www.cloudprix.com.br/" . substr($_SERVER['REQUEST_URI'], 15);
// Obtém o conteúdo HTML da página
$html = file_get_contents($url);

// Cria o objeto DOM
$dom = new DOMDocument();

// Carrega o conteúdo HTML no objeto DOM
libxml_use_internal_errors(true); // suprime erros de carregamento
$dom->loadHTML($html);
libxml_clear_errors(); // limpa erros de carregamento

// Extrai informações da tabela

$tables = $dom->getElementsByTagName('table');
echo "<p>$codLoja</p>";
foreach ($tables as $table) {
    $thead = $table->getElementsByTagName('thead')->item(0);
    $h4 = $thead->getElementsByTagName('h4')->item(0);
    $table_title = $h4->textContent;

    echo "<h2>$table_title</h2>";

    $tbody = $table->getElementsByTagName('tbody')->item(0);
    $rows = $tbody->getElementsByTagName('tr');

    foreach ($rows as $row) {
        $cols = $row->getElementsByTagName('td');

        // Verifica se a linha possui as duas informações esperadas
        if ($cols->length == 2) {
            $col1 = $cols->item(0)->textContent;
            $col2 = $cols->item(1)->textContent;

            echo "<p>$col1: $col2</p>";
        }
    }
}

?>
