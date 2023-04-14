<?php

    // include '../index.php';
    include '../config.php';
    include '../header.php';

?>

<main>
    <div class="grid">
        <div class="coluna main-content">

<?php
    // URL real: http://192.168.1.34/gs1_ia/001/01/00000000020725?11=230412&17=230414&3103=000212&3922=000570&3952=002690&3303=000502

    $cnpjURL = $_GET['cnpj'];
    $eanURL = $_GET['ean'];
    $dataURL = $_GET['data'];

    // Recupera a numeração de 001 a 011
    $cnpj = $cnpjURL;

    /*
    switch ($cnpj) {
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
    */

    // Recupera a numeração do EAN
    $ean = $dataURL;

    // Recupera os parâmetros da query string
    $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    parse_str($query, $params);

    // Função para associar os dados dos parâmetros
    function getParamData($key, $data)
    {
        switch ($key) {
                // Data/Prazo do Produto
            case '11':
                echo '<td><strong> Data de Produção: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;
            case '12':
                echo '<td><strong> Data de Vencimento: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;
            case '13':
                echo '<td><strong> Data de Embalagem: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;
            case '15':
                echo '<td><strong> Data de Durabilidade Mínima: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;
            case '16':
                echo '<td><strong> Prazo de Validade: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;
            case '17':
                echo '<td><strong> Prazo de Durabilidade Máxima: </strong></td>';
                echo '<td>';
                echo substr($data, 4, 2) . '/' .
                    substr($data, 2, 2) . '/20' .
                    substr($data, 0, 2) . '<br></td>';
                break;

                // Peso/Quantidade
            case '30': //quantidade
                echo '<td><strong> Quantidade: </strong></td>';
                echo '<td>';
                echo $data . ' un<br></td>';
                break;
            case '3103': //peso líquido
                echo '<td><strong> Peso líquido: </strong></td>';
                echo '<td>';
                $peso = ltrim($data, '0');
                $peso = number_format($peso / 1000, 3, ',', '') . ' kg<br></td>';
                echo $peso;
                break;
            case '3303': //peso bruto
                break;
                echo '<td><strong> Peso bruto: </strong></td>';
                echo '<td>';
                $peso = ltrim($data, '0');
                $peso = number_format($peso / 1000, 3, ',', '') . ' kg<br></td>';
                echo $peso;

                // Valor Total
            case '3922':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br></td>';
                echo $valor;
                break;
            case '3921':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br></td>';
                echo $valor;
                break;
            case '3920':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . $valor . ',00<br></td>';
                echo $valor;
                break;
            case '3932':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br></td>';
                echo $valor;
                break;
            case '3931':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br></td>';
                echo $valor;
                break;
            case '3930':
                echo '<td><strong> Valor Total: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . $valor . ',00<br></td>';
                echo $valor;
                break;

                // Valor por Kg/Un
            case '3952':
                echo '<td><strong> Valor por Kg/Un: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 100, 2, ',', '') . '<br></td>';
                echo $valor;
                break;
            case '3952':
                echo '<td><strong> Valor por Kg/Un: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . number_format($valor / 10, 1, ',', '') . '0<br></td>';
                echo $valor;
                break;
            case '3952':
                echo '<td><strong> Valor por Kg/Un: </strong></td>';
                echo '<td>';
                $valor = ltrim($data, '0');
                $valor = 'R$ ' . $valor . ',00<br></td>';
                echo $valor;
                break;

            default:
                echo '<td><strong> Erro ao ler informação: </strong></td>';
                echo '<td>';
                echo $key . ' - ' . $data . '</td>';
                break;
        }
    }

?>

<table class="table table-info">
    <thead>
        <tr>
            <th colspan="2">
                <h4>Dados Cadastrais</h4>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <strong>EAN</strong>
            </td>
            <td>
                <?php
                    echo $ean
                ?>
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-data">
    <thead>
        <tr>
            <th colspan="2">
                <h4>Informações Adicionais</h4>
            </th>
        </tr>
    </thead>
    <tbody>

    <?php
        foreach ($params as $key => $data) {
            echo '<tr>';
            getParamData($key, $data);
            echo '</tr>';
        }
    ?>

    </tbody>
</table>
<?php

    echo '<br><br><br>';

?>
        </div>

        <?php
            //include "../sidebar.php";
        ?>

</main>


<?php

    // include "../footer.php";

?>
</html>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
