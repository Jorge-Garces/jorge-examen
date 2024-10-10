<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        session_start();

        function validarUsuarioYPais($string, &$err_msgs) {
            if (!$string) {
                $err_msgs[] = "El campo usuario o pais no puede estar vacío";
                return null;
            }

            /* Valido que el usuario y el pais solo tengan letras. */
            if (!preg_match("/^[a-zA-Z]{4,30}$/", $string)) {
                $err_msgs[] = "El usuario o pais " . $string . " no es válido";
                return null;
            }

            return $string;
        }

        function validarEmail($email, &$err_msgs) {
            if (!$email) {
                $err_msgs[] = "El campo email no puede estar vacío";
                return null;
            }

            /* Que empiece por un string de numeros y letras, que contenga un @, que siga por otro string de numeros y letras, que siga por un punto y que acabe por un string de entre 2 y 5 letras */
            if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,4}$/", $email)) {
                $err_msgs[] = "El email electrónico " . $email . " no es válido";
                return null;
            }

            return $email;
        }

        function validarEdad($edad, &$err_msgs) {
            if (!$edad) {
                $err_msgs[] = "El campo edad no puede estar vacío";
                return null;
            }

            /* Valido que la edad solo sea un número de máximo 2 cifras */
            if (!preg_match("/^[0-9]{1,2}$/", $edad)) {
                $err_msgs[] = "La edad " . $edad . " no es válida";
                return null;
            }

            return $edad;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $err_msgs = [];

            $usuario = validarUsuarioYPais($_POST['usuario'], $err_msgs);
            $email = validarEmail($_POST['email'], $err_msgs);
            $edad = validarEdad($_POST['edad'], $err_msgs);
            $pais = validarUsuarioYPais($_POST['pais'], $err_msgs);

            if (!$err_msgs) {
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['edad'] = $_POST['edad'];
                $_SESSION['pais'] = $_POST['pais'];

                header("Location: informacion.php");

                exit();
            } else {
                echo "Error! Has cometido el/los siguiente fallo/s: ";
                foreach ($err_msgs as $error) {
                    echo "<p>" . $error . "</p>";
                }
            }

        }
    ?>

    <div class="container">
        <form action="" method="post">
            <input type="text" name="usuario" id="usuario" class="mt-3 form-control" placeholder="Usuario" required/>
            <input type="text" name="email" id="email" class="mt-3 form-control" placeholder="Email" required/>
            <input type="text" name="edad" id="edad" class="mt-3 form-control" placeholder="Edad" required/>
            <input type="text" name="pais" id="pais" class="mt-3 form-control" placeholder="Pais" required/>
            <button type="submit" class="mt-3 btn btn-secondary">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>