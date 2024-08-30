Gráfica que simula los resultados de las elecciones de Sociedad de Alumnos en forma de gráfica circular.
Para que el programa funcione es necesario tener
-> Wampserver
-> Algún editor de texto (en mi caso VS Code y sus extenciones)
-> Realizar un local host en phpMyAdmin

    CREATE TABLE partidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
    );
    INSERT INTO partidos (nombre) VALUES ('Partido A'), ('Partido B'), ('Partido C'), ('Partido D');
