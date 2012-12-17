<?php 
/**
 * HELPER FORM
 * Ce helper permet la gestion des formulaires
 * Il permet la création et la fermeture des formulaires
 * Il permet également la génération des différents champs input
 */

/**
 * Cette fonction va créer le formulaire avec les options indiquées
 *
 * @param 	array 	$options Tableau des options possibles
 * @return	varchar Chaine de caractères contenant la balise de début de formulaire
 * @access	public
 */
	function form_create($options = array()) {

		$html = '<form'; 
		foreach($options as $k => $v) { $html .= ' '.$k.'="'.$v.'"'; } //Parcours des options
		$html .= '>';
		return $html;
	}

/**
 * Cette fonction va générer le code html permettant la fermeture du formulaire
 * 
 * @param 	boolean	$button Si vrai alors on rajoute la ligne du bouton valider
 * @return 	varchar Code html de la fermeture du formulaire
 * @access	public
 */
	function form_close($button = true) {
	
		$html = '';
		if($button) { $html .= '<div class="row"><button type="submit" class="medium grey"><span>Valider</span></button></div>'; }
		$html .= '</form>';
		return $html;
	}

/**
 * Cette fonction va générer le code html permettant l'affichage du champ input
 * 
 * $options -->
 * les index possibles de cette variables sont :
 * - type : type du champ input (optionnel par défaut text)
 * - class : classe css à appliquer (optionnel)
 * - errors : tableau des erreurs éventuelles (optionnel)
 * - values : tableau contenant la liste des valeurs des champs du formulaire
 * - wysiswyg : booléen permettant d'indiquer si CKEditor doit être lancé
 * - datas : tableau contenant la liste des valeurs du champ select
 * - label_bis : chaine de caractères contenant l
 *
 * @param 	varchar $name 		Valeur de l'attribut name
 * @param 	varchar $label 		Valeur du label
 * @param 	array	$options 	Tableau des options
 * @return 	varchar Code html du champ input
 * @access	public
 */
	function form_input($name, $label, $options = array()) {

		$except = array('type', 'errors', 'values', 'wysiswyg', 'datas', 'label_bis'); //Champs à échaper
	
		//Mise en place des options par défaut
		$defaultOptions = array(
			'type' => 'text',
			'wysiswyg' => false,
			'datas' => array(),
			'label_bis' => '',
			'class' => ''
		);
		$options = array_merge($defaultOptions, $options);		
	
		$html = '<div class="row">';
			$html .= '<label>'.$label.'</label>';
			$html .= '<div class="rowright">';
				
				//GESTION DES ERREURS
				if(isset($options['errors'][$name])) { 
				
					$labelError = '<label for="'.$name.'" class="error">'.$options['errors'][$name].'</label>';
					$options['class'] .= ' error';
				} else {
					
					$labelError = '';
				}
			
				//GESTION DES ATTRIBUTS
				$attr = '';
				foreach($options as $k => $v) { 
				
					if(!in_array($k, $except)) { $attr .= ' '.$k.'="'.$v.'"'; }
				}
				
				//GESTION DE LA VALEUR PAR DEFAUT
				
				if(isset($options['values'][$name])) { $value = $options['values'][$name]; } else { $value = ''; }
				if(isset($options['values']['icone'])) { $value_icone = $options['values']['icone']; } else { $value_icone = ''; }
				if(isset($options['values']['petit_icone'])) { $value_petite_image = $options['values']['petit_icone']; } else { $value_petite_image = ''; }
				
				
				$value_auteur = $_SESSION['user_pseudo'];
				
				$libelleId = _form_generate_id($name);
				switch($options['type']) {
				
					case 'text':
						
						$html .= '<input type="text" '.$attr.' name="'.$name.'" id="'.$libelleId.'" value="'.$value.'" />';								
					break;
					
					case 'text_icone':
						$html .= '<input type="text" '.$attr.' name="'.$name.'" id="'.$libelleId.'" value="'.$value_icone.'" />';								
					break;
					
					case 'text_petite_image':
						$html .= '<input type="text" '.$attr.' name="'.$name.'" id="'.$libelleId.'" value="'.$value_petite_image.'" />';								
					break;
					
					case 'textarea':
					
						$html .= '<textarea '.$attr.' name="'.$name.'" id="'.$libelleId.'">'.$value.'</textarea>';						
						if($options['wysiswyg']) {
							$html .= '<script type="text/javascript">'."\n";
								$html .= '//<![CDATA['."\n";
									$html .= "var ck_".$libelleId."_editor = CKEDITOR.replace('".$libelleId."');"."\n";
									$html .= "CKFinder.setupCKEditor(ck_".$libelleId."_editor, '".BASE_URL."/js/ckfinder/"."');"."\n";
								$html .= '//]]>'."\n";
							$html .= '</script>'."\n";
						}
					break;
					
					case 'select':
					
						$html .= '<select name="'.$name.'" id="'.$libelleId.'">';
						foreach($options['datas'] as $k => $v) {

							if($value == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }							
							$html .= '<option'.$selected.' value="'.$k.'">'.$v.'</option>';
						} 
						$html .= '</select>';								
					break;
					
					case 'checkbox':
					
						if($value) { $checked = 'checked="checked"'; } else { $checked = ''; }
						$html .= '<input type="hidden" value="0" name="'.$name.'" id="'.$libelleId.'Hidden">';
						$html .= '<input type="checkbox" value="1" name="'.$name.'" id="'.$libelleId.'" '.$checked.'>';
						$html .= '<label for="'.$libelleId.'">'.$options['label_bis'].'</label>';					
					break;
					
					case 'submit':
					
						return '<div class="row"><button type="submit" class="medium grey"><span>Valider</span></button></div>';								
					break;
					
					case 'hidden':
					
						return '<input type="hidden" '.$attr.' name="'.$name.'" id="'.$libelleId.'" value="'.$value.'" />';								
					break;
					
					case 'hidden_auteur':
					
						return '<input type="hidden" '.$attr.' name="'.$name.'" id="'.$libelleId.'" value="'.$value_auteur.'" />';								
					break;
				}
			
				$html .= $labelError;	
			$html .= '</div>';
		$html .= '</div>';
		return $html;
	}

/**
 * Cette fonction va générer le libellé de l'attribut id en fonction de la valeur de
 * l'attribut name camelcasé
 * 
 * @param 	varchar $name Valeur de l'attribut name
 * @return 	varchar Libellé de l'attribut id
 * @access	private
 */
	function _form_generate_id($name) {
		
		$libelleId = 'Input';
		$libelleParams = explode('_', $name);
		foreach($libelleParams as $v) { $libelleId .= ucfirst($v); }
		return $libelleId;
	}