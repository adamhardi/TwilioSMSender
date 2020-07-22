<?php
$config['key'] = 'api.ini';

$config['list'] = [
	'file' 					 => 'test.txt',
	'remove_dupp' 	 => false,
	'format_country' => true,
	'country_code'   => '+1',
];

$config['sending'] = [
	'send'							=> '2', # send 3 times
	'sleep'							=> '3', # pause every 'send'
	'rotateapi'         => 'sleep', # rotate every 'send' or 'sleep'
  'link'							=> 'https://google.com/', # use ##link## tag on your letter
  'message_file'			=> 'msg.txt', # letter,  random letter? ? you can use tag.
];

$config['custom_tag'] = [
	'country'						=> 'mexico|argentina|united states',

];

?>
