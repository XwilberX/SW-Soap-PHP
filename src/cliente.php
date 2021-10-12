<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost/server.php"); // Create a instance for nusoap client

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SOAP Web Service Client Side Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <h2>SOAP Demo</h2>
        <form class="row g-3" action="" method="POST">
            <div class="col-auto">
                <label for="name" class="col-sm-2 col-form-label">Servicio</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" name="name" placeholder="Escribe un servicio">
            </div>
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
        <br>
        <h5>Escribe algunos de estos servicios, escribelo como se muestra:</h5>
        <p>paises, frutas, marcas</p>
        <ul class="list-group">
            <ul class="list-group">
            <?php
                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    
                    if($name == 'paises')
                        $response = $client->call('paises',array("name"=>$name));
                    if($name == 'frutas')
                        $response = $client->call('frutas',array("name"=>$name));
                    if($name == 'marcas')
                        $response = $client->call('marcas',array("name"=>$name));
                    // else
                    //     echo "El servicio no esta disponible";

                    if(empty($response))
                        echo $response;
                    else {
                        foreach($response as $key => $value){
                            echo "<li class=\"list-group-item\"> $value </li>";
                        }
                    }
                        
                }
            ?>
        </ul>
    </div>
</body>

</html>