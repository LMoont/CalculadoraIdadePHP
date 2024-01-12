<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $nascimento = $_GET["nascimento"] ?? 1998;
        $atual = date("Y");
        $ano = $_GET["ano"] ?? $atual;    
    ?>

    <main>
        <h1>Calculando sua idade</h1>
        <form action="<?= $_SERVER["PHP_SELF"]?>" method="get">
            <label for="nascimento">Em que ano você nasceu?</label>
            <input type="number" name="nascimento" id="idnascimento" min="1900" max="<?=$atual?>" required>
            <label for="ano">Quer saber a sua idade em que ano? (atualmente estamos em <strong><?= $atual?></strong>)</label>
            <input type="number" name="ano" id="idano" min="1900" required>
            <input type="submit" value="Calcular idade">
        </form>
    </main>

    <section id="resultado">
        <?php if(isset($_GET["nascimento"]) && isset($_GET["ano"])): ?>
        
        <h2>Resultado</h2>
        <p>
        <?php 
            
            $resultado = $ano - $nascimento;

            switch (true){
                case $resultado <0:
                    echo "Em <strong>$ano</strong> você ainda não era nascido!";
                    break;

                case $ano <$atual && $resultado != 1:
                    echo "Quem nasceu em $nascimento teve <strong>$resultado anos de idade</strong> em $ano!";
                    break;

                case $resultado == 1:
                    echo "Quem nasceu em $nascimento teve <strong>$resultado ano de idade</strong> em $ano!";
                    break;

                case $resultado > 100 && $ano < $atual:
                    echo "Quem nasceu em $nascimento teve mais de <strong>100 anos</strong> em $ano!";
                    break;

                case $resultado > 100 && $ano > $atual:
                    echo "Quem nasceu em $nascimento terá mais de <strong>100 anos</strong> em $ano!";
                    break;

                default:
                    echo "Quem nasceu em $nascimento terá <strong>$resultado anos</strong> em $ano!";
            }
        ?>
        <?php endif; ?>
        </p>
    </section>
</body>
</html>