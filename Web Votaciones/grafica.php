<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php';

// Simular los porcentajes
$partidos = [
    ['id' => 1, 'nombre' => 'Partido A', 'porcentaje' => 30],
    ['id' => 2, 'nombre' => 'Partido B', 'porcentaje' => 10],
    ['id' => 3, 'nombre' => 'Partido C', 'porcentaje' => 40],
    ['id' => 4, 'nombre' => 'Partido D', 'porcentaje' => 20],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica Circular</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            background-color: #191F35; /* Azul oscuro */
            color: #fff; /* Texto blanco */
            font-family: Arial, sans-serif;
        }

        .chart-container {
            width: 50%;
            height: 50%;
            margin: auto;
            padding-top: 50px;
            position: relative;
            aspect-ratio: 1; /* Mantener el contenedor cuadrado */
        }

        .pie-chart {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 50%;
            background: conic-gradient(
                <?php
                $colors = ['#ff9800', '#f44336', '#2196f3', '#4caf50'];
                $angle = 0;
                foreach ($partidos as $index => $partido) {
                    $percentage = $partido['porcentaje'];
                    echo $colors[$index] . " " . $angle . "% " . ($angle + $percentage) . "%";
                    $angle += $percentage;
                    if ($index < count($partidos) - 1) {
                        echo ", ";
                    }
                }
                ?>
            );
            animation: pieChartAnimation 2s ease-out forwards;
        }

        .pie-chart::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60%;
            height: 60%;
            background-color: #191F35; /* Color del fondo del body */
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 1; /* Asegura que el círculo central esté detrás del texto */
        }

        @keyframes pieChartAnimation {
            from {
                background: conic-gradient(
                    transparent 0%,
                    transparent 100%
                );
            }
            to {
                background: conic-gradient(
                    <?php
                    $colors = ['#ff9800', '#f44336', '#2196f3', '#4caf50'];
                    $angle = 0;
                    foreach ($partidos as $index => $partido) {
                        $percentage = $partido['porcentaje'];
                        echo $colors[$index] . " " . $angle . "% " . ($angle + $percentage) . "%";
                        $angle += $percentage;
                        if ($index < count($partidos) - 1) {
                            echo ", ";
                        }
                    }
                    ?>
                );
            }
        }

        .center-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 1.5em;
            color: #fff;
            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #ff9800, 0 0 40px #ff9800, 0 0 50px #ff9800, 0 0 60px #ff9800, 0 0 70px #ff9800; /* Efecto fluorescente */
            z-index: 2; /* Asegura que el texto esté por encima del círculo interior */
        }

        .label {
            position: absolute;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 0.8em;
            color: #fff;
            text-shadow: 0 0 5px #000;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <div class="pie-chart">
            <div class="center-text">Resultados Elecciones Sociedad de alumnos</div>
            <?php
            $angle = 0;
            foreach ($partidos as $index => $partido) {
                $percentage = $partido['porcentaje'];
                $mid_angle = $angle + $percentage / 2;
                $x = 50 + 40 * cos(deg2rad($mid_angle * 3.6));
                $y = 50 + 40 * sin(deg2rad($mid_angle * 3.6));
                echo "<div class='label' style='left: {$x}%; top: {$y}%;'>{$partido['nombre']}<br>{$partido['porcentaje']}%</div>";
                $angle += $percentage;
            }
            ?>
        </div>
    </div>
</body>
</html>
