<?php
function calcula_frete($servico,$CEPorigem,$CEPdestino,$peso,$altura='4',$largura='12',$comprimento='16',$valor='1.00'){
    ////////////////////////////////////////////////
    // Código dos Serviços dos Correios
    // 41106 PAC
    // 40010 SEDEX
    // 40045 SEDEX a Cobrar
    // 40215 SEDEX 10
    ////////////////////////////////////////////////
    // URL do WebService
    $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$CEPorigem."&sCepDestino=".$CEPdestino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor."&sCdAvisoRecebimento=n&nCdServico=".$servico."&nVlDiametro=0&StrRetorno=xml";
    // Carrega o XML de Retorno
    $xml = simplexml_load_file($correios);
    // Verifica se não há erros
    if($xml->cServico->Erro == '0'){
        $valor = (float)$xml->cServico->Valor;
        $entrega = (int)$xml->cServico->PrazoEntrega;
        return array('valor'=>$valor, 'entrega'=>$entrega);
    }else{
        return false;
    }
}

$CEPorigem = $_POST['cep'];
$CEPorigem = str_replace(array('.', '-'), '', $CEPorigem);
$pac = calcula_frete('41106',$CEPorigem,'90200210 ','0.5');
$sedex = calcula_frete('40010',$CEPorigem,'90200210 ','0.5');
?>
<div class="form-group">
    <label>Escolha a opção</label>
    <div class="radio">
        <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="pac" checked="checked"/>
            PAC: R$ <?php echo number_format($pac['valor'], 2, ',', '.');?> - Entrega em <?php echo $pac['entrega'];?> dias
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="optionsRadios" id="optionsRadios3" value="sedex" />
            SEDEX: R$ <?php echo number_format($sedex['valor'], 2, ',', '.');?> - Entrega em <?php echo $sedex['entrega'];?> dias
        </label>
    </div>
</div>