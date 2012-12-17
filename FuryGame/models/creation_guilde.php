<?php
require(MODELS.DS.'model.php');

$validate = array(
	'name' => array (
		'rule1' => array (
			'rule' => array ('minLength', 3), 
			'message' => 'La valeur de ce champ est de 3 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 30),
			'message' => 'La valeur de ce champ est de 30 caractères maximum.'

		)

	),
	'content' => array (
		'rule1' => array (
			'rule' => array ('minLength', 10), 
			'message' => 'La valeur de ce champ est de 10 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 750),
			'message' => 'La valeur de ce champ est de 750 caractères maximum.'

		)
		
	),
	'dicton' => array (
		'rule1' => array (
			'rule' => array ('minLength', 10), 
			'message' => 'La valeur de ce champ est de 10 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 150),
			'message' => 'La valeur de ce champ est de 150 caractères maximum.'

		)
		
	),

);
