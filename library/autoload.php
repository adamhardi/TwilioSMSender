<?php
namespace RuthvensLibrary;

defined('PATH') or die('path not defined.');
require PATH.'/library/climate/autoload.php';
require PATH.'/library/twilio/autoload.php';
require PATH.'/library/ruthvens/library.ruthvens.php';
require PATH.'/config.php';

use \League\CLImate\CLImate as CLImate;
use \Twilio\Rest\Client as Client;
use Content\RuthvensFams as Ruthvens;

class LetsPlay extends Ruthvens{
    public function __construct($c)
	{
        $this->prout = new CLImate;
		$this->config = $c;
		
		$this->start();
    }
    
    public function start()
	{
		if( file_exists($this->path('api/'. $this->config['key'])) AND !empty(file_get_contents($this->path('api/' . $this->config['key']))) )
		{
			$this->menu();
		}
		else
		{
			$this->prout->error('Apikey not found!');exit();
		}
	}

	public function menu()
	{
		$this->prout->clear();
		$this->banner();
		/* menu */
		$this->prout->shout()->flank('Menu', '=*=');
		$this->prout->LightCyan()->out("1. Check API");
		$this->prout->LightCyan()->out("2. Send >");
		$this->prout->LightCyan()->out("0. Exit");
		$input = $this->prout->LightGreen()->input('Choose: ');
		$input->accept([1, 2, 0]);

		$response = $input->prompt();
		if ($response == 1) {
			$this->apicheck();
		} else if ($response == 0) {
			$this->prout->error()->out('Exit.');
			exit;
		} else {
			$this->sendingSMS();
		}

		$this->menu();
	}
}