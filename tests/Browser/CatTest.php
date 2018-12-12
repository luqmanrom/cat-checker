<?php

namespace Tests\Browser;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CatTest extends DuskTestCase
{


	protected function driver()
	{
		$options = (new ChromeOptions())->addArguments([
			'--disable-gpu'
		]);

		return RemoteWebDriver::create(
			'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
			ChromeOptions::CAPABILITY, $options
		)
		);
	}

	public function testFillInputBox()
	{

		$this->browse(function ($browser)  {

			$input = 'The softbottomcat is jumping over a memecat and fell down on top of catnips';

			$browser->visit('http://localhost:8000/cat')
				->type('input', $input)
				->assertValue('@input-box',$input );
		});
	}

	public function testClearInputBox() {

		$this->browse(function ($browser)  {

			$input = 'The softbottomcat is jumping over a memecat and fell down on top of catnips';

			$browser->visit('http://localhost:8000/cat')
				->type('input', $input)
				->press('Cancel')
				->assertValue('@input-box','');
		});

	}

	public function testSubmitCat() {
		$this->browse(function ($browser)  {

			$input = 'The softbottomcat is jumping over a memecat and fell down on top of catnips';

			$browser->visit('http://localhost:8000/cat')
				->type('input', $input)
				->press('Submit')
				->waitFor('@p-result')
				->assertSee('2 results found: softbottomcat,memecat');
		});
	}

	public function testSubmitNonCat() {
		$this->browse(function ($browser)  {

			$input = 'There is no cat here!';

			$browser->visit('http://localhost:8000/cat')
				->type('input', $input)
				->press('Submit')
				->waitFor('@p-result')
				->assertSee('0 results found');
		});
	}
}
