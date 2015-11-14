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

CREATE TABLE countries (
	id 			INT 			UNSIGNED AUTO_INCREMENT,
	name 		VARCHAR( 20 ) 	NOT NULL,

	PRIMARY KEY ( id )
);

CREATE TABLE states (
	id 			INT 			UNSIGNED AUTO_INCREMENT,
	country_id	INT 			UNSIGNED NOT NULL,
	name		VARCHAR( 40 ) 	NOT NULL,

	PRIMARY KEY ( id ),
	FOREIGN KEY	( country_id ) REFERENCES countries ( id )
);

CREATE TABLE addresses
(
	id				INT				UNSIGNED AUTO_INCREMENT,
	user_id			INT				UNSIGNED NOT NULL,
	type			VARCHAR( 32 ) 	NOT NULL,
	state_id		INT				UNSIGNED NOT NULL,
	full_address	TEXT			NOT NULL,

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id ),
	FOREIGN KEY	( state_id ) REFERENCES states ( id )
);

-- Tabla de métodos de pago de usuarios
CREATE TABLE payment_methods
(
	id				INT				UNSIGNED AUTO_INCREMENT,
	user_id			INT		 		UNSIGNED NOT NULL,
	issuer			VARCHAR( 32 ) 	NOT NULL, 		-- Paypal, Visa, MasterCard, AmericanExpress
	account			VARCHAR( 32 ) 	UNIQUE NOT NULL,		-- card_number or paypal_account
	password		VARCHAR( 32 )	DEFAULT NULL,	-- password for paypal account
	name_card		VARCHAR( 32 )	DEFAULT NULL,   -- name_on_card
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
	total   DECIMAL (8,2) DEFAULT 0,
	payment_method_id	INT	UNSIGNED NOT NULL,
	address_id INT	UNSIGNED NOT NULL,
	date	DATE,

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
	name			VARCHAR( 64 )	NOT NULL,
	price			DECIMAL( 5, 2 )	NOT NULL DEFAULT 0,
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
	user_id		INT UNSIGNED UNIQUE,
	subtotal	DECIMAL( 8, 2 ) DEFAULT 0,

	PRIMARY KEY ( id ),
	FOREIGN KEY	( user_id ) REFERENCES users ( id )
		ON UPDATE CASCADE,
	CHECK ( subtotal >= 0 )
);

CREATE TABLE wishlists
(
	id		INT	UNSIGNED AUTO_INCREMENT,
	user_id	INT UNSIGNED UNIQUE,

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
	price		DECIMAL( 8, 2 ) DEFAULT 0,

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
	account			VARCHAR( 32 ) 	UNIQUE NOT NULL,		-- card_number or paypal_account
	password		VARCHAR( 32 )	DEFAULT NULL,	-- password for paypal account
	name_card		VARCHAR( 32 )	DEFAULT NULL,   -- name_on_card
	expiration		DATE			DEFAULT NULL,	-- expiration_date
	security_code	CHAR( 3 )		DEFAULT NULL,
	funds 			DECIMAL( 8, 2 ) DEFAULT 0,  		-- available money

	PRIMARY KEY ( id )
);

CREATE TABLE historic_invoices
(
	id		INT	UNSIGNED AUTO_INCREMENT,
	shippping_price DECIMAL (8,2) DEFAULT 0,
	tax     DECIMAL (8,2) DEFAULT 0,
	total   DECIMAL (8,2) DEFAULT 0,
	payment_method_account	VARCHAR( 32 ) 	NOT NULL,
	address_full_address	TEXT,
    user_gender CHAR (1),
    user_first_name VARCHAR (32),
    user_last_name VARCHAR (32),
    invoice_date DATETIME,
    invoice_status varchar (32),

	PRIMARY KEY ( id )
);

CREATE TABLE historic_products
(
	id						INT	UNSIGNED AUTO_INCREMENT,
	product_quantity		INT DEFAULT 0,
	product_price			DECIMAL( 8, 2 ) DEFAULT 0,
	product_name 			VARCHAR( 64 ),
	product_format 			VARCHAR( 32 ),

	PRIMARY KEY ( id )
);

CREATE TABLE historic_invoices_historic_products
(
	id						INT	UNSIGNED AUTO_INCREMENT,
	historic_invoice_id		INT UNSIGNED NOT NULL,
	historic_product_id		INT UNSIGNED NOT NULL,

	PRIMARY KEY ( id ),
	FOREIGN KEY ( historic_invoice_id ) REFERENCES historic_invoices ( id ),
	FOREIGN KEY ( historic_product_id ) REFERENCES historic_products ( id )
);

-- Trigger para poder borrar una categoría y que se reubiquen las subcategorías en un tipo de categoría "Sin Categoría"
CREATE TRIGGER on_delete_set_default
BEFORE DELETE
ON categories
FOR EACH ROW
	UPDATE subcategories
	SET category_id = 1
	WHERE category_id = old.id;

CREATE TRIGGER on_delete_set_default_subcat
BEFORE DELETE
ON subcategories
FOR EACH ROW
	UPDATE products
	SET subcategory_id = 1
	WHERE subcategory_id = old.id;

-- Trigger para actualizar el subtotal en carrito cuando se agrega producto
DELIMITER //
CREATE TRIGGER on_insert_product_update_subtotal
AFTER INSERT
ON carts_products
FOR EACH ROW
BEGIN
	DECLARE subtotal_anterior DECIMAL(8,2);
	DECLARE precio DECIMAL(8,2);
	DECLARE cantidad INT;

	SET subtotal_anterior = ( SELECT c.subtotal FROM carts c WHERE c.id = NEW.cart_id );
	SET precio = ( SELECT p.price FROM products p WHERE p.id = NEW.product_id );
	SET cantidad = ( SELECT cp.quantity FROM carts_products cp WHERE cp.id = NEW.id );

	UPDATE carts
	SET subtotal = subtotal_anterior + ( precio * cantidad )
	WHERE id = NEW.cart_id;
END; //
DELIMITER ;

-- Trigger para actualizar el subtotal en carrito cuando se actualiza producto
DELIMITER //
CREATE TRIGGER on_update_cart_update_subtotal
AFTER UPDATE
ON carts_products
FOR EACH ROW
BEGIN
	DECLARE subtotal_anterior DECIMAL(8,2);
	DECLARE cantidad_anterior INT;
	DECLARE subtotal_nuevo DECIMAL(8,2);
	DECLARE cantidad_nueva INT;
	DECLARE precio DECIMAL(8,2);

	SET subtotal_anterior = ( SELECT c.subtotal FROM carts c WHERE c.id = NEW.cart_id );
	SET cantidad_anterior = ( SELECT OLD.quantity FROM carts_products cp WHERE cp.id = NEW.id );
	SET cantidad_nueva = ( SELECT cp.quantity FROM carts_products cp WHERE cp.id = NEW.id );
	SET precio = ( SELECT p.price FROM products p WHERE p.id = NEW.product_id );

	IF cantidad_nueva > cantidad_anterior THEN
		SET subtotal_nuevo = subtotal_anterior + ( precio * ( cantidad_nueva - cantidad_anterior ) );
	ELSEIF cantidad_nueva < cantidad_anterior THEN
		SET subtotal_nuevo = subtotal_anterior - ( precio * ( cantidad_anterior - cantidad_nueva ) );
	END IF;

	UPDATE carts
	SET subtotal = subtotal_nuevo
	WHERE id = NEW.cart_id;
END; //
DELIMITER ;

-- Trigger para actualizar el subtotal en carrito cuando se elimina producto
DELIMITER //
CREATE TRIGGER on_delete_product_update_subtotal
BEFORE DELETE
ON carts_products
FOR EACH ROW
BEGIN
	DECLARE subtotal_anterior DECIMAL(8,2);
	DECLARE cantidad_anterior INT;
	DECLARE subtotal_nuevo DECIMAL(8,2);
	DECLARE precio DECIMAL(8,2);

	SET subtotal_anterior = ( SELECT c.subtotal FROM carts c WHERE c.id = OLD.cart_id );
	SET cantidad_anterior = ( SELECT cp.quantity FROM carts_products cp WHERE cp.id = OLD.id );
	SET precio = ( SELECT p.price FROM products p WHERE p.id = OLD.product_id );

	SET subtotal_nuevo = subtotal_anterior - ( precio * cantidad_anterior );

	UPDATE carts
	SET subtotal = subtotal_nuevo
	WHERE id = OLD.cart_id;
END; //
DELIMITER ;

-- Trigger para verificar los metodos de pagos antes de agregarlos
DELIMITER //
CREATE TRIGGER `verificar_cuentas`
BEFORE INSERT
ON `payment_methods`
FOR EACH ROW
BEGIN
	DECLARE total	INT; -- cantidad de tuplas del select
	-- selecciona cuantas tuplas en valid_accounts cumplen las condiciones y pone la cantidad en 'total'
	IF ( NEW.issuer = 'PayPal') -- si es una cuenta de paypal
		THEN
			SET total =	(	SELECT COUNT(*)
							FROM valid_accounts V
							WHERE	V.issuer = NEW.issuer
							AND	V.account = NEW.account
							AND V.password = NEW.password
							);
		ELSE -- si es una tarjeta
			SET total =	(	SELECT COUNT(*)
							FROM valid_accounts V
							WHERE	V.issuer = NEW.issuer
							AND	V.account = NEW.account
							AND	V.name_card = NEW.name_card
							AND V.expiration = NEW.expiration
							AND	V.security_code = NEW.security_code
							);
	END IF;
	-- si la cantidad de tuplas es diferente de 1
	-- es porque no existe la cuenta nueva en la tabla de valid_accounts
	IF ( total <> 1 )
		THEN -- Cancela el insert y envia un mensaje
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'The account is not valid.';
	END IF;
END; //
DELIMITER ;
