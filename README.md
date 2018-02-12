SI- SMS API PHP client
============================

Prerequisites
-------------

- You have installed a [PHP interpreter](http://php.net/manual/en/install.php) (minimal required version is 5.6).

Installation
-----------

For using SI API PHP client in your project, you have to add the following file to your project file:

	src/main/php/api/Sms.php

Running examples
----------------

The first thing that needs to be done is to include `Sms.php` and to initialize the messaging client. Before you start any of the examples, you have to populate specific data (API Key, SenderID, Base Url) by instantiate Sms rest client class object.	

	require_once '<PATH-TO-FOLDER>/Sms.php';
	$smsObj = new Sms(<Api_key>, <sender_id>, <base_url>);

### Basic messaging example

After including `Sms.php` and to initialize the messaging client you need to follow the function below:

The first step is to prepare the message:

    $msg = <your_message_comes_here>;

Then next step is to prepare your contact list:
	
	$receivers = <receiver_number1,receiver_number2>;

Receiver Mobile number to which SMS needs to be sent. It can be with or without 91. Also provide multiple numbers in comma separated format.

Now you are ready to send the message:

	$response = $smsObj->sendSms($receivers, $msg);

### Basic messaging example with optional parameter

We can give optional parameter for different kinds of functionality, has explained below:

1. Schedule Sms :- We have to provide Date and time for scheduling an SMS

	$response = $smsObj->sendSms($receivers , $msg , [    
    'time'    => '2017-05-19 11:17:55 AM',
    ]);

2. Unicode Messgae :- To specify that the message to be sent is in unicode format. Also can be used for automatic detection of unicode SMS.
	
	$response = $smsObj->sendSms($receivers , $msg , [    
    'unicode'    => '1',
    ]);

3. Flash Message :- To specify that the message is to be sent in the flash format

	$response = $smsObj->sendSms($receivers , $msg , [    
    'flash'    => '1',
    ]);

License
-------

This library is licensed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)