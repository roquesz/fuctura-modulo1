<?php

	function formatarValor($valor)
	{
		if (strstr(',', $valor)){
			$valor = str_replace('.', '', $valor);
			$valor = str_replace(',', '.', $valor);
		} else {
			$valor = number_format($valor, 2, ',', '.');
		}
		return $valor;
	}

	function formatarData($data)
	{
		$data = date("d/m/Y", strtotime($data));
		return $data;
	}

?>