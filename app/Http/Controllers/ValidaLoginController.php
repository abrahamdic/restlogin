<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;

use Exception;
use App\Usuario;

class ValidaLoginController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}
	
	function Acceso(UsuarioRequest $request)
	{	
		try {
			//verifica si es json
			if ($request->isJson()) {
				$data = $request->all();
				$email 		= $data['email'];
				$password 	= $data['password'];
				//verifica si email y password son enviados
				if (!empty($email) and !empty($password)) {
					//verifica en la base de datos
					$usuario = Usuario::where('email', $email)->first();
					if ($usuario['attributes']['password'] == $password) {
						//devuelve respuesta json
						$respuesta = [ 
										'message' 	=> 'Los datos del usuario son correctos',
										'data'		=> [
														'name' 		=> $usuario['attributes']['name'],
														'lastname'	=> $usuario['attributes']['lastname'],
														'address'	=> $usuario['attributes']['address'],
														'email'		=> $usuario['attributes']['email'],
														]
									 ];
						return response(json_encode($respuesta))
						->header('Content-Type', 'application/json; charset=utf-8');
					} else {
						//devuelve respuesta json
						$respuesta = [ 
										'message' 	=> 'No existe un usuario con los datos ingresados',
										'data'		=> null,
									 ];
						return response(json_encode($respuesta))
						->header('Content-Type', 'application/json; charset=utf-8');
					}

				} else {
					throw new Exception ('No ha enviado todos los datos necesarios. Verifique si ha ingresado su email y password.');
				}
			} else {
				throw new Exception ('Error en la Estructura JSON. Verifique.');
			}
		} catch (Exception $e) {
			$mensaje = [
			'Mensaje' 	=> $e->getMessage(),
			'Codigo'	=> $e->getCode(),
			'Linea'		=> $e->getLine(),
			];
			return response($mensaje)
			->header('Content-Type', 'application/json; charset=utf-8');
		}

	}

}
