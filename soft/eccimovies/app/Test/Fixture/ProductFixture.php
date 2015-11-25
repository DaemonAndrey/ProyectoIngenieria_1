<?php
class ProductFixture extends CakeTestFixture {

	public $import = array('model' => 'Product');

	public $records = array(
		array(
			'id' => 1,
			'code' => 'PIX-B001',
			'name' => 'Pixels',
			'price' => 18.92,
			'discount' => 0,
			'stock_quantity' => 78,
			'format' => 'Blu-Ray',
			'languages' => 'English',
			'subtitles' => 'English, Spanish',
			'release_year' => 2015,
			'runtime' => 106,
			'more_details' => 'Directed by: Chris Columbus; Produced by: Adam Sandler, Chris Columbus, Allen Covert, Mark Radcliffe; Story by: Tim Herlihy; Music by: Henry Jackman; Sinopsis: When aliens misinterpret video feeds of classic arcade games as a declaration of war, they attack the Earth in the form of the video games.',
			'subcategory_id' => 2,
			'enable' => 1
		),
		array(
			'id' => 2,
			'code' => 'AMU-8795',
			'name' => 'American Ultra',
			'price' => 20.90,
			'discount' => '0',
			'stock_quantity' => 19,
			'format' => 'Blu-Ray',
			'languages' => 'English, Spanish, French, Portuguese',
			'subtitles' => 'English, Spanish, French, Portuguese',
			'release_year' => 2015,
			'runtime' => 96,
			'more_details' => 'Directed by: Nima Nourizadeh; Produced by: David Alpert, Anthony Bregman, Mark Fasano, Kevin Scott Frakes, Britton Rizzio, Raj Brinder Singh; Story by: Max Landis; Music by: Marcelo Zarvos; Sinopsis: A stoner - who is in fact a government agent - is marked as a liability and targeted for extermination. But hes too well-trained and too high for them to handle.',
			'subcategory_id' => 2,
			'enable' => 1
		),
		array(
			'id' => 3,
			'code' => 'KAS-1456',
			'name' => 'Kick-Ass',
			'price' => 3.99,
			'discount' => 0,
			'stock_quantity' => 102,
			'format' => 'DVD',
			'languages' => 'English, Spanish',
			'subtitles' => 'English, Spanish',
			'release_year' => 2010,
			'runtime' => 117,
			'more_details' => 'Directed by: Matthew Vaughn; Produced by: Matthew Vaughn, Brad Pitt, Kris Thykier, Adam Bohling, Tarquin Pack, David Reid, Jai Govan, Lewis Govan; Story by: Mark Millar, John Romita, Jr.; Music by: John Murphy, Henry Jackman, Marius de Vries, lan Eshkeri; Sinopsis: Dave Lizewski is an unnoticed high school student and comic book fan who one day decides to become a super-hero, even though he has no powers, training or meaningful reason to do so.',
			'subcategory_id' => 2,
			'enable' => 1
		),
		array(
			'id' => 4,
			'code' => 'MRS-5789',
			'name' => 'Mr. & Mrs. Smith',
			'price' => 14.58,
			'discount' => 0,
			'stock_quantity' => 87,
			'format' => 'DVD',
			'languages' => 'English',
			'subtitles' => 'English, Spanish, Chinese, Portugues',
			'release_year' => 2005,
			'runtime' => 110,
			'more_details' => 'Directed by: Doug Liman; Produced by: 	Akiva Goldsman, Arnon Milchan, Lucas Foster; Story by: Tim Herlihy; Music by: John Powell; Sinopsis: A bored married couple is surprised to learn that they are both assassins hired by competing agencies to kill each other.',
			'subcategory_id' => 2,
			'enable' => 1
		),
		array(
			'id' => 5,
			'code' => 'GST-9877',
			'name' => 'Get Smart',
			'price' => 3.74,
			'discount' => 0,
			'stock_quantity' => 75,
			'format' => 'DVD',
			'languages' => 'English',
			'subtitles' => 'English, Spanish',
			'release_year' => 2008,
			'runtime' => 106,
			'more_details' => 'Directed by: Peter Segal; Produced by:Alex Gartner, Charles Roven, Andrew Lazar, Michael Ewing; Story by: Tom J. Astle, Matt Ember; Music by: Trevor Rabin; Sinopsis:  highly intellectual but socially awkward spy is tasked with preventing a terrorist attack from a Russian spy agency.',
			'subcategory_id' => 2,
			'enable' => 1
		),
	);

}
