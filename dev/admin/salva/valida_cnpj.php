<?php


	function validaCnpj($cnpj)
     {
        $filterCnpj = preg_replace('/[\D]/', '', (string)$cnpj);

        /*Elimina CNPJ em branco, menor que 14 digitos e com todos os numeros iguais*/
        $isNumerosIguais = preg_match('/^(1{14}|2{14}|3{14}|4{14}|5{14}|6{14}|7{14}|8{14}|9{14}|0{14})$/', $filterCnpj);

        if ($cnpj == '' || strlen($filterCnpj) != 14 || $isNumerosIguais) {
            return false;
        }

        $tamanho = strlen($filterCnpj) - 2;
        //numero a ser validado (12 primeiros)
        $numerosEtapa1 = substr($filterCnpj, 0, $tamanho);
        //resgata o digito verificador (2 ultimos)
        $digitoVerificador = substr($filterCnpj, $tamanho);
        //retorna a primeira posicao do digito verificador
        $resultadoDv1 = retornaResultadoDv($tamanho, $numerosEtapa1);

        if ($resultadoDv1 != substr($digitoVerificador, 0, 1)) {
            return false;
        }

        $tamanho += 1;
        //numero a ser validado (13 primeiros)
        $numerosEtapa2 = substr($filterCnpj, 0, $tamanho);
        //retorna a segunda posicao do digito verificador
        $resultadoDv2 = retornaResultadoDv($tamanho, $numerosEtapa2);
        if ($resultadoDv2 != substr($digitoVerificador, 1, 1)) {
            return false;
        }

        return true;
    }


    /**
    * Calcula cada digito verificador do CNPJ
    *
    * @param int $tamanho
    * @param int $numeros
    * @return int
    */
    function retornaResultadoDv($tamanho, $numeros)
    {
        $soma = 0;
        $pos = $tamanho - 7;
        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += substr($numeros, $tamanho - $i, 1) * $pos--;
            if ($pos < 2) {
                $pos = 9;

            }
        }
        $resultado = $soma % 11 < 2 ? 0 : 11 - $soma % 11;
        return $resultado;
    }

?>
