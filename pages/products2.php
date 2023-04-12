<?php

//include 'index.php';
// URL real: http://192.168.1.34/gs1_ia/001/gs1/01/00000000020325?11=230411&17=230413&3922=000140&3952=002690

// Recupera a numeração de 001 a 011
$codLoja = substr($_SERVER['REQUEST_URI'], 8, 3);

switch ($codLoja) {
    case '001':
        $textoLoja = "Loja 001 - Matriz - Campo Mourão";
        break;
    case '002':
        $textoLoja = "Loja 002 - Ivaiporã";
        break;
    case '003':
        $textoLoja = "Loja 003 - Max - Campo Mourão";
        break;
    case '004':
        $textoLoja = "Loja 004 - Centro de Distribuição - Campo Mourão";
        break;
    case '005':
        $textoLoja = "Loja 005 - Família - Campo Mourão";
        break;
    case '006':
        $textoLoja = "Loja 006 - Atacadista Ivaiporã";
        break;
    case '007':
        $textoLoja = "Loja 007 - Cianorte";
        break;
    case '008':
        $textoLoja = "Loja 008 - Goioerê";
        break;
    case '009':
        $textoLoja = "Loja 009 - Pitanga";
        break;
    case '010':
        $textoLoja = "Loja 010 - Atacadista - Campo Mourão";
        break;
    case '011':
        $textoLoja = "Loja 011 - Assis Sorriso - Assis Chateaubriand";
        break;
}

// Recupera a numeração do EAN
$ean = substr($_SERVER['REQUEST_URI'], 19, 14);

// Recupera os parâmetros da query string
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $params);

// Função para associar os dados dos parâmetros
function getParamData($key, $data)
{
    switch ($key) {
            // Data/Prazo do Produto
        case '11':
            echo '<strong> Data de Produção: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;
        case '12':
            echo '<strong> Data de Vencimento: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;
        case '13':
            echo '<strong> Data de Embalagem: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;
        case '15':
            echo '<strong> Data de Durabilidade Mínima: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;
        case '16':
            echo '<strong> Prazo de Validade: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;
        case '17':
            echo '<strong> Prazo de Durabilidade Máxima: </strong>';
            echo substr($data, 4, 2) . '/' .
                substr($data, 2, 2) . '/20' .
                substr($data, 0, 2) . '<br>';
            break;

            // Peso/Quantidade
        case '30': //quantidade
            echo '<strong> Quantidade: </strong>';
            echo $data . ' un<br>';
            break;
        case '3103': //peso líquido
            echo '<strong> Peso líquido: </strong>';
            $peso = ltrim($data, '0');
            $peso = number_format($peso / 1000, 3, ',', '') . ' kg<br>';
            echo $peso;
            break;
        case '3303': //peso bruto
            break;
            echo '<strong> Peso bruto: </strong>';
            $peso = ltrim($data, '0');
            $peso = number_format($peso / 1000, 3, ',', '') . ' kg<br>';
            echo $peso;

            // Valor Total
        case '3922':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br>';
            echo $valor;
            break;
        case '3921':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br>';
            echo $valor;
            break;
        case '3920':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . $valor . ',00<br>';
            echo $valor;
            break;
        case '3932':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br>';
            echo $valor;
            break;
        case '3931':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br>';
            echo $valor;
            break;
        case '3930':
            echo '<strong> Valor Total: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . $valor . ',00<br>';
            echo $valor;
            break;

            // Valor por Kg/Un
        case '3952':
            echo '<strong> Valor por Kg/Un: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br>';
            echo $valor;
            break;
        case '3952':
            echo '<strong> Valor por Kg/Un: </strong>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br>';
            echo $valor;
            break;
        case '3952':
            echo '<td><strong> Valor por Kg/Un: </strong></td>';
            $valor = ltrim($data, '0');
            $valor = 'R$ ' . $valor . ',00<br>';
            echo $valor;
            break;

        default:
            echo '<strong> Erro ao ler informação: </strong>';
            echo $key . ' - ' . $data;
            break;
    }
}

?>
<table class="table-info" style="background-color: grey;">
    <thead>
        <tr>
            <th>
                <h4>Dados Cadastrais</h4>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <strong>EAN</strong>
        </tr>
        <tr>
            <?php
            echo $ean
            ?>
        </tr>
    </tbody>
</table>

<table class="table-data" style="background-color: lightgrey;">
    <thead>
        <tr>
            <th>
                <h4>Informações Adicionais</h4>
            </th>
        </tr>
    </thead>
    <tbody>

<?php
foreach ($params as $key => $data) {
    echo '<tr><td><b>';
    getParamData($key, $data);
    echo '</b></td></tr>';
}
?>

    </tbody>
</table>
<?php

echo '<br><br><br>';
/*
// Data/Prazo do produto
// 11 => Data de Produção (AAMMDD)
// 12 => Data de Vencimento (AAMMDD)
// 13 => Data de Embalagem (AAMMDD)
// 15 => Data de durabilidade mínima (AAMMDD)
// 16 => Prazo de Validade (AAMMDD)
// 17 => Data de Durabilidade máxima (AAMMDD)

// Peso/Quantidade
// 30       => Quantidade
// 310(n)   => Peso Líquido
// 330(n)   => Peso Bruto

// Quantia a pagar por item comercial de medida variável
// Unidade Monetária Única : AI (392n)
// 3922 => 1234567  => 12345.67     => Valor Total
// 3921 => 1234567  => 123456.70
// 3920 => 12345    => 12345.00

// Quantia a pagar por item comercial de medida variável
// Com código ISO da moeda corrente : AI (393n)
// 3932 => 1234567  => 12345.67
// 3931 => 1234567  => 123456.70
// 3930 => 12345    => 12345.00

// 3952 => 1234567  => 12345.67     => Preço por Kg/Un
// 3951 => 1234567  => 123456.70
// 3950 => 12345    => 12345.00
*/

/*
echo "$textoLoja<br>";
echo "EAN: $ean<br>";
echo "Parâmetro 11: $param11<br>";
echo "Parâmetro 17: $param17<br>";
echo "Parâmetro 3922: $param3922<br>";
echo "Parâmetro 3952: $param3952<br>";

echo '<br><br>';
*/

?>
