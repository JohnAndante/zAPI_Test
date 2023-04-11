<?php
// Inclui o arquivo de configurações
include "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>API Test</title>

    <link rel="shorcut icon" href="images/icone-psm-01.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <header>
        <a href="index.php" title="Home - PSM">
            <img src="images/icone-psm-01.png" alt="Logo Paraná Supermercados">
        </a>
        <a href="index.php" class="page-title">Paraná Supermercados</a>

        <nav>
            <ul>
                <li>
                    <a href="index.php?pagina=home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="index.php?pagina=produtos">
                        Produtos
                    </a>
                </li>
                <li>
                    <a href="index.php?pagina=consultar">
                        Consultar
                    </a>
                </li>
                <li>
                    <a href="index.php?pagina=contato">
                        Contato
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="grid">
            <div class="coluna">
                <?php
                //recuperar a pagina para abrir
                $pagina = $_GET["pagina"] ?? "home";
                //echo $pagina;
                // home -> pages/home.php
                $pagina = "pages/{$pagina}.php";
                //echo $pagina;

                //verificar se a página existe
                if (file_exists($pagina)) {
                    include $pagina;
                } else {
                    include "pages/erro.php";
                }
                ?>
            </div>
            <div class="coluna">
                <aside>
                    <h2>Sidebar</h2>
                    <ul>
                        <li>
                            <a href="index.php?pagina=home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="index.php?pagina=produtos">
                                Produtos
                            </a>
                        </li>
                        <li>
                            <a href="index.php?pagina=consultar">
                                Consultar
                            </a>
                        </li>
                        <li>
                            <a href="index.php?pagina=contato">
                                Contato
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
    </main>

    <footer>
        <img src="images/icone-psm-01.png" alt="Logo Paraná Supermercados">
        <p>
            Desenvolvido por Walker Silvestre
        </p>
    </footer>
</body>
</html>
