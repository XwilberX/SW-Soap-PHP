<?php
    require_once("lib/nusoap.php");

    $server = new soap_server();
    $server = new nusoap_server(); // Create a instance for nusoap server

    $server->configureWSDL("Soap Demo","urn:soapdemo"); // Configure WSDL file

    $server->wsdl->addComplexType("ArrayOfString",
                 "complexType",
                 "array",
                 "",
                 "SOAP-ENC:Array",
                 array(),
                 array(array("ref"=>"SOAP-ENC:arrayType","wsdl:arrayType"=>"xsd:string[]")),
                 "xsd:string"); 

    $server->register(
        "paises", // name of function
        array("name"=>"xsd:string"),  // inputs
        array("return"=>"tns:ArrayOfString")   // outputs
    );
    $server->register(
        "frutas", // name of function
        array("name"=>"xsd:string"),  // inputs
        array("return"=>"tns:ArrayOfString")   // outputs
    );
    $server->register(
        "marcas", // name of function
        array("name"=>"xsd:string"),  // inputs
        array("return"=>"tns:ArrayOfString")   // outputs
    );

    function paises($name) {
        if ($name != '') {
            $paises = ["Mexico", "Chile", "Argentina", "Colombia"];
        
            return $paises;
        }

        return 'no hay datos';
    }

    function marcas($name) {
        if ($name != '') {
            $marcas = ["Audi", "Toyota", "Nissan", "KIA"];
        
            return $marcas;
        }

        return 'no hay datos';
    }

    function frutas($name) {
        if ($name != '') {
            $frutas = ["Manzana", "Pera", "Uva", "Sandia"];
        
            return $frutas;
        }

        return 'no hay datos';
    }

    $server->service(file_get_contents("php://input"));
?>