<?php

namespace App\GoogleForm;

use Google\Service\Forms\Form;
use \Google_Client;
use \Google_Service_Forms;


class GoogleAPI{
    private Google_Client $client;

    public function __construct()
    {
        $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $this->client = new Google_Client();
        $this->client->setApplicationName('My Forms API Application');
        $this->client->setScopes([Google_Service_Forms::FORMS_BODY_READONLY]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig('../app/GoogleForm/client_secret.json');
        //$this->client->setClientId('392320166134-3l32014dcudrup077bhhcj2bip389hfm.apps.googleusercontent.com');
        //$this->client->setClientSecret('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');
        $this->client->setAccessType('offline');
        try{
            $this->generate_token();
        } catch (\Exception $e){
            print $e;
        }

    }

    public function generate_token(){
        $tokenPath = '../app/GoogleForm/token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $this->client->setAccessToken($accessToken);
        }

        if ($this->client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            } else {

                // Request authorization from the user.
                $authUrl = $this->client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);
                $this->client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new \Exception(join(', ', $accessToken));
                }
            }

            // Save the token to a file.
            file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));
        }
    }

    public function get_form_id(String $form_Id) : Form{
        $service = new Google_Service_Forms($this->client);
        return $service->forms->get($form_Id);
    }

    public function getClient(): Google_Client
    {
        return $this->client;
    }

    public function setClient(Google_Client $client): void
    {
        $this->client = $client;
    }

    // Format trả về
//  {
//    "formId":"1wZd9WZ8mBRDcniFlM3KeGm6KbdjF-vH47T1rprLROpc",
//    "info":{
//       "description":"Xin ch\u00e0o c\u00e1c b\u1ea1n",
//       "documentTitle":"M\u1eabu kh\u00f4ng c\u00f3 ti\u00eau \u0111\u1ec1",
//       "title":"\u0110\u00e2y l\u00e0 ti\u00eau \u0111\u1ec1 th\u1eed"
//    },
//    "items":[
//       {
//          "description":null,
//          "imageItem":null,
//          "itemId":"7fd4f1e1",
//          "pageBreakItem":null,
//          "questionGroupItem":null,
//          "questionItem":{
//             "image":{
//                "altText":null,
//                "contentUri":"https:\/\/lh6.googleusercontent.com\/4yXj14yjPxxNi81teqklJdczk5SFPgGPdrD-p9az7tbshvRrK18wUqIbAMR1ErIZs8keCmdbTmaNZm78EbcuJCiF017HwHWvsQBtKG9ZXORb4oRYVabi-cXvg5E-znKn1A",
//                "properties":{
//                   "alignment":"LEFT",
//                   "width":740
//                },
//                "sourceUri":null
//             },
//             "question":{
//                "choiceQuestion":{
//                   "options":[
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"Xin ch\u00e0o"
//                      },
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"Xin ch\u00e0o part 2"
//                      },
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"T\u00f9y ch\u1ecdn 3"
//                      },
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":true,
//                         "value":null
//                      }
//                   ],
//                   "shuffle":null,
//                   "type":"RADIO"
//                },
//                "dateQuestion":null,
//                "fileUploadQuestion":null,
//                "grading":{
//                   "correctAnswers":{
//                      "answers":[
//                         {
//                            "value":"Xin ch\u00e0o"
//                         }
//                      ]
//                   },
//                   "generalFeedback":null,
//                   "pointValue":1,
//                   "whenRight":null,
//                   "whenWrong":null
//                },
//                "questionId":"36f0440f",
//                "required":true,
//                "rowQuestion":null,
//                "scaleQuestion":null,
//                "textQuestion":null,
//                "timeQuestion":null
//             }
//          },
//          "textItem":null,
//          "title":"T\u00f9y ch\u1ecdn nhanh ch\u00f3ng",
//          "videoItem":null
//       },
//       {
//          "description":null,
//          "imageItem":null,
//          "itemId":"0489e7cf",
//          "pageBreakItem":null,
//          "questionGroupItem":null,
//          "questionItem":{
//             "image":{
//                "altText":null,
//                "contentUri":"https:\/\/lh6.googleusercontent.com\/8Dk_H1u7R4N51NUR0lsTlnk1QWZ3guzZc2aoHpxvC15j5C6L_QY_jaffvcanEGsnxflo6_sYI03dppC2WIc9x8yH7q8mESlyACaAIL0y4ZV-a397sERJvVG5SxrBsjs_hA",
//                "properties":{
//                   "alignment":"LEFT",
//                   "width":740
//                },
//                "sourceUri":null
//             },
//             "question":{
//                "choiceQuestion":{
//                   "options":[
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"Kh\u00f4ng"
//                      },
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"C\u00f3"
//                      },
//                      {
//                         "goToAction":null,
//                         "goToSectionId":null,
//                         "image":null,
//                         "isOther":null,
//                         "value":"Tui l\u00e0 Ph\u00fac"
//                      }
//                   ],
//                   "shuffle":null,
//                   "type":"RADIO"
//                },
//                "dateQuestion":null,
//                "fileUploadQuestion":null,
//                "grading":{
//                   "correctAnswers":{
//                      "answers":[
//                         {
//                            "value":"C\u00f3"
//                         }
//                      ]
//                   },
//                   "generalFeedback":null,
//                   "pointValue":1,
//                   "whenRight":null,
//                   "whenWrong":null
//                },
//                "questionId":"12253344",
//                "required":null,
//                "rowQuestion":null,
//                "scaleQuestion":null,
//                "textQuestion":null,
//                "timeQuestion":null
//             }
//          },
//          "textItem":null,
//          "title":"B\u1ea1n l\u00e0 duy \u00e0",
//          "videoItem":null
//       }
//    ],
//    "linkedSheetId":null,
//    "responderUri":"https:\/\/docs.google.com\/forms\/d\/e\/1FAIpQLScky1fa2uzosPxk5ynFao9f90S0DGjI0VOLIL8Ip2otY6LpEQ\/viewform",
//    "revisionId":"0000004a",
//    "settings":{
//       "quizSettings":{
//          "isQuiz":true
//       }
//    }
}
