<?php
abstract class Form {

    private $formId;

    private $action;

    protected $opciones;

    public function __construct($formId, $opciones = array() )
    {
        $this->formId = $formId;

        $opcionesPorDefecto = array( 'action' => null, );
        $opciones = array_merge($opcionesPorDefecto, $opciones);

        $this->action = $opciones['action'];
        
        if ( !$this->action ) {
            $this->action = htmlentities($_SERVER["REQUEST_URI"]);
        }

    }
	
    public function gestiona()
    {   
        if ( ! $this->formularioEnviado($_POST) ) {
            return $this->generaFormulario();
        } else {
            
            $result = $this->procesaFormulario($_POST);
            if ( is_array($result) ) {
                return $this->generaFormulario($result, $_POST);
            } else {
                header('Location: ' .$result);
                exit();
            }
        }  
    }

    protected static function generaCamposFormulario($datosIniciales) {
        return '';
    }

    protected function procesaFormulario($datos) {
        return array();
    }

    private function formularioEnviado(&$params) {
        return isset($params['action']) && $params['action'] == $this->formId;
    }

    private function generaFormulario($errores = array(), &$datos = array())
    {
       
        $html= $this->generaListaErrores($errores);

        $html .= '<form method="POST" action="'.$this->action.'" id="'.$this->formId.'" enctype="multipart/form-data">';
        $html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';
        
        $html .= $this->generaCamposFormulario($datos);
        $html .= '</form>';
       
        return $html;
    }
	
	/*public function generaFormularioVenta(){
		$datosIniciales = array();
        $html ='';
        $html .= '<form method="POST" enctype="multipart/form-data">';
        $html .= formularioAnadirVenta::generaCamposFormulario($datosIniciales);
        $html .= '</form>';
        return $html;
    }*/
	

    private function generaListaErrores($errores)
    {
        $html='';
        $numErrores = count($errores);
        if (  $numErrores == 1 ) {
            $html .= "<ul><li>".$errores[0]."</li></ul>";
        } else if ( $numErrores > 1 ) {
            $html .= "<ul><li>";
            $html .= implode("</li><li>", $errores);
            $html .= "</li></ul>";
        }
        return $html;
    }
}