<?php
require(MODELS.DS.'model.php');
$table = 'contact';
$validate = array(
	'name' => array (
		'rule1' => array (
			'rule' => array ('minLength', 3), 
			'message' => 'La valeur de ce champ est de 3 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 80),
			'message' => 'La valeur de ce champ est de 80 caractères maximum.'

		)

	),
	'prenom' => array (
		'rule1' => array (
			'rule' => array ('minLength', 3), 
			'message' => 'La valeur de ce champ est de 3 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 80),
			'message' => 'La valeur de ce champ est de 80 caractères maximum.'

		)

	),
	'login' => array (
		'rule' => array ('email'), 
		'message' => 'La valeur de ce champ n est pas correct.'
	),
	'pass' => array (
		'rule' => array ('minLength', 3), 
		'message' => 'La valeur de ce champ est de 3 caractères minimum.'
	),
	
	'telephone' => array (
		'rule' => array ('minLength', 10), 
		'message' => 'La valeur de ce champ est de 10 caractères.'
	),
	
	'message' => array (
		'rule' => array ('minLength', 10), 
		'message' => 'La valeur de ce champ est de 10 caractères minimum.'
	),
	'pseudo' => array (
		'rule1' => array (
			'rule' => array ('minLength', 3), 
			'message' => 'La valeur de ce champ est de 3 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 80),
			'message' => 'La valeur de ce champ est de 80 caractères maximum.'

		)

	),
	'adresse_mail' => array (
		'rule' => array ('email'), 
		'message' => 'La valeur de ce champ n est pas correct.'
	),
	'isauth' => array (
		'rule1' => array (
			'rule' => array ('minLength', 1), 
			'message' => 'La valeur de ce champ est de 1 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 1),
			'message' => 'La valeur de ce champ est de 1 caractères maximum.'

		)

	)
	
	
);

