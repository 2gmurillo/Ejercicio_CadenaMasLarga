<?php

declare(strict_types=1);

$nonStringArray = [false, 1, 'dos'];
$emptyArray = [];
$boolean = false;
$number = 1;
$string = 'dos';

/*
|--------------------------------------------------------------------------
| Failure cases
|--------------------------------------------------------------------------
*/
//getLongestStringIndexMessage($nonStringArray);
//getLongestStringIndexMessage($emptyArray);
//getLongestStringIndexMessage($boolean);
//getLongestStringIndexMessage($number);
//getLongestStringIndexMessage($string);

getLongestStringIndexMessage(stringArray());

/**
 * @return array
 */
function stringArray(): array
{
    echo PHP_EOL;
    echo 'Escriba una frase y al finalizar presione la tecla "Enter":' . PHP_EOL;
    echo '->';

    return explode(' ', trim(fgets(STDIN)));
}

/**
 * @param array $array
 */
function getLongestStringIndexMessage(array $array): void
{
    echo PHP_EOL . '--------------------------------------------------------------------------' . PHP_EOL;
    try {
        echo 'El índice del arreglo que cuenta con la cadena con más caracteres es: ' . getLongestStringIndex($array);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    } finally {
        echo PHP_EOL . '--------------------------------------------------------------------------' . PHP_EOL;
        print_r($array);
    }
}

/**
 * @param array $array
 * @return int
 * @throws Exception
 */
function getLongestStringIndex(array $array): int
{
    if (empty($array)) {
        throw new Exception('El array no puede estar vacío');
    }

    $longestStringIndex = 0;
    $longestStringLength = 0;

    foreach ($array as $index => $item) {
        if ('string' !== gettype($item)) {
            throw new Exception('Todos los valores dentro del array deben ser de tipo "string"');
        }

        if (strlen($item) > $longestStringLength) {
            $longestStringIndex = $index;
            $longestStringLength = strlen($item);
        }
    }

    return $longestStringIndex;
}
