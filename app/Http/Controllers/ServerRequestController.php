<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerRequestController extends Controller
{
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['verify' => false ]);
    }

    public function getCertificate(Request $request)
    {
        $response = $this->client->request('POST', 'https://14.98.56.14:9080', [
            'json' => [
                'requestBody' => [
                    'request' => 'getCertificate',
                    'caname' => 'OdysseySubCAforClass3',
                    'classname' => 'RCAI Class 3 2014',
                    'type' => 'RCAI Class 3 Individual 2 Years Signing 2014',
                    'csr' => 'MIIC2TCCAcECAQAwezELMAkGA1UEBhMCSU4xCzAJBgNVBAgMAklOMQ4wDAYDVQQHDAVERUxISTELMAkGA1UECgwCSkMxDTALBgNVBAsMBEpVU1QxDzANBgNVBAMMBkpPR0VTSDEiMCAGCSqGSIb3DQEJARYTc2VydmVyLmpzQGdtYWlsLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBANsvtLDmtEof5rNyRD0DRNHf1T/BTKEwrDr4eEV4/DW/6qS2VRDFtOsRJvvOV+OVXuNiTujtTlVl+SqupF2poYFuKK62z2ZJT7Kb2V11xMsI75A6jZbkRYLwP0qIYKj5qX2Py4xWzMto3nyKYalgLRrlCte69qycqsswPWMUPtXr5HHmJbknLvKjkuYmR7Dqhvt5TQV4zYTKMvTbY+4ixBz46czmwR2PL8+sBZ0vlToeJ+ZD2T20bcz1ta8+b3XYDtSIMYc4ys4F6ou/rKerJkk0GdZ/t9u+Re7ylwHRyiPboc2f+0HxrACwLYz8nd/nI7601KvyFgW//Oxg7dx77qkCAwEAAaAZMBcGCSqGSIb3DQEJBzEKDAgxMjM0NTY3ODANBgkqhkiG9w0BAQsFAAOCAQEAkoQ11T+dke8UvoKD8cGxBCVxvrj6aO0Unv9e90fV4OEEhZD78lkrAArSqJvbfmAwxs2nqoLMqCF+lzsObCsGhKoyEio05Zpwc+1WcH0pBkbMMa8nVz2iLZDwLWoU4c6HN6EiNlYAq9aJEs9mg9jvxMRoB8HMdRh/r25GspUtrS7wD1MO3Vuhi2zZSPaVpOCOGNUItM7QP+pEe0Ais1RXf48bziY6SlpLls+svmgzqbJKrTIzbd6SSrgdzYrL0Pv5ADFdeFbki1n09zcHzpjOeY6Oh6acUVjwOj+jjVGKTbEWMUDFJXmyT/0ADBul1ewyKsHwPhY9HSwwVtTgoZgdjg==',
                    'transactionId' => 'ABC1234343',
                    'san' => ['']
                ]
            ]
        ]);

        dd($response->getBody()->getContents());
    }
}
