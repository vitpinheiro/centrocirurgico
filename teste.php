<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Valores aos Arrays</title>
</head>
<body>
    <?php
    // Definindo ou inicializando os arrays
    $array1 = isset($_POST['array1']) ? $_POST['array1'] : array();
    $array2 = isset($_POST['array2']) ? $_POST['array2'] : array();

    // Verificando se os arrays têm o mesmo comprimento
    if (count($array1) == count($array2)) {
        $array_completo = array();
        // Combinação dos arrays
        for ($i = 0; $i < count($array1); $i++) {
            $array_completo[] = array($array1[$i], $array2[$i]);
        }

        // Exibindo o array resultante em uma tabela HTML
        echo "<table border='1'>";
        echo "<tr><th>Array 1</th><th>Array 2</th></tr>";
        foreach ($array_completo as $item) {
            echo "<tr><td>{$item[0]}</td><td>{$item[1]}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Os arrays não têm o mesmo comprimento.";
    }
    ?>

    <h2>Adicionar Valores</h2>
    <form method="post">
        <label for="valor_array1">Valor para Array 1:</label>
        <input type="text" name="valor_array1" id="valor_array1">
        <br>
        <label for="valor_array2">Valor para Array 2:</label>
        <input type="text" name="valor_array2" id="valor_array2">
        <br>
        <input type="submit" value="Adicionar Valores">
        <input type="hidden" name="array1" value="<?php echo htmlspecialchars(json_encode($array1)); ?>">
        <input type="hidden" name="array2" value="<?php echo htmlspecialchars(json_encode($array2)); ?>">
    </form>
</body>
</html>
