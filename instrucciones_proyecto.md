# 📄 Plan de Instrucciones del Proyecto: Web Personal & Calculadora PHP

Este documento define la arquitectura, estándares de diseño y reglas de negocio para el desarrollo de la Tarea 1 de Aplicaciones Web (Carrera de Software, UNIANDES), cumpliendo estrictamente con el sílabo y el plan maestro acordado.

---

## 1. Configuración de Identidad Visual (Estética Pixel Art 👾)

* **Estilo Visual:** Pixel Art / Retro 8-bits 🕹️.
* **Unidad Base de Medida:** `1fr = 16px` (basado en `font-size: 16px` del contenedor principal).
* **Bordes:** Sólidos, color negro (`#000000`), con un grosor estricto de `3px` para simular el trazo retro.
* **Paleta de Colores:**
  * **Principal:** Naranja Vibrante (`#ff7f27`) para encabezados, botones de operación y acentos.
  * **Secundario:** Gris Ligero (`#d3d3d3` y `#f0f0f0`) para fondos de botones numéricos, contenedor de calculadora y biografía.
  * **Acentos Funcionales:** Rojo (`#ff3b30`) para el botón de borrar ("C") y Verde (`#34c759`) para el botón de igual ("=").
  * **Contraste:** Texto negro sobre fondos grises; texto blanco sobre fondos naranjas y oscuros.
* **Fondo General:** Degradado radial central (`radial-gradient`) que transiciona suavemente desde blanco en el centro hacia naranja vibrante en los bordes, generando profundidad y dinamismo.
* **Tipografía:** Fuentes monoespaciadas (`Courier New`, Courier, monospace) para reforzar el aspecto de sistema informático clásico.

---

## 2. Arquitectura de la Calculadora (CSS Grid 🕸️)

* **Contenedor Principal:** Clase `.calculadora`.
* **Columnas (Grid Columns):** 4 columnas de igual tamaño definidas mediante `repeat(4, 4fr)`.
* **Filas (Grid Rows):** 5 filas de igual tamaño definidas mediante `repeat(5, 4fr)`.
* **Espaciado (Gap):** Separación estricta de `4px` entre botones (`gap: 4px`).
* **Excepciones de Rejilla (Span):**
  * **Botón "0":** Ocupa 2 columnas horizontalmente (`grid-column: span 2`).
  * **Botón "=":** Ocupa 2 filas verticalmente (`grid-row: span 2`).

---

## 3. Estándares de Programación y Lógica 🧠

### JavaScript (script.js - Lógica Cliente)
* **Declaración de Variables:** Uso obligatorio de `let` para el manejo del estado mutable (`primerNumero`, `operador`, `segundoNumero`, `operacionActual`).
* **Tipos de Datos:** Los números ingresados se almacenan temporalmente como cadenas de texto (`Strings`) para permitir la concatenación visual en la pantalla antes de operar.
* **Interacción:** Captura de eventos mediante clics en los botones, actualizando la pantalla en tiempo real y preparando los datos para el envío al servidor.

### PHP (procesar.php - Lógica Servidor)
* **Recepción de Datos:** Uso del método HTTP `POST` para recibir los factores y el operador desde el formulario de la calculadora.
* **Conversión de Tipos:** Uso de `floatval()` / `parseFloat` para convertir las cadenas de texto a números de punto flotante antes de operar.
* **Estructura de Control:** Implementación de un bloque `switch` para evaluar el operador (`+`, `-`, `*`, `/`) y ejecutar el cálculo matemático preciso en el servidor.

---

## 4. Estructura de Módulos y Archivos 📁

El proyecto se divide bajo el principio de **Separación de Responsabilidades**:

1. `index.php`: Módulo estructural (HTML5) que contiene la biografía, el esqueleto de la calculadora y el formulario de envío.
2. `style.css`: Módulo de diseño que contiene las reglas Pixel Art, la grilla de botones y las Media Queries para diseño adaptativo (Mobile First).
3. `script.js`: Módulo de interactividad cliente para gestionar la experiencia de usuario (UX) en la calculadora.
4. `procesar.php`: Módulo de procesamiento backend en PHP que realiza el cálculo final y presenta el resultado.
