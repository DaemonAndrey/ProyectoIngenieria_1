use BD_ECCIMovies;
/*
DROP TABLE carts_products;
DROP TABLE products_wishlists;
DROP TABLE actors_products;
DROP TABLE invoices_products;
DROP TABLE products;
DROP TABLE subcategories;
DROP TABLE categories;
DROP TABLE actors;
DROP TABLE invoices;
DROP TABLE carts;
DROP TABLE wishlists;
DROP TABLE valid_accounts;
DROP TABLE payment_methods;
DROP TABLE addresses;
DROP TABLE users;
*/
CREATE TABLE users
(
	username	VARCHAR( 64 ),
	password	VARCHAR( 255 )	NOT NULL,
	first_name	VARCHAR( 32 )	NOT NULL,
	last_name	VARCHAR( 32 )	NOT NULL,
	gender		CHAR( 1 )      	NOT NULL,
	birthday	DATE            NOT NULL,
	role		INT( 1 )		DEFAULT 0,	-- 0 = Comprador, 1 = Administrador, 2 = Gerente
	enable		BIT( 1 )		DEFAULT 1,	-- 1 = Activo, 0 = Inactivo

	PRIMARY KEY ( username )
);

CREATE TABLE addresses
(
	id				CHAR( 36 ),
	user_id			VARCHAR( 64 ),
	type			VARCHAR( 32 ),
	country			VARCHAR( 32 ),
	state			VARCHAR( 32 ),
	zipcode			VARCHAR( 16 ),
	full_address	VARCHAR( 255 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( username )
);

CREATE TABLE payment_methods
(
	account	VARCHAR( 32 ),
	issuer	VARCHAR( 32 ) NOT NULL,
	enable	BIT( 1 ) DEFAULT 1,	-- 1 = Activo, 0 = Inactivo

	PRIMARY KEY ( account )
);

CREATE TABLE invoices
(
	consecutive_number	INT AUTO_INCREMENT,
	payment_method_id	VARCHAR( 32 )	NOT NULL,

	PRIMARY KEY ( consecutive_number ),
	FOREIGN KEY ( payment_method_id ) REFERENCES payment_methods ( account )
);

CREATE TABLE categories
(
	id				CHAR( 36 ),
	category_name	VARCHAR( 32 ),

	PRIMARY KEY ( id )
);

CREATE TABLE subcategories
(
	id					CHAR( 36 ),
	category_id			CHAR( 36 ) DEFAULT 'ND' REFERENCES categories ( id )
		ON UPDATE CASCADE
		ON DELETE SET DEFAULT,
	subcategory_name	VARCHAR( 32 ),

	PRIMARY KEY ( id )
);

CREATE TABLE products
(
	id				CHAR( 36 ),
	code			VARCHAR( 8) UNIQUE,
	name			VARCHAR( 32 )	NOT NULL,
	price			DECIMAL( 5, 2 )	NOT NULL,
	stock_quantity	INT DEFAULT 0,
	format			VARCHAR( 32 ),
	languages		VARCHAR( 32 ),
	subtitles		VARCHAR( 64 ),
	release_year	YEAR( 4 ),
	runtime			SMALLINT UNSIGNED,
	more_details	VARCHAR( 1500 ),
	subcategory_id	CHAR( 36 ),
	enable			BIT( 1 ) DEFAULT 1,		-- 1 = Activo, 0 = Inactivo

	PRIMARY KEY ( id ),
	FOREIGN KEY ( subcategory_id ) REFERENCES subcategories ( id )
		ON UPDATE CASCADE
		ON DELETE SET NULL,
	CHECK ( stock_quantity >= 0 ),
	CHECK ( price >= 0 ),
	CHECK ( runtime >= 0 )
);

CREATE TABLE actors
(
	full_name	VARCHAR( 64 ),

	PRIMARY KEY ( full_name )
);

CREATE TABLE actors_products
(
	id 			CHAR( 36 ),
	product_id	CHAR( 36 ),
	actor_id	VARCHAR( 64 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY ( actor_id ) REFERENCES actors ( full_name ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id )
);

CREATE TABLE carts
(
	id			CHAR( 36 ),
	user_id		VARCHAR( 64 ),
	subtotal	DECIMAL( 8, 3 ),
	total		DECIMAL( 8, 3 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( username ),
	CHECK ( subtotal >= 0 ),
	CHECK ( total >= 0 )
);

CREATE TABLE wishlists
(
	id		CHAR( 36 ),
	user_id	VARCHAR( 64 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( username )
);

CREATE TABLE carts_products
(
	id			CHAR( 36 ),
	cart_id		CHAR( 36 ),
	user_id		VARCHAR( 64 ),
	product_id	CHAR( 36 ),
	quantity	INT DEFAULT 1,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( cart_id ) REFERENCES carts ( id ),
	FOREIGN KEY ( user_id ) REFERENCES users ( username ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id ),
	CHECK ( quantity > 0 )
);

CREATE TABLE products_wishlists
(
	id			CHAR( 36 ),
	cart_id		CHAR( 36 ),
	user_id		VARCHAR( 64 ),
	product_id	CHAR( 36 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY ( cart_id ) REFERENCES carts ( id ),
	FOREIGN KEY ( user_id ) REFERENCES users ( username ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id )
);

CREATE TABLE invoices_products
(
	id			CHAR( 36 ),
	invoice_id	INT,
	product_id	CHAR( 36 ),
	quantity	INT,
	price		DECIMAL( 8, 3 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY ( invoice_id ) REFERENCES invoices ( consecutive_number ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id ),
	CHECK ( quantity > 0 )
);

-- Tabla creada para simular "cuentas válidas"
CREATE TABLE valid_accounts
(
	id 				CHAR( 36 ),
	issuer			VARCHAR( 32 ),
	account			VARCHAR( 32 ),
	security_code 	INT(3) default null,
	funds 			DECIMAL(8.2),

	PRIMARY KEY( id )
);

--Trigger para poder borrar una categoría y que se reubiquen las subcategorías en un tipo de categoría "Sin Categoría"
CREATE TRIGGER on_delete_set_default BEFORE DELETE ON categories FOR EACH ROW
BEGIN
	UPDATE subcategories  
	SET category_id = 'ND'
	WHERE category_id = old.id;
END;
