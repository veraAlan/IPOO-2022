<?php
/**
 * Función que inicializa un arreglo predefinido.
 * @return array
 */
function inicializarArreglo(){
    $arreglo = [
        ["variedad" => "Cabernet Sauvignon", "cantidadBotellas" => 10, "añoProduccion" => 2020, "precioUnidad" => 1250],
        ["variedad" => "Zinfandel", "cantidadBotellas" => 20, "añoProduccion" => 2017, "precioUnidad" => 950],
        ["variedad" => "Syrah", "cantidadBotellas" => 30, "añoProduccion" => 2015, "precioUnidad" => 3000],
        ["variedad" => "Pinot Noir", "cantidadBotellas" => 40, "añoProduccion" => 2016, "precioUnidad" => 4350],
        ["variedad" => "Merlot", "cantidadBotellas" => 50, "añoProduccion" => 2017, "precioUnidad" => 1050],
        ["variedad" => "Grenache", "cantidadBotellas" => 60, "añoProduccion" => 2015, "precioUnidad" => 2250],
        ["variedad" => "Tempranillo", "cantidadBotellas" => 70, "añoProduccion" => 2010, "precioUnidad" => 4050],
        ["variedad" => "Malbec", "cantidadBotellas" => 80, "añoProduccion" => 1999, "precioUnidad" => 1850],
        ["variedad" => "Cabernet Malbec", "cantidadBotellas" => 80, "añoProduccion" => 1999, "precioUnidad" => 2200]
    ];

    return $arreglo;
}

/**
 * Función que retorna un arreglo con la candidad de botellas y el precio de cada variedad.
 * @param array $arreglo
 * @return array
 */
function cantidadYPrecio($stock){
    $cantidadYPrecio = [];
    foreach ($stock as $producto){
        array_push($cantidadYPrecio, ["variedad" => $producto["variedad"], "cantidadBotellas" => $producto["cantidadBotellas"], "precioUnidad" => $producto["precioUnidad"]]);
    }

    return $cantidadYPrecio;
}

/**
 * Función que retorna el promedio de precios del stock ingresado.
 * @param array $arreglo
 * @return float
 */
function promedioDePrecios($stock){
    $precioTotal = 0;
    foreach ($stock as $producto){
        $precioTotal += $producto["precioUnidad"];
    }

    return $precioTotal / count($stock);
}

/**
 * Función main.
 */
function main(){
    $stock = cantidadYPrecio(inicializarArreglo());

    foreach ($stock as $producto){
        echo "Variedad: " . $producto["variedad"] . " - Cantidad de botellas: " . $producto["cantidadBotellas"] . " - Precio por unidad: " . $producto["precioUnidad"] . "\n";
    }

    echo "\nPromedio de precios: ".promedioDePrecios($stock);
}

main();