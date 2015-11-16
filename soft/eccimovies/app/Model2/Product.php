<?php

App::uses( 'AppModel', 'Model' );

class Product extends AppModel
{

	public $belongsTo = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasAndBelongsToMany = array
	(
		'Actor' => array(
			'className' => 'Actor',
			'joinTable' => 'actors_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'actor_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Cart' => array(
			'className' => 'Cart',
			'joinTable' => 'carts_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'cart_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Combo' => array(
			'className' => 'Combo',
			'joinTable' => 'combos_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'combo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Invoice' => array(
			'className' => 'Invoice',
			'joinTable' => 'invoices_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'invoice_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Wishlist' => array(
			'className' => 'Wishlist',
			'joinTable' => 'products_wishlists',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'wishlist_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public $hasMany = array('CartProduct');

	/**
	public $belongsTo = array ('Subcategory' => array(	'className' => 'Subcategory',
														'foreignKey' => 'subcategory_id'
													),
								'Category' => array(	'className' => 'Category',
														'foreignKey' => false,
														'conditions' => 'Subcategory.category_id = Category.id'
													)
							);
	**/

	// Valida los campos de la tabla Productos a la hora de agregar
	public $validate = array(	'search' => array( 'regla1' => array(	'rule' => array('notBlank'),
																		'message' => 'Debe escribir algo antes.'
																	)
												),

								'id' => array( 'regla1' => array(	'rule' => 'isUnique',
																	'on' => 'create',
																	'message' => 'Este código ya está registrado.'
																 ),
												'regla2' => array(
																	'rule' => array('notBlank'),
																	'message' => 'Debe escribir un código para el producto.'
																 ),

												'regla3' => array(
																	'rule' => array('custom', '/^[A-Z]{3}\-[0-9]{4}$/'),
																	'message' => 'Debe seguir el formato AAA-0000.'
																 )
											),
								'name' => array('regla1' => array(	'rule' => array('notBlank'),
																	'message' => 'Debe escribir el nombre del producto.'
																)
															),
								'price' => array('regla1' => array(	'rule' => array('notBlank'),
																	'message' => 'Debe ingresar el precio del producto.'
																				 ),
												'regla2' => array(	'rule' => array('decimal'),
																	'message' => 'Solo se permiten números.'
																 ),
												'regla3' => array(	'rule' => array('comparison', '>=', 0),
																	'message' => 'Solo se permiten números mayores o iguales a 0.'
																 )
											),
								'stock_quantity' => array( 'regla1' => array(	'rule' => array('naturalNumber',true),
																				'message' => 'Solo se permiten números mayores o iguales a 0.'
																			)
														),
								'format' => array( 	'regla1' => array(	'rule' => array('notBlank'),
																		'message' => 'Debe ingresar el formato del producto.'
																	),
													'regla2' => array(	'rule' => array('inList', array('DVD', 'Blu-ray')),
																		'message' => 'Los formatos válidos son DVD o Blu-ray'
																	 )
												),
								'languages' => array( 'regla1' => array(	'rule' => array('notBlank'),
																			'message' => 'Agregue el idioma original de este producto.'
																		),
													),
								'subtitles' => array( 'regla1' => array(	'rule' => array('custom', '/^([A-zÁ-ú]([\,\sA-zÁ-ú]{0,})){0,}$/'),
																			'message' => 'No se permiten números.'
																		)
													),
								'release_year' => array(	'regla1' => array(	'rule' => array('date','y'),
																				'message' => 'Debe escribir únicamente el año de lanzamiento del producto.'
																			),
															'regla2' => array(	'rule' => array('notBlank'),
																				'message' => 'Debe escribir el año de lanzamiento del producto.'
																			)
														),
								'runtime' => array( 'regla1' => array(	'rule' => array('naturalNumber',true),
																		'message' => 'Solo se permiten números mayores o iguales a 0.'
																	)
												),
								'more_details' => array( 'regla1' => array(	'rule' => array('notBlank'),
																			'message' => 'Agregue la información adicional para este producto.'
																		),
														)
	);
}

?>
