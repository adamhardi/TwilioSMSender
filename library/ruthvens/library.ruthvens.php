<?php
namespace Content;

defined('PATH') or die('path not defined.');

use \League\CLImate\CLImate as CLImate;
use \Twilio\Rest\Client as Client;
use \Twilio\Exceptions\ConfigurationException as ConfigurationException;

class RuthvensFams{
    /* climate */
    public $prout;

    /* config */
    public $config;

    /* Core */
    public $apis;

    public function path($file)
	{
		return PATH . '/config/' . $file;
    }
    
    public function banner()
	{
		$this->prout->LightMagenta()->border('$', 70);
		$this->prout->LightGreen(
			'██████╗ ██╗   ██╗████████╗██╗  ██╗██╗   ██╗███████╗███╗   ██╗███████╗'
		);
		$this->prout->LightGreen(
			'██╔══██╗██║   ██║╚══██╔══╝██║  ██║██║   ██║██╔════╝████╗  ██║██╔════╝'
		);
		$this->prout->LightGreen(
			'██████╔╝██║   ██║   ██║   ███████║██║   ██║█████╗  ██╔██╗ ██║███████╗'
		);
		$this->prout->LightGreen(
			'██╔══██╗██║   ██║   ██║   ██╔══██║╚██╗ ██╔╝██╔══╝  ██║╚██╗██║╚════██║'
		);
		$this->prout->LightGreen(
			'██║  ██║╚██████╔╝   ██║   ██║  ██║ ╚████╔╝ ███████╗██║ ╚████║███████║'
		);
		$this->prout->LightGreen(
			'╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚═╝  ╚═══╝╚══════╝'
		);
		$this->prout->LightYellow('       ---Twilio SMSender v.1.0 --- by Dams @ Ruthvens Fams---               ');
		$this->prout->LightMagenta()->border('$', 70);

		$this->prout->out(' ');
	}

	public function randomstr($type = 'mix', $kind = 'mix', $length = 12)
	{
		switch ($type) {
			case 'number':
				$res = '0123456789';
				break;

			case 'mix':
				$res = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;

			case 'text':
				$res = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;

			default:
				$res = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
		}

		$strlen = strlen($res);
		$str    = '';
		for ($i = 0; $i < $length; $i++) {
			$str .= $res[rand(0, $strlen - 1)];
		}

		if ($kind == 'upp') {
			$str = strtoupper($str);
		} else if ($kind == 'low') {
			$str = strtolower($str);
		}

		return $str;
	}

	public function getrandom($type = 'null')
	{
		switch ($type) {
			case 'country':
				$data = [
					"Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica",
					"Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
					"Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bonaire",
					"Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam",
					"Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands",
					"Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia",
					"Comoros", "Congo", "Democratic Republic of the Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Cyprus",
					"Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador",
					"Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji",
					"Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia",
					"Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey",
					"Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and Mcdonald Islands", "Holy See (Vatican City State)",
					"Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran, Islamic Republic of", "Iraq", "Ireland",
					"Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
					"Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan",
					"Lao People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
					"Luxembourg", "Macao", "Macedonia, the Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives",
					"Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico",
					"Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco",
					"Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Caledonia", "New Zealand", "Nicaragua",
					"Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau",
					"Palestine, State of", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland",
					"Portugal", "Puerto Rico", "Qatar", "Romania", "Russian Federation", "Rwanda", "Reunion", "Saint Barthelemy",
					"Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre and Miquelon",
					"Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia",
					"Seychelles", "Sierra Leone", "Singapore", "Sint Maarten (Dutch part)", "Slovakia", "Slovenia", "Solomon Islands",
					"Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "South Sudan", "Spain", "Sri Lanka", "Sudan",
					"Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic",
					"Taiwan, Province of China", "Tajikistan", "United Republic of Tanzania", "Thailand", "Timor-Leste", "Togo", "Tokelau",
					"Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda",
					"Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay",
					"Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "British Virgin Islands", "US Virgin Islands", "Wallis and Futuna",
					"Western Sahara", "Yemen", "Zambia", "Zimbabwe", "Aland Islands"
				];
				shuffle($data);
				$res = $data[array_rand($data)];
				break;

			case 'ip':
				$res = "" . mt_rand(1, 255) . "." . mt_rand(1, 255) . "." . mt_rand(1, 255) . "." . mt_rand(1, 255);
				break;

			case 'os':
				$data = ['Windows', 'Ubuntu', 'Mac OS', 'iOS', 'Android', 'Windows Phone'];
				shuffle($data);
				$res = $data[array_rand($data)];
				break;

			case 'device':
				$data = [
					'iPhone 6s', 'Samsung Galaxy S10+', 'Asus Zenfone 5z', 'Ipad Pro', 'iPhone 7+', 'iPhone 7', 'iPhone 8+',
					'Macbook Retina Pro', 'Samsung Galaxy S9+', 'Samsung Galaxy Note 8', 'Samsung Galaxy S8', 'Samsung Galaxy S8+',
					'Samsung Galaxy Note 9', 'iPhone Xs Max', 'iPhone X'
				];
				shuffle($data);
				$res = $data[array_rand($data)];
				break;

			default:
				$res = '';
				break;
		}
		return $res;
	}

	public function custom($key)
	{
		if (!array_key_exists($key, $this->config['tag'])) {
			$body = 'custom tag not found.';
		} else {
			$data = explode('|', $this->config['tag'][$key]);
			shuffle($data);
			$body = $data[array_rand($data)];
		}

		return $body;
	}

	public function replace($text)
	{
		$text = (($this->config['sending']['link'] != '') ? str_ireplace("##link##", $this->config['sending']['link'], $text) : $text);

		$text = preg_replace_callback("/##custom_(\w+)##/", function($matches) { return $this->custom($matches[1]); }, $text);

		$f = [
			"##randip##",
			"##randcountry##",
			"##randos##",
			"##device##",
			"##date_1##",
			"##date_2##",
			"##date_3##",
			"##date_4##"
		];
		$t = [
			$this->getrandom('ip'),
			$this->getrandom('country'),
			$this->getrandom('os'),
			$this->getrandom('device'),
			date('D, F d, Y g:i A'),
			date('D, F d, Y'),
			date('F d, Y g:i A'),
			date('F d, Y')
		];
		$text = str_ireplace($f, $t, $text);

		$text = preg_replace_callback(
			"/##(\w+)_(\w+)_(\d+)##/",
			function($matches) {
				return $this->randomstr($matches[1], $matches[2], $matches[3]);
			},
			$text
		);

		return $text;
	}

	public function apicheck()
	{
		$this->prout->clear();
		$this->banner();
		$this->prout->LightGreen()->flank('API Balance', '#');
		$parse = parse_ini_file($this->path('api/' . $this->config['key']), true);
		foreach ($parse as $key => $perkey) {
			try{
				$catchbalance = new Client($perkey['SID'], $perkey['Token']);
				$fetch = $catchbalance->api->v2010->accounts($perkey['SID'])->fetch();
				$balanceUrl = 'https://api.twilio.com' . $fetch->subresourceUris['balance'];        
				$balanceResponse = $catchbalance->request('GET', $balanceUrl);
				$responseContent = $balanceResponse->getContent();
				//PRINT FETCH RESULT
				$this->prout->inline('SID : ');$this->prout->LightYellow($perkey['SID']);
				$this->prout->inline('Balance : ');$this->prout->LightYellow()->inline($responseContent['balance']);$this->prout->inline(' | ');$this->prout->LightYellow($responseContent['currency']);
				
				$this->prout->border('-', 10);
			}catch (ConfigurationException $e){
				echo 'Caught exception: ', $e.get_code(), "\n";exit;
			}
		}
		
		$this->prout->White(' ');
		$stop = $this->prout->input('Press enter to continue...');
		$stop->prompt();
	}

	public function sendingSMS()
	{
		$this->prout->clear();
		$this->banner();
		/* Filter */
		$this->apis = parse_ini_file($this->path('api/' . $this->config['key']), true);
		$lists = preg_split('/\n|\r\n?/', trim(file_get_contents($this->path('list/'.$this->config['list']['file']))));
		if($this->config['list']['remove_dupp'] == true) 
		{
			$lists = array_unique($lists);
		}
		$lists = array_values(array_filter($lists));

		$i = 0;
		$no = 1;
		$splits = array_chunk($lists, $this->config['sending']['send']);
		$total_list = count($lists);

		foreach ($splits as $split) {

			foreach($split as $k => $send){
				$api = $this->apis[$i % count($this->apis)];

				foreach($api as $k => $v)
				{
					$setting[$k] = $v;
				}
				$setting['message'] = $this->replace(file_get_contents($this->path('msg/'.$this->config['sending']['message_file'])));
				
				if($this->config['list']['format_country'] == true){
					$send = $this->config['list']['country_code'].trim($send);
				}

				$this->prout->LightYellow()->inline('[TWILIO] [' . date('H:i:s') . '] [' . $no . '/' . $total_list . '] Account SID : ');$this->prout->LightGreen($setting['SID']);
				$this->prout->LightYellow()->inline('[TWILIO] [' . date('H:i:s') . '] [' . $no . '/' . $total_list . '] From Number : ');$this->prout->LightRed($setting['Number']);
				$this->prout->LightYellow()->inline('[TWILIO] [' . date('H:i:s') . '] [' . $no . '/' . $total_list . '] To Number : ');$this->prout->LightRed($send);
				$Twilio = $this->TwilioSend($setting, $send);
				$this->prout->LightYellow()->inline('[TWILIO] [' . date('H:i:s') . '] [' . $no . '/' . $total_list . '] Status : ');$this->prout->LightMagenta($Twilio);
				$this->prout->out('');

				if($this->config['sending']['rotateapi'] == 'send')
				{
					$i++;
				}
				$no++;
			}

			if($this->config['sending']['rotateapi'] == 'sleep')
			{
				$i++;
			}
			$this->prout->LightRed()->flank('Sleep ' . $this->config['sending']['sleep'] . ' second(s)', '-', 15);
			sleep($this->config['sending']['sleep']);
		}

		$this->prout->White()->out(' ');
		$stop = $this->prout->input('Press enter to continue...');
		$stop->prompt();
	}

	public function TwilioSend($setting, $send){
		try{
			$twilio = new Client($setting['SID'], $setting['Token']);
			$format = [
				"body" => $setting['message'],
				"from" => $setting['Number']
			];
			$message = $twilio->messages->create($send, $format);
			return $message->status;
		}catch (ConfigurationException $e){
			echo 'Caught exception: ', $e.get_code(), "\n";exit;
		}
		
	}

	
}
?>