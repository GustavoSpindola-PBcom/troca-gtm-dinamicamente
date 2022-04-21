<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/settings.php';
// Definindo um valor padrão
$empresa = 'transportal';
// Verificando se o Cookie existe
if (isset($_COOKIE['traqueioTP'])) {
    // Verificando se o Cookie possui valor
    if (!empty($_COOKIE['traqueioTP'])) {
        // Pegando o nome da empresa no Cookie
        $empresa = explode('=', explode('&', $_COOKIE['traqueioTP'])[4])[1];
    }
    // Pegando o nome da empresa na URL
    // Isso foi feito, pois o PHP não consegue puxar o Cookie quando ele é criado.
    // A página precisaria ser recarregada para que o PHP pudesse pegar o valor do Cookie
} elseif (isset($_GET['empresa'])) {
    $empresa = $_GET['empresa'];
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '<?php echo EMPRESAS[$empresa]; ?>');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo EMPRESAS[$empresa]; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
    echo 'Estou na home com o GTM da empresa ' . $empresa . ' - ' . EMPRESAS[$empresa];
    ?>
    <br>
    <a href="<?php echo DOMINIO . 'carrinho.php' ?>">Carrinho</a>


    <script async defer type="text/javascript" src="<?php echo DOMINIO ?>js/cookie.js"></script>

</body>

</html>