<?php
 /* Send an SMS using this aplication. You can run this file 3 different ways:
     *
     *    Download a local server like WAMP, MAMP or XAMPP. Point the web root
     *    directory to the folder containing this file, and load
     *    localhost:8888/client.php in a web browser.
   */

// include the Sms class
    include_once 'Sms.php';
    class MainSms
    {
        public function call()
        {
            //instantiate a new Sms Rest Client with argument api,senderID,base_URL.
            $sms = new Sms('A9e7eea594836cd29d153f48a38d863a2', 'Tripti', 'http://alerts.solutionsinfini.com/api/v4/?');
            $dlr_url = 'https://solutionsinfini.net/dlr/trigger.php?sent={sent}&delivered={delivered}&msgid={msgid}&sid={sid}&status={status}&reference={reference}&custom1={custom1}&custom2={custom2}';

            $obj = $sms->sendSms('7829706709', 'hekko', [
                //'dlr_url' => $dlr_url,
                //'time'    => '2017-06-11 11:17:55 AM',
                //'unicode' => '1',
                'flash' => '1',
                //'format'  => 'json',
                //'port'    => '8223',
                ]);
            
            /*$xml="<?xml version='1.0' encoding='UTF-8'?><xmlapi>
            	<sender>RRRRRR</sender>
            	<message>xml test</message>
            	<unicode>1</unicode>
            	<flash>1</flash>
            	<campaign>xml test</campaign>
            	<dlrURL><![CDATA[http://example.php?sent={sent}&delivered={delivered}&msgid={msgid}&sid={sid}&status={status}&reference={reference}&custom1={custom1}&custom2={custom2}&credits={credits}]]></dlrURL>
            	<sms><to>7829706709</to><custom>22</custom><custom1>99</custom1><custom2>988</custom2></sms>
            	<sms><to>9986970357</to><custom>229</custom><custom1>995</custom1><custom2>98</custom2></sms>
            </xmlapi>";
            $obj = $sms->sendSmsUsingXmlApi($xml,['formate'=>'json']);*/


            /*$json = "{\"message\": \"test json\",  
             \"sms\": [{     
             	\"to\": \"7829706709\", 
             	\"msgid\": \"1\",\"message\": \"test json\", 
             	\"custom1\": \"11\", 
             	\"custom2\": \"22\",
             	\"sender\": \"RRRRRR\"  
             	 },
             	 {     
             	 	\"to\": \"9986970357\",    
             	 	 \"msgid\": \"2\",     
             	 	 \"custom1\": \"1\",     
             	 	 \"custom2\": \"2\"   }],   
             	 	 \"unicode\": 1,   
             	 	 \"flash\": 1,   
             	 	 \"dlrurl\": \"http://solutionsinfini.net/dlr/trigger.php?referenceid={reference}%26status={status}%26delivered={delivered}%26messageid={messageid}%26customid1={custom1}%26customid2={custom2}%26senttime={senttime}%26reference={reference}%26message={message}\" 
             }";
            $obj = $sms->sendSmsUsingJsonApi($json,['formate'=>'json']);*/

            //$obj = $sms->smsStatusPull("fe5a70a3-1d65-40de-93b3-e50ebdc69272:1",['formate'=>'json']);
            
            //$obj = $sms->smsStatusPush("7829706709","hi......",$dlr_url);
            
            /*$obj = $sms->smsToOptinGroup("hello","tipusultan",['time'    => '2017-06-11 11:17:55 AM',
                'unicode' => '1',
                'flash' => '1',
                'formate'=>'json']);
			*/
        
            //$obj = $sms->addContactsToGroup("RRRRRR","7829706709",['fullname'=>'abc','formate'=>'json']);

            //$obj = $sms->sendMessageToGroup("helloo testing","Tripti","6416300217");

            //$obj = $sms->editSchedule("2017-09-23 11:17:55 AM","6416300217",['formate'=>'json']);
            
            //$obj = $sms->deleteScheduledSms("6416300217",['formate'=>'json']);
            
            //$obj = $sms->creditAvailabilityCheck(['formate'=>'json']);

            //$obj = $sms->SILookup('78945612305', ['format' => 'json']);
            
            //$obj = $sms->createtxtly("https://in.yahoo.com",['format' => 'json']);
            
            //$obj = $sms->deletetxtly("205",['format' => 'json']);

			//$obj = $sms->txtlyReportExtract(['format' => 'json']);
			//$obj = $sms->pullLogForIndividualtxtl("223",['format' => 'json']);
		
            //$obj = $sms->smsStatusPull('msg-Id');

            echo '<pre>';
            print_r($obj);
        }
    }
    $main = new MainSms();
    $main->call();
