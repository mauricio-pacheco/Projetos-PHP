<?
class seguranca{
	function verifica_id(){
	global $id_usuario,$cookie_comercio;
		if(!session_is_registered(id_usuario)){
			if(!$cookie_comercio['id']){
				unset($id_usuario);
			}
		}	
	return $id_usuario;
	}
}
?>