use BD_ECCIMovies;

CREATE TABLE users
(
	id			INT				UNSIGNED AUTO_INCREMENT,
	username	VARCHAR( 64 ),
	password	VARCHAR( 255 )	NOT NULL,
	first_name	VARCHAR( 32 )	NOT NULL,
	last_name	VARCHAR( 32 )	NOT NULL,
	gender		CHAR( 1 )      	NOT NULL,
	birthday	DATE            NOT NULL,
	role		INT( 1 )		DEFAULT 0,	-- 0 = Comprador, 1 = Administrador, 2 = Gerente
	enable		BIT( 1 )		DEFAULT 1,	-- 1 = Activo, 0 = Inactivo
	PRIMARY KEY ( id )
);

CREATE TABLE addresses
(
	id				INT		UNSIGNED AUTO_INCREMENT,
	user_id			INT		UNSIGNED,
	type			VARCHAR( 32 ),
	country			VARCHAR( 32 ),
	state			VARCHAR( 32 ),
	zipcode			VARCHAR( 16 ),
	full_address	TEXT,

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id )
);

CREATE TABLE payment_methods
(
	id				INT				UNSIGNED AUTO_INCREMENT,
	user_id			INT		 		UNSIGNED NOT NULL,
	issuer			VARCHAR( 32 ) 	NOT NULL, 		-- Paypal, Visa, MasterCard, AmericanExpress
	account			VARCHAR( 32 ) 	NOT NULL,		-- card_number or paypal_account
	name_Card		VARCHAR( 32 )	DEFAULT NULL,   -- name_on_card
	expiration		DATE			DEFAULT NULL,	-- expiration_date
	security_code	CHAR( 3 )		DEFAULT NULL,
	enable			BIT( 1 )		DEFAULT 1,		-- 1 = Activo, 0 = Inactivo

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id )
		ON UPDATE CASCADE
);

CREATE TABLE invoices
(
	id		INT	UNSIGNED AUTO_INCREMENT,
    shippping_price DECIMAL (8,2),
    tax     DECIMAL (8,2),
    total   DECIMAL (8,2),
	payment_method_id	INT	UNSIGNED NOT NULL,
    address_id INT UNSIGNED NOT NULL,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( payment_method_id ) REFERENCES payment_methods ( id ),
    FOREIGN KEY ( address_id ) REFERENCES addresses ( id ),  
    CHECK ( total >= 0 )
);

CREATE TABLE categories
(
	id				INT	UNSIGNED AUTO_INCREMENT,
	category_name	VARCHAR( 32 ),

	PRIMARY KEY ( id )
);

CREATE TABLE subcategories
(
	id					INT	UNSIGNED	AUTO_INCREMENT,
	category_id			INT	UNSIGNED
		DEFAULT 1
		REFERENCES categories ( id )
		ON UPDATE CASCADE
		ON DELETE SET DEFAULT,
	subcategory_name	VARCHAR( 32 ),

	PRIMARY KEY ( id )/*,
	FOREIGN KEY ( category_id ) REFERENCES categories ( id )
		ON UPDATE CASCADE
		ON DELETE SET DEFAULT*/
);

CREATE TABLE products
(
	id				INT	UNSIGNED AUTO_INCREMENT,
	code			VARCHAR( 8 ) UNIQUE,
	name			VARCHAR( 32 )	NOT NULL,
	price			DECIMAL( 5, 2 )	NOT NULL,
	stock_quantity	INT DEFAULT 0,
	format			VARCHAR( 32 ),
	languages		VARCHAR( 64 ),
	subtitles		VARCHAR( 64 ),
	release_year	YEAR( 4 ),
	runtime			SMALLINT UNSIGNED,
	more_details	VARCHAR( 1500 ),
	subcategory_id	INT	UNSIGNED,
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
	id			INT	UNSIGNED AUTO_INCREMENT,
	full_name	VARCHAR( 64 ) UNIQUE,

	PRIMARY KEY ( id )
);

CREATE TABLE actors_products
(
	id			INT	UNSIGNED AUTO_INCREMENT,
	actor_id	INT	UNSIGNED,
	product_id	INT	UNSIGNED,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( actor_id ) REFERENCES actors ( id ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id )
);

CREATE TABLE carts
(
	id			INT	UNSIGNED AUTO_INCREMENT,
	user_id		INT UNSIGNED,
	subtotal	DECIMAL( 8, 2 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id )
		ON UPDATE CASCADE,
	CHECK ( subtotal >= 0 )
);

CREATE TABLE wishlists
(
	id		INT	UNSIGNED AUTO_INCREMENT,
	user_id	INT UNSIGNED,

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id )
		ON UPDATE CASCADE
);

CREATE TABLE carts_products
(
	id			INT	UNSIGNED AUTO_INCREMENT,
	cart_id		INT	UNSIGNED,
	product_id	INT	UNSIGNED,
	quantity	INT DEFAULT 1,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( cart_id ) REFERENCES carts ( id ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id ),
	CHECK ( quantity > 0 )
);

CREATE TABLE products_wishlists
(
	id			INT	UNSIGNED AUTO_INCREMENT,
	wishlist_id	INT	UNSIGNED NOT NULL,
	user_id		INT	UNSIGNED NOT NULL,
	product_id	INT	UNSIGNED NOT NULL,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( wishlist_id ) REFERENCES wishlists ( id ),
	FOREIGN KEY ( user_id ) REFERENCES users ( id )
		ON UPDATE CASCADE,
	FOREIGN KEY ( product_id ) REFERENCES products ( id )
);

CREATE TABLE invoices_products
(
	id			INT	UNSIGNED AUTO_INCREMENT,
	invoice_id	INT	UNSIGNED NOT NULL,
	product_id	INT	UNSIGNED NOT NULL,
	quantity	INT,
	price		DECIMAL( 8, 2 ),

	PRIMARY KEY ( id ),
	FOREIGN KEY ( invoice_id ) REFERENCES invoices ( id ),
	FOREIGN KEY ( product_id ) REFERENCES products ( id ),
	CHECK ( quantity > 0 ),
	CHECK ( price >= 0 )
);

-- Tabla creada para simular "cuentas válidas"
CREATE TABLE valid_accounts
(
	id				INT	UNSIGNED AUTO_INCREMENT,
	issuer			VARCHAR( 32 ) 	NOT NULL, 		-- Paypal, Visa, MasterCard, AmericanExpress
	account			VARCHAR( 32 ) 	NOT NULL,		-- card_number or paypal_account
	name_Card		VARCHAR( 32 )	DEFAULT NULL,   -- name_on_card
	expiration		DATE			DEFAULT NULL,	-- expiration_date
	security_code	CHAR( 3 )		DEFAULT NULL,
	funds 			DECIMAL( 8, 2 ) DEFAULT 0,  		-- available money

	PRIMARY KEY ( id )
);

-- Trigger para poder borrar una categoría y que se reubiquen las subcategorías en un tipo de categoría "Sin Categoría"
CREATE TRIGGER on_delete_set_default
BEFORE DELETE ON categories
FOR EACH ROW
	UPDATE subcategories
		SET category_id = 1
		WHERE category_id = old.id
;
