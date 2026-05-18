/* ==========================================================================
   MÓDULO DE LÓGICA CLIENTE: script.js (Interactividad y Continuidad de Cálculo)
   ========================================================================== */

let primerNumero = "";
let operador = "";
let segundoNumero = "";
let operacionActual = "";
let calculoCompletado = false; // Bandera para identificar si la pantalla muestra un resultado final

const pantalla = document.getElementById("pantalla");
const inputNum1 = document.getElementById("input-num1");
const inputOperador = document.getElementById("input-operador");
const inputNum2 = document.getElementById("input-num2");
const formCalculadora = document.getElementById("form-calculadora");

// PUENTE PHP -> JS: Verificamos si PHP inyectó un resultado previo en la vista
if (typeof resultadoPHP !== 'undefined' && resultadoPHP !== "") {
    operacionActual = resultadoPHP; // Permite usar el resultado como factor para la siguiente operación
    calculoCompletado = true;       // Activa el modo de resultado final
}

function actualizarDisplay() {
    if (operacionActual !== "") {
        pantalla.innerText = operacionActual;
    } else if (operador !== "" && primerNumero !== "") {
        pantalla.innerText = operador;
    } else {
        pantalla.innerText = "0";
    }
}

function agregarNumero(numero) {
    if (calculoCompletado) {
        // Comportamiento de calculadora real: Si presiona un número justo después de un cálculo,
        // se reinicia la pantalla para comenzar un nuevo número desde cero.
        operacionActual = numero;
        calculoCompletado = false;
    } else {
        if (numero === '.' && operacionActual.includes('.')) return;
        operacionActual = operacionActual + numero;
    }
    actualizarDisplay();
}

function seleccionarOperacion(op) {
    // Permite continuar operando con el resultado de PHP previo
    if (operacionActual === "" && primerNumero === "") return;

    if (operacionActual !== "") {
        primerNumero = operacionActual;
    }

    operador = op;
    operacionActual = "";
    calculoCompletado = false; // El resultado previo ya se convirtió en 'primerNumero'
    actualizarDisplay();
}

function borrarUltimo() {
    if (calculoCompletado) return; // No permite borrar dígitos individuales de un resultado final de PHP
    if (operacionActual !== "") {
        operacionActual = operacionActual.slice(0, -1);
        actualizarDisplay();
    }
}

function limpiarPantalla() {
    primerNumero = "";
    operador = "";
    segundoNumero = "";
    operacionActual = "";
    calculoCompletado = false;
    actualizarDisplay();
}

function calcular() {
    segundoNumero = operacionActual;

    if (primerNumero === "" || operador === "" || segundoNumero === "") {
        alert("⚠️ Por favor, ingrese una operación completa antes de calcular.");
        return;
    }

    inputNum1.value = primerNumero;
    inputOperador.value = operador;
    inputNum2.value = segundoNumero;

    formCalculadora.submit();
}
