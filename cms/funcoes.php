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

?>