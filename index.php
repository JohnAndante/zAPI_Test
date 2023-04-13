<?php
    // Inclui o arquivo de configurações
    include "config.php";
    include "header.php";
?>
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

            <?php
                include "../sidebar.php";
            ?>
    </main>

    <?php
        include "footer.php";
    ?>
</body>
</html>
