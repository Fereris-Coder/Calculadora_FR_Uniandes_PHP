<?php
/* ==========================================================================
   INTERFAZ PRINCIPAL: index.php (Estructura y Gestión de Estado PHP)
   ========================================================================== */

// Verificamos si este archivo está siendo incluido desde procesar.php
// y capturamos el resultado o error calculado por el servidor.
$display_inicial = "0";
$resultado_js = "";

if (isset($error) && $error !== '') {
    $display_inicial = $error;
} elseif (isset($resultado) && $resultado !== '') {
    $display_inicial = $resultado;
    $resultado_js = $resultado; // Variable limpia para inyectar en JavaScript
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Web Personal Pixel Art - Renato Ricaurte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="contenedor-maestro">
        
        <!-- SECCIÓN 1: Biografía y Encabezado Pixel Art -->
        <div class="seccion-perfil">
            <header class="header-pixel">
                <div class="contenedor-perfil">
                    <div class="avatar">
                        <img src="fotoRenato.jpeg" alt="Foto de Renato Ricaurte">
                    </div> 
                    <h1>FELIPE RENATO RICAURTE SOLÍS</h1>
                </div>
                <p class="subtitulo">Latacunga | 1997</p>
            </header>

            <div class="descripcion-contenedor">
                <p><strong>Profesión:</strong> Diseñador Industrial</p>
                <p><strong>Estudios:</strong> Ingeniería de Software UNIANDES</p>
                <hr style="border: 1px dashed #000000; margin: 15px 0;">
                <p>Desarrollo de web personal con calculadora en PHP y arquitectura con CSS Grid, aplicando el patrón Mobile First y diseño Pixel Art.</p>
            </div>
        </div>

        <!-- SECCIÓN 2: Calculadora Pixel Art -->
        <main class="seccion-calculadora">
            <div class="calculadora">
                <!-- Pantalla de visualización (Muestra el resultado de PHP o 0) -->
                <div id="pantalla" class="pantalla"><?php echo htmlspecialchars($display_inicial); ?></div>
                
                <!-- Formulario para enviar datos a procesar.php -->
                <form id="form-calculadora" action="procesar.php" method="POST">
                    <input type="hidden" id="input-num1" name="num1" value="">
                    <input type="hidden" id="input-operador" name="operador" value="">
                    <input type="hidden" id="input-num2" name="num2" value="">
                </form>

                <!-- Cuadrícula de botones (4 columnas x 5 filas) -->
                <div class="botones">
                    <button type="button" class="boton-c" onclick="limpiarPantalla()">C</button>
                    <button type="button" class="boton-operador" onclick="borrarUltimo()">DEL</button>
                    <button type="button" class="boton-operador" onclick="seleccionarOperacion('/')">/</button>
                    <button type="button" class="boton-operador" onclick="seleccionarOperacion('*')">*</button>

                    <button type="button" class="boton-numero" onclick="agregarNumero('7')">7</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('8')">8</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('9')">9</button>
                    <button type="button" class="boton-operador" onclick="seleccionarOperacion('-')">-</button>

                    <button type="button" class="boton-numero" onclick="agregarNumero('4')">4</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('5')">5</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('6')">6</button>
                    <button type="button" class="boton-operador" onclick="seleccionarOperacion('+')">+</button>

                    <button type="button" class="boton-numero" onclick="agregarNumero('1')">1</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('2')">2</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('3')">3</button>
                    <button type="button" class="boton-igual" onclick="calcular()">=</button>

                    <button type="button" class="boton-numero boton-cero" onclick="agregarNumero('0')">0</button>
                    <button type="button" class="boton-numero" onclick="agregarNumero('.')">.</button>
                </div>
            </div>
        </main>

    </div>

    <footer class="footer-pixel">
        <p>Mayo 2026 | Aplicaciones Web | Renato Ricaurte</p>
    </footer>

    <!-- Puente de Comunicación PHP -> JavaScript -->
    <script>
        // Transfiere el resultado de PHP a una constante global de JS
        const resultadoPHP = "<?php echo addslashes($resultado_js); ?>";
    </script>
    <script src="script.js"></script>
</body>
</html>
