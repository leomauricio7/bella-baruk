<?php
class Valida
{

	private static $Data;
	private static $Format;

	public static function Email($Email)
	{
		self::$Data = (string) $Email;
		self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

		if (preg_match(self::$Format, self::$Data)) :
			return true;
		else :
			return false;
		endif;
	}

	public static function Number($Campo)
	{
		self::$Data = (string) $Campo;

		if (is_numeric(self::$Data)) :
			return true;
		else :
			return false;
		endif;
	}

	public static function Nome($Nome)
	{
		self::$Data = (string) $Nome;

		if (self::$Data) :
			return true;
		else :
			return false;
		endif;
	}

	public static function isExistCPF($cpf)
	{
		$read = new Read();
		$read->ExeRead('users', 'where cpf=:cpf', 'cpf=' . $cpf);
		return $read->getRowCount() > 0 ? true : false;
	}

	public static function isExistEmail($email)
	{
		$read = new Read();
		$read->ExeRead('users', 'where email=:email', 'email=' . $email);
		return $read->getRowCount() > 0 ? true : false;
	}
	public static function isDev()
	{
		$tipo_conexao = $_SERVER['HTTP_HOST'];
		if (($tipo_conexao == 'localhost') || ($tipo_conexao == '127.0.0.1')) {
			return true;
		} else {
			return false;
		}
	}
}
