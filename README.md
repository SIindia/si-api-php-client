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

### Basic messaging example with optional parameters

We can give optional parameter for different kinds of functionality, has explained below:

1. Schedule Sms :- We have to provide Date and time for scheduling an SMS

		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'time' => '2017-05-19 11:17:55 AM',
	    ]);

2. Unicode Messgae :- To specify that the message to be sent is in unicode format. Also can be used for automatic detection of unicode SMS.
		
		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'unicode' => '1',
	    ]);

3. Flash Message :- To specify that the message is to be sent in the flash format

		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'flash' => '1',
	    ]);

4. Receive Delivery Report Url :- The encoded URL to receive delivery reports. Spiffing custom in the DLR url is mandatory.
	
		$drl_url = 'http://exapmle.com?sent={sent}&delivered={delivered}&msgid={msgid}&sid={sid}&status={status}&reference={reference}&custom1={custom1}&custom2={custom2}';

		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'dlr_url' => $dlr_url,
	    ]);

### Basic messaging example with advance parameters(optional)

1. Format :- Output format should be as specified by this variable ex.-XML/JSON/JSONP. Default response will be in JSON
	
		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'format'  => 'json',
	    ]);

2. Custom1 & Custom2 :- Custom reference fields.

		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'custom1'  => 'xxxxxxx',
	    	'custom2'  => 'xxxxxxx'
	    ]);

3. Port :- Port number to which SMS has to be sent. Valid integer port number above 2000

		$response = $smsObj->sendSms($receivers , $msg , [    
	    	'port'  => '8223',	    	
	    ]);

###  Messaging with JSON data

SMS can be sent using the JSON Data by posting values to the preceding URL by the POST method with urlencoded json data.

Sample json data

	$jsonData = {"sms": 
		[
		  { 
		    "to": "9xxxxxxxx", 
		    "custom": 9xxxxxxxx, 
		    "message": "Message from json api node 1"  
		  }, 
		  {
		    "to": "91xxxxxxxx",   
		    "custom": 34,
		    "message": "Message from json api node 2"  
		  }
		]
	}

	$response = $smsObj->sendSmsUsingJsonApi($jsonData,['formate'=>'json']);

JSON Optional Parameters

1. Sending to multiple numbers with same message 

		$jsonData = {
		  "message": "test json",
		  "sms":[
		  {
		    "to": "95XXXXXXXX",
		    "msgid": "1",
		    "message": "test sms",
		    "custom1": "11",
		    "custom2": "22",
		    "sender": "AAAAAA"
		  },
		  {
		    "to": "99XXXXXXXX",
		     "msgid": "2",
		    "custom1": "1",
		    "custom2": "2" 
		  }],
		  "unicode": 1,
		  "flash": 1,
		  "dlrurl": "http://www.example.com/dlr.php" 
		}

2. Sending to multiple numbers with different message

		$jsonData = {
		  "message": "test json",
		  "sms":[
		  {
		    "to": "95XXXXXXXX",
		    "msgid": "1",
		    "message": "test sms",
		    "custom1": "11",
		    "custom2": "22",
		    "sender": "AAAAAA"
		  },
		  {
		    "to": "99XXXXXXXX",
		     "msgid": "2",
		    "message": "json test sms",
		    "custom1": "1",
		    "custom2": "2"
		  }],
		  "unicode": 1,
		  "flash": 1,
		  "dlrurl": "http://www.example.com/dlr.php"
		}

### Messaging with XML data

SMS can be sent using the XML values by posting values to the preceding functions.

	$xml = <?xml version="1.0" encoding="UTF-8"?>
	<xmlapi>
	  <sender>AAAAAA</sender>
	  <message>xml test</message>
	  <unicode>1</unicode>
	  <flash>1</flash>
	  <campaign>xml test</campaign>
	  <dlrurl>
	     <![CDATA[http://domain.com/receive?sent={sent}&delivered={delivered}&msgid={msgid}&sid={sid}&status={status}&reference={reference}
	     &custom1={custom1}&custom2={custom2}&credits={credits}]]>
	  </dlrurl>
	  <sms>
	    <to>95xxxxxxxx</to>
	    <custom>22</custom>
	    <custom1>99</custom1>
	  </sms>
	  <sms>
	    <to>99xxxxxxxx</to>
	    <custom>229</custom>
	    <custom1>995</custom1>
	  </sms>
	</xmlapi>

	$response = $smsObj->sendSmsUsingXmlApi($xml,['formate'=>'json']);

1. Sending to multiple numbers with same message 

		$xml = <?xml version="1.0" encoding="UTF-8"?>  
		<api>  
		  <campaign>campaign</campaign>  
		  <dlrurl>
		    <![CDATA[http://domain.com/receive?msgid={msgid}&sid={sid}&status={status}&custom1={custom1}]]>
		  </dlrurl> 
		  <time>2014-12-26 04:00pm</time>  
		  <unicode>0</unicode>  
		  <flash>0</flash>  
		  <sender>senderid</sender>  
		  <message><![CDATA[smstext]]></message>  
		  <sms>  
		      <to>9190********</to>  
		  </sms>  
		  <sms>  
		      <to>9191********</to>  
		  </sms>  
		</api>

2. Sending to multiple numbers with different message 

		$xml = <api>
		<campaign>campaign</campaign>
		<time>2014-12-26 04:00pm</time>
		<unicode>0</unicode>
		<flash>0</flash>
		<sms>
			<to>9190********</to>
			<sender>senderid</sender>
			<message>smstext</message>
			<custom>2</custom>
			<dlrurl>
			<![CDATA[http://domain.com/receive?msgid={msgid}&sid={sid}&status={status}&custom1={custom1}]]>
			</dlrurl> 
		</sms>
		<sms>
			<to>9191********</to>
			<sender>senderid</sender>
			<message><![CDATA[smstext]]></message>
			<custom>2</custom>
			<dlrurl>
			<![CDATA[http://domain.com/receive?msgid={msgid}&sid={sid}&status={status}&custom1={custom1}]]>
			</dlrurl> 
		</sms>
		</api>

### Getting status of message

To check status of any sent SMS campaign, you must have message id only (not group ID) of the respective message(s). You can only check status for messages which have been sent on the same day. If using POST method for pulling messages status, then statuses for maximum 500 messages can be pulled at a time. Here is a function for checking the status of an SMS in the following format:

	$statusResponse = $smsObj->smsStatusPull("fe5a70a3-1d65-40de-93b3-e50ebdc69272:1",['formate'=>'json']);

Optional parameter

1. Format :- Output format should be as specified by this variable, XML/JSON/JSONP. Default response will be in JSON.

2. Numberinfo :- Flag to query service provider and location data, i.e 0 or 1.

3. Page :- Page number to fetch status details of a pariticular page, where page is 1 or more.

License
-------

This library is licensed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)