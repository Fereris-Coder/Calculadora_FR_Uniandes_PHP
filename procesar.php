<?php
/* ==========================================================================
   MÓDULO DE PROCESAMIENTO BACKEND: procesar.php (Lógica Servidor en PHP)
   ========================================================================== */

// 1. RECEPCIÓN DE DATOS (Método POST)
$num1 = isset($_POST['num1']) ? trim($_POST['num1']) : '';
$operador = isset($_POST['operador']) ? trim($_POST['operador']) : '';
$num2 = isset($_POST['num2']) ? trim($_POST['num2']) : '';

$resultado = '';
$error = '';

// 2. VALIDACIÓN Y CÁLCULO MATEMÁTICO EN EL SERVIDOR
if ($num1 !== '' && $operador !== '' && $num2 !== '') {
    $f1 = floatval($num1);
    $f2 = floatval($num2);

    switch ($operador) {
        case '+':
            $resultado = $f1 + $f2;
            break;
        case '-':
            $resultado = $f1 - $f2;
            break;
        case '*':
            $resultado = $f1 * $f2;
            break;
        case '/':
            if ($f2 == 0) {
                $error = "⚠️ Error: División por cero";
            } else {
                $resultado = $f1 / $f2;
            }
            break;
        default:
            $error = "⚠️ Operador no válido";
            break;
    }
} else {
    $error = "⚠️ Faltan datos para calcular";
}

// 3. CONTINUIDAD DE INTERFAZ (Dashboard Permanente)
// En lugar de cargar una pantalla independiente, incluimos index.php
// Esto inyecta las variables $resultado y $error directamente en la vista principal.
include 'index.php';
?>
