<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ejer07</title>
    <script>
        //declaración de variables
        var fechaEntrada;

        //declaración de funciones
        function esBisiesto(fecha) { //pide arg fecha y devuelve true si el año es bisiesto, si no false
            var ano = fecha.split("/")[2];
            return ((ano % 4 == 0 && ano % 100 != 0) || ano % 400 == 0) ? true : false;
        }

        function cantidadDeDiasMes(fecha) { //pide arg fecha y devuelve nº de días q tiene ese mes
            var arreglo = new Array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
            var mes = fecha.split("/")[1];
            if (mes[0] == 0) { //le quito los ceros a la iz para poder usarlo como índice de búsqueda en arreglo
                mes = mes[1];
            }
            if (esBisiesto(fecha) && mes == 2) {
                return 29;
            }
            return arreglo[mes];
        }

        function validarFormato(cadena) { //pide arg String y devuelve true si está bien formateada, si no false
            cadena = cadena.trim();
            var miExp = new RegExp(/^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/);
            return miExp.test(cadena) ? true : false;
        }

        function validarFecha(fecha) { //pide arg fecha y devuelve true si es válida y está bien formateada, si no false
            var dia = fecha.split("/")[0];
            var cantidadDias = cantidadDeDiasMes(fecha);
            return dia <= cantidadDias ? true : false;
        }

        function diaSemana(fecha) { //pide arg fecha y devuelve el día de la semana en número
            var dia = fecha.split("/")[0]; //tengo que alternar luego día por mes en esta funcion...
            var mes = fecha.split("/")[1];
            var ano = fecha.split("/")[2];
            var arreglo = { 'Mon': 1, 'Tue': 2, 'Wed': 3, 'Thu': 4, 'Fri': 5, 'Sat': 6, 'Sun': 7 };
            var nombreDiaSemanaEnIngles = new Date(mes + "/" + dia + "/" + ano).toGMTString().substr(0, 3);
            return arreglo[nombreDiaSemanaEnIngles];
        }

    </script>
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td id="0" colspan="7" align="center"></td>
        </tr>
        <tr>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miércoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
            <td>Sábado</td>
            <td>Domingo</td>
        </tr>
        <tr>
            <td id="1"></td>
            <td id="2"></td>
            <td id="3"></td>
            <td id="4"></td>
            <td id="5"></td>
            <td id="6"></td>
            <td id="7"></td>
        </tr>
        <tr>
            <td id="8"></td>
            <td id="9"></td>
            <td id="10"></td>
            <td id="11"></td>
            <td id="12"></td>
            <td id="13"></td>
            <td id="14"></td>
        </tr>
        <tr>
            <td id="15"></td>
            <td id="16"></td>
            <td id="17"></td>
            <td id="18"></td>
            <td id="19"></td>
            <td id="20"></td>
            <td id="21"></td>
        </tr>
        <tr>
            <td id="22"></td>
            <td id="23"></td>
            <td id="24"></td>
            <td id="25"></td>
            <td id="26"></td>
            <td id="27"></td>
            <td id="28"></td>
        </tr>
        <tr>
            <td id="29"></td>
            <td id="30"></td>
            <td id="31"></td>
            <td id="32"></td>
            <td id="33"></td>
            <td id="34"></td>
            <td id="35"></td>
        </tr>
        <tr>
            <td id="36"></td>
            <td id="37"></td>
            <td id="38"></td><!-- 31 + 7 == 38; para cuando el 1 cae en domingo, que haya huecos -->
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <script>

        //comienzo del programa

        //pido al usuario una fecha
        while (true) {
            fechaEntrada = prompt("dime una fecha (dd/mm/aaaa)");
            if (validarFormato(fechaEntrada) && validarFecha(fechaEntrada)) {
                break;
            } else {
                alert("Fecha no válida. Reintentar");
            }
        }

        //relleno la tabla con los días
        document.getElementById(0).innerText = fechaEntrada;
        var comienzo = diaSemana(fechaEntrada); //esto me dice la casilla por la q debo empezar a rellenar
        var contador = 1;
        for (var i = comienzo; i < 31 + comienzo; i++) {
            if (contador == fechaEntrada.split("/")[0]) { //cuando salga el día lo coloreo en rojo
                document.getElementById(i).innerHTML = contador.toString().fontcolor("red");
            } else {
                document.getElementById(i).innerText = contador;
            }
            contador++;
            if (contador > cantidadDeDiasMes(fechaEntrada)) {
                break;
            }
        }

    </script>

    <br />
    <p>
        prueba con el próximo año bisiesto: 29/02/2016<br />
        prueba con un mes que ocupe 6 semanas: 09/11/2015<br />
        prueba con una fecha inexistente: 29/02/2015
    </p>

</body>



</html>
<!--Ejercicio 7: Construir el calendario del mes de una fecha dada por
    teclado. Marcando el día en rojo.


    La nueva norma de los años bisiestos se formuló del siguiente modo:
    la duración básica del año es de 365 días; pero serán bisiestos
    (es decir tendrán 366 días) aquellos años cuyas dos últimas cifras
    son divisibles por 4, exceptuando los múltiplos de 100 (1700, 1800, 1900..., que
    no serán bisiestos), de los que se exceptúan a su vez aquellos que también sean
    divisibles por 400 (1600, 2000, 2400..., que serán bisiestos). El calendario
    gregoriano ajusta a 365,2425 días la duración del año, lo que deja una
    diferencia de 0,000300926 días al año de error, es decir, adelanta cerca
    de 1/2 minuto cada año (aprox. 26 s c/año), lo que significa que se
    requiere el ajuste de un día cada 3300 años


    dos últimas cifras son divisibles por 4
    exceptuando los múltiplos de 100
    pero también sean divisibles por 400
    -->
