<?php

namespace App\Http\Controllers;

// use PDF;
use URL;
use Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Stream\Stream;
use Illuminate\Http\Request;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;

use App\Enrolment;

class EsignController extends Controller
{

    // public function __construct()
    // {
    //     $this->client = new \GuzzleHttp\Client(['verify' => false ]);

    //     $enrolment = Enrolment::first();

    //     $xml="
    //     <PanKYC>
    //         <Username>$enrolment->name</Username>
    //         <Pin>$enrolment->ekyc_pin</Pin>
    //         <Name>$enrolment->name</Name>
    //         <Mobile>$enrolment->mobile</Mobile>
    //         <Email>$enrolment->email</Email>
    //         <Address>$enrolment->address</Address>
    //         <StateProvince>$enrolment->state</StateProvince>
    //         <Country>India</Country>
    //         <PostalCode>$enrolment->pincode</PostalCode>
    //         <Photograph>".URL::to('/')."/storage/$enrolment->photo_file</Photograph>
    //         <DOB>$enrolment->birthday</DOB>
    //         <Gender>$enrolment->gender</Gender>
    //         <PAN>$enrolment->pan</PAN>
    //         <AadhaarNumber>".substr($enrolment->adhaar_no, -4)."</AadhaarNumber>
    //         <eKYCType>PAN KYC</eKYCType>
    //         <CAOfficer>Nishant</CAOfficer>
    //     </PanKYC>";
    //     // dd($xml);

    //     // $privateKey = new \EllipticCurve\PrivateKey;
    //     $privateKey = \EllipticCurve\PrivateKey::fromPem("
    //         -----BEGIN RSA PRIVATE KEY-----
    //         MIIEpQIBAAKCAQEAvHT3Fn+ovg2XbCY7P0ZBux6DLpmiESqP6rz5pCcy2XJRlEFE
    //         yXfQHmqz2X+LZI0zeJHdyD/dRGbUiU/3soFO4x6XctpcAUxaplD6bubDkj/cQa8L
    //         JaaQOhpzvav82YtNI3mp9w7FV044TDPcESCiFazjkEiffN61DrkTbcAsz6JZcNH9
    //         NA0EWA84QuCLjXrhmKY+G+gcuq/ksOlgb3PpzPEL0cmlKusnTd6qFvwobPjDGJ3o
    //         LoCWvZi5qvLgfTbusNyEoyCGxBi3zphqsWYZfpnTGotntxYgx7E7hGEYcw9ViYr5
    //         jk9azjnkUL/T66zKxgx/wZ+gElEPNQ0GvUhiwQIDAQABAoIBACuhlNczpRijQux6
    //         CXuDw5IT5WEzlo8M4JcDO3Ti0mX/jp2ZYtiWEawJHix72ATmoAUJGGTVTGAawpgr
    //         2HgOcfopSf0ASw7N46rf0qs8aAkDGfZnFViZMIkTOLqwB/FBzBEriMs3Mz8cT/Js
    //         i0W33W7RQTpVZf9d/GM1PCdLt9Q2JpfTwsAo+ngGBGjuDl0N8JtisiF2uHP6puNZ
    //         bajCO1R3IrbG1j4djFiB+wWStReBsyvhcwDV9+2BLHwiYerUF9jIFaypRYWWRHc8
    //         CyT4NEMVLmTzzQjrZ/KrDTIPQt/RAKjn/HfuRRV88ic26ecfACiyt3wvGDaa3UvL
    //         mMuz6HECgYEA+iRTyeP5FMp4vjTWLH9Asmfv/ZSiAQ5XczhdPLklikSufbpFoDLv
    //         AzG9Cw1moGFjdnQdF3pnFstJKihv+eNV+J11U3/0sIh7fLURuY8sspw+2xNo0J2q
    //         lu9sNAk5B0S3RjTgiPlzxJUIuB8Ef494xSE+5qAmiBnZk1FfqgsO670CgYEAwN7R
    //         iesjBpEJ0udyOxls211EFj6KdVHTNOq/yOdJoXCQUL8Yw2eUko21aWRK/wpWkw6M
    //         8r8eF83ZOFOb9HdkXc6zfyQq5+IpeH0dCFhgsWuRhm0KBlMhyvhCVP1RHjR4et/3
    //         tSJVo5+5IkVRsQVhkmmeM5ACUwt2oAj7sG1f4VUCgYEAvOLRopJTdC+wHXEoiVFO
    //         OWni/0lNTB7YSlk1jrUAc/iJCset69qKQY89gSsNY+4mfTwQ+7miPsQi64K9i6Tv
    //         Nl0wS21ECEoHdZQFXmmPBxCVJjjx3RYxyufgfSq5tZNeEdW797LmiHtBqkdBzlE4
    //         kSMZrG0iq4NZmLTJ2E2hZsECgYEAutcgJnujcrkOy0FrZ9U5n0i6rNHpT7303U6M
    //         fBOTQNHK/G4jjyjIxTCCjZabEHbzZ4KxCHgcrvK7e9WDP1Bp6nZTbNecuQZfJloN
    //         xgfXpAiQ8aiwDXB7TCU0HSFJc/lgvag6Tz7zt48Dyi9c9CBCZZPrrgfUOJ7iTCZn
    //         rIJIYAECgYEAtkYTbTt1MLPRvBAK2w/2Cz8mKUaUOTdUEaQhRn9nxmAOTzMW/WEp
    //         o8eO6swlMACcQV13Xp/RUJLvAoJFqdxioOlqhgDtk/zOdn34beqITI8LHKHjntGD
    //         /lk3778MeCuNO4bp51OGTT9jO4nIyim47WsHJerxF6rtrOcDrh/lhnM=
    //         -----END RSA PRIVATE KEY-----
    //     ");
    //     // $publicKey = $privateKey->publicKey();

    //     $signature = \EllipticCurve\Ecdsa::sign($xml, $privateKey);
    //     $signature_base64 = \base64_encode(strval($signature->der));
    //     $signature_sha256 = \hash('sha256', strval($signature->der));
    //     // base64

    //     //private key
    //     // d (exponent)

    //     //public key
    //     //n (modulus)

    //     $modulus = 'BC74F7167FA8BE0D976C263B3F4641BB1E832E99A2112A8FEABCF9A42732D97251944144C977D01E6AB3D97F8B648D337891DDC83FDD4466D4894FF7B2814EE31E9772DA5C014C5AA650FA6EE6C3923FDC41AF0B25A6903A1A73BDABFCD98B4D2379A9F70EC5574E384C33DC1120A215ACE390489F7CDEB50EB9136DC02CCFA25970D1FD340D04580F3842E08B8D7AE198A63E1BE81CBAAFE4B0E9606F73E9CCF10BD1C9A52AEB274DDEAA16FC286CF8C3189DE82E8096BD98B9AAF2E07D36EEB0DC84A32086C418B7CE986AB166197E99D31A8B67B71620C7B13B846118730F55898AF98E4F5ACE39E450BFD3EBACCAC60C7FC19FA012510F350D06BD4862C1';
    //     $modulus_base64 = \base64_encode($modulus);

    //     $digest_xml_raw = '<Esign ver="3.3" ts="'. \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') .'" txn="'.md5($enrolment->application_id).'" maxWaitPeriod="1440" aspId="futuriq" signerid="'.$enrolment->pan.'@PAN.futuriq" responseUrl="'.URL::to('/').'/esign" redirectUrl="'.URL::to('/').'/esign" signingAlgorithm="RSA"><Docs><InputHash id="1" hashAlgorithm="SHA256" docInfo="KYC Data" docUrl="'.route('enrolment.offline.kyc', $enrolment->application_id).'" responseSigType="pkcs7">'.$signature_sha256.'</InputHash></Docs></Esign>';
    //     $digest_xml = new \DOMDocument( "1.0", "ISO-8859-15" );
    //     $digest_xml->loadXML($digest_xml_raw);
    //     $canonicalization_digest = $digest_xml->C14N();
    //     $digest_sha256 = \hash('sha256', $canonicalization_digest);
    //     $digest_value_base64 = \base64_encode($digest_sha256);

    //     $signature_xml_raw = '<SignedInfo xmlns="http://www.w3.org/2000/09/xmldsig#"><CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"></CanonicalizationMethod><SignatureMethod Algorithm="http://www.w3.org/2001/04/xmldsig-more#rsa-sha256"></SignatureMethod><Reference URI=""><Transforms><Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></Transform></Transforms><DigestMethod Algorithm="http://www.w3.org/2001/04/xmlenc#sha256"></DigestMethod><DigestValue>'.$digest_value_base64.'</DigestValue></Reference></SignedInfo>';
    //     $signature_xml = new \DOMDocument( "1.0", "ISO-8859-15" );
    //     $signature_xml->loadXML($signature_xml_raw);
    //     $canonicalization_signature = $signature_xml->C14N();
    //     $signature_method_sha256 = \hash('sha256', $canonicalization_signature);
    //     $signature_value_base64 = \base64_encode($signature_method_sha256);
        

    //     $certificate = trim('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');

    //     $this->xml_ = '<Esign ver="3.3" ts="'. \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') .'" txn="'.md5($enrolment->application_id).'" maxWaitPeriod="1440" aspId="futuriq" signerid="'.$enrolment->pan.'@PAN.futuriq" responseUrl="'.URL::to('/').'/esign" redirectUrl="'.URL::to('/').'/esign" signingAlgorithm="RSA"><Docs><InputHash id="1" hashAlgorithm="SHA256" docInfo="KYC Data" docUrl="'.route('enrolment.offline.kyc', $enrolment->application_id).'" responseSigType="pkcs7">'.$signature_sha256.'</InputHash></Docs><Signature xmlns="http://www.w3.org/2000/09/xmldsig#"><SignedInfo xmlns="http://www.w3.org/2000/09/xmldsig#"><CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"></CanonicalizationMethod><SignatureMethod Algorithm="http://www.w3.org/2001/04/xmldsig-more#rsa-sha256"></SignatureMethod><Reference URI=""><Transforms><Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></Transform></Transforms><DigestMethod Algorithm="http://www.w3.org/2001/04/xmlenc#sha256"></DigestMethod><DigestValue>'.$digest_value_base64.'</DigestValue></Reference></SignedInfo><SignatureValue>'.$signature_value_base64.'</SignatureValue><KeyInfo><KeyValue><RSAKeyValue><Modulus>'.$modulus_base64.'</Modulus><Exponent>65537</Exponent></RSAKeyValue></KeyValue><X509Data><X509SubjectName><X509SubjectName>CN=futuriq</X509SubjectName></X509SubjectName><X509Certificate>'.$certificate.'</X509Certificate></X509Data></KeyInfo></Signature></Esign>';

    //     $this->xml_ = str_replace("\\","",$this->xml_);
    // }

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['verify' => false ]);

        $enrolment = Enrolment::first();

        $kyc_xml="<?xml version='1.0' encoding='utf-8'?>
        <PanKYC>
            <Username>$enrolment->name</Username>
            <Pin>$enrolment->ekyc_pin</Pin>
            <Name>$enrolment->name</Name>
            <Mobile>$enrolment->mobile</Mobile>
            <Email>$enrolment->email</Email>
            <Address>$enrolment->address</Address>
            <StateProvince>$enrolment->state</StateProvince>
            <Country>India</Country>
            <PostalCode>$enrolment->pincode</PostalCode>
            <Photograph>".URL::to('/')."/storage/$enrolment->photo_file</Photograph>
            <DOB>$enrolment->birthday</DOB>
            <Gender>$enrolment->gender</Gender>
            <PAN>$enrolment->pan</PAN>
            <AadhaarNumber>".substr($enrolment->adhaar_no, -4)."</AadhaarNumber>
            <eKYCType>PAN KYC</eKYCType>
            <CAOfficer>Nishant</CAOfficer>
        </PanKYC>";

        $kyc_hex = hash("sha256", $kyc_xml);
        $xml = '<Esign ver="3.3" ts="'. \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') .'" txn="'.md5($enrolment->application_id.\Carbon\Carbon::now()->timestamp).'" maxWaitPeriod="1440" aspId="futuriq" signerid="'.$enrolment->pan.'@PAN.futuriq" responseUrl="'.URL::to('/').'/esign" redirectUrl="'.URL::to('/').'/esign" signingAlgorithm="RSA"><Docs><InputHash id="1" hashAlgorithm="SHA256" docInfo="KYC Data" docUrl="'.route('enrolment.offline.kyc', $enrolment->application_id).'" responseSigType="pkcs7">'.$kyc_hex.'</InputHash></Docs></Esign>';

        $doc = new \DOMDocument();
        $doc->loadXML($xml);

        // Create a new Security object 
        $objDSig = new XMLSecurityDSig();
        // Use the c14n exclusive canonicalization
        $objDSig->setCanonicalMethod(XMLSecurityDSig::C14N);
        // Sign using SHA-256
        $objDSig->addReference(
            $doc, 
            XMLSecurityDSig::SHA256, 
            array('http://www.w3.org/2000/09/xmldsig#enveloped-signature')
        );

        // Create a new (private) Security key
        $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, array('type'=>'private'));
        /*
        If key has a passphrase, set it using
        $objKey->passphrase = '<passphrase>';
        */
        // Load the private key
        $objKey->loadKey(storage_path('certificate/private-key.pem'), TRUE);

        // Sign the XML file
        $objDSig->sign($objKey);

        // Add the associated public key to the signature
        // $objDSig->add509Cert(file_get_contents(storage_path('certificate/futuriq_cert.pem')), TRUE, FALSE, array('subjectName'=>TRUE, 'pubKeyInfo'=>TRUE));
        $objDSig->add509Cert(file_get_contents(storage_path('certificate/futuriq_cert.pem')));

        // Append the signature to the XML
        $objDSig->appendSignature($doc->documentElement);
        // Save the signed XML
        // $doc->save('./path/to/signed.xml');

        $this->xml_ = $doc->saveXML();
    }

    private function signXml($xml)
    {
        $doc = new \DOMDocument();
        $doc->loadXML($xml);

        // Create a new Security object 
        $objDSig = new XMLSecurityDSig();
        // Use the c14n exclusive canonicalization
        $objDSig->setCanonicalMethod(XMLSecurityDSig::C14N);
        // Sign using SHA-256
        $objDSig->addReference(
            $doc, 
            XMLSecurityDSig::SHA256, 
            array('http://www.w3.org/2000/09/xmldsig#enveloped-signature')
        );

        // Create a new (private) Security key
        $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, array('type'=>'private'));
        /*
        If key has a passphrase, set it using
        $objKey->passphrase = '<passphrase>';
        */
        // Load the private key
        $objKey->loadKey(storage_path('certificate/private-key.pem'), TRUE);

        // Sign the XML file
        $objDSig->sign($objKey);

        // Add the associated public key to the signature
        // $objDSig->add509Cert(file_get_contents(storage_path('certificate/futuriq_cert.pem')), TRUE, FALSE, array('subjectName'=>TRUE, 'pubKeyInfo'=>TRUE));
        $objDSig->add509Cert(file_get_contents(storage_path('certificate/futuriq_cert.pem')));

        // Append the signature to the XML
        $objDSig->appendSignature($doc->documentElement);
        // Save the signed XML
        // $doc->save('./path/to/signed.xml');

        return $doc->saveXML();
    }

    private function kycResponseXml($txn, $resp_code, $application_id=null)
    {
        $enrolment = Enrolment::first();

        $img = file_get_contents(URL::to('/')."/storage/$enrolment->photo_file");
        $data = base64_encode($img);

        $xml = '<eKycResp ver="3.3" status="2" signerid="'.$enrolment->pan.'@PAN.futuriq" ts="'. \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') .'" txn="'.$txn.'" error="" respCode="'.$resp_code.'">
        <kycData name="'.$enrolment->name.'" mobile="'.$enrolment->mobile.'" email="'.$enrolment->email.'" address="'.$enrolment->address.'" stateProvince="'.$enrolment->state.'" country="IN" postalCode="'.$enrolment->pincode.'" PAN="'.$enrolment->pan.'" DOB="'.$enrolment->birthday.'" Gender="'.$enrolment->gender.'" Aadhaar="'.substr($enrolment->adhaar_no, -4).'" eKYCtype="PAN KYC"/>
        <Photo>'.$data.'</Photo>
        </eKycResp >';

        return $this->signXml($xml);
    }

    private function thirdResponseXml($txn, $resp_code, $application_id=null)
    {
        $enrolment = Enrolment::first();

        $img = file_get_contents(URL::to('/')."/storage/$enrolment->photo_file");
        $data = base64_encode($img);

        $xml = '<eKycResp ver="3.3" status="1" signerid="'.$enrolment->pan.'@PAN.futuriq" ts="'. \Carbon\Carbon::now()->format('Y-m-d\TH:i:s') .'" txn="'.$txn.'" error="" respCode="'.$resp_code.'">
        <kycData name="'.$enrolment->name.'" mobile="'.$enrolment->mobile.'" email="'.$enrolment->email.'" address="'.$enrolment->address.'" stateProvince="'.$enrolment->state.'" country="IN" postalCode="'.$enrolment->pincode.'" PAN="'.$enrolment->pan.'" DOB="'.$enrolment->birthday.'" Gender="'.$enrolment->gender.'" Aadhaar="'.substr($enrolment->adhaar_no, -4).'" eKYCtype="PAN KYC"/>
        <Photo>'.$data.'</Photo>
        </eKycResp >';

        return $this->signXml($xml);
    }

    public function sendXml()
    {
        $enrolment = Enrolment::first();

        // dd($this->xml_);
        $create1 = $this->client->request('POST', 'https://esign.certrix.com:4445/esign/3.3/signdoc/futuriq', [
            'multipart' => [
                [
                    'name'     => 'requestXml',
                    'contents' => $this->xml_
                ],
                [
                    'name'     => 'requestIp',
                    'contents' => request()->ip()
                ],
                [
                    'name' => 'requestTime',
                    'contents' => \Carbon\Carbon::now()->timestamp
                ]
            ]                    
        ]);

        // dd($create1->getBody()->getContents());

        $response = preg_split('/\n|\r\n?/', $create1->getBody()->getContents());
        // dd($response[4]);
        $resp_doc = new \DOMDocument();
        $resp_doc->loadXML($response[4]);
        $resp_node=$resp_doc->getElementsByTagName('EsignResp');
        // dd($resp_node);
        $resp_rescode = $resp_node->item(0)->getAttribute('resCode');
        $resp_txn = $resp_node->item(0)->getAttribute('txn');
        // echo "txn = " . $resp_txn . "<br/>";
        // echo "rescode = " . $resp_rescode . "<br/>";
        // die;

        $kyc_response_xml = $this->kycResponseXml($resp_txn, $resp_rescode);

        // dd($kyc_response_xml);
        // $create2 = $this->client->request('POST', 'https://esign.certrix.com:4445/esign/3.3/signdoc/futuriq', [
        //     'multipart' => [
        //         [
        //             'name'     => 'requestXml',
        //             'contents' => $this->xml_
        //         ],
        //         [
        //             'name'     => 'requestIp',
        //             'contents' => request()->ip()
        //         ],
        //         [
        //             'name' => 'requestTime',
        //             'contents' => \Carbon\Carbon::now()->timestamp
        //         ],
        //         [
        //             'name' => 'kycRequestTime',
        //             'contents' => \Carbon\Carbon::now()->timestamp
        //         ],
        //         [
        //             'name' => 'kycResponseTime',
        //             'contents' => \Carbon\Carbon::now()->timestamp
        //         ],
        //         [
        //             'name' => 'kycResponseXml',
        //             'contents' => $kyc_response_xml
        //         ],
        //         [
        //             'name' => 'txnRef',
        //             'contents' => \base64_encode($resp_txn.'|'.$resp_rescode)
        //         ]
        //     ]                    
        // ]);

        // dd($create2->getBody()->getContents());

        $third_response_xml = $this->thirdResponseXml($resp_txn, $resp_rescode);

        // dd($third_response_xml);

        $create3 = $this->client->request('POST', 'https://esign.certrix.com:4445/esign/3.3/signdoc/futuriq', [
            'multipart' => [
                [
                    'name'     => 'requestXml',
                    'contents' => $this->xml_
                ],
                [
                    'name'     => 'requestIp',
                    'contents' => request()->ip()
                ],
                [
                    'name' => 'requestTime',
                    'contents' => \Carbon\Carbon::now()->timestamp
                ],
                [
                    'name' => 'kycRequestTime',
                    'contents' => \Carbon\Carbon::now()->timestamp
                ],
                [
                    'name' => 'kycResponseTime',
                    'contents' => \Carbon\Carbon::now()->timestamp
                ],
                [
                    'name' => 'kycResponseXml',
                    'contents' => $third_response_xml
                ],
                [
                    'name' => 'txnRef',
                    'contents' => \base64_encode($resp_txn.'|'.$resp_rescode)
                ]
            ]                    
        ]);

        // dd($create3->getBody()->getContents());

        $response3 = preg_split('/\n|\r\n?/', $create3->getBody()->getContents());
        dd($response3[4]);
        $resp_doc3 = new \DOMDocument();
        $resp_doc3->loadXML($response3[4]);
        $resp_node3=$resp_doc3->getElementsByTagName('DocSignature');
        $resp_docsignature3 = $resp_node3->item(0)->nodeValue;

        // \Storage::put('public/pkcs7/certificate.pfx', $resp_docsignature3);

        // $file = \Storage::disk('local')->get('public/pkcs7/certificate.p7b');
        // $f = $file;
        // $p7 = array();
        // $r = openssl_pkcs7_read($f, $p7);
        // if ($r === false) {
        //     printf("ERROR: %s is not a proper p7b file".PHP_EOL, $file);
        //         for($e = openssl_error_string(), $i = 0; $e; $e = openssl_error_string(), $i++)
        //             printf("SSL l%d: %s".PHP_EOL, $i, $e);
        //     exit(1);
        // }

        // dd($p7);
        // $resp_docsignature3 = $resp_node3->item(0)->getAttribute('DocSignature');
        // $resp_x509certificate3 = $resp_node3->item(0)->getAttribute('X509Certificate');

        // file_put_contents("storage/docs/docsignature.crt",$resp_docsignature3);

        // $file = fopen("storage/docs/docsignature.crt","w");
        // echo fwrite($file,$resp_docsignature3);
        // fclose($file);

        // //--------------------------------------------------

        // $certificate = 'file://'.base_path().'/public/storage/docs/docsignature.crt';

        // // set additional information in the signature
        // $info = array(
        //     'Name' => 'TCPDF',
        //     'Location' => 'Office',
        //     'Reason' => 'Testing TCPDF',
        //     'ContactInfo' => 'http://www.tcpdf.org',
        // );

        // // set document signature
        // PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        // PDF::SetFont('helvetica', '', 12);
        // PDF::SetTitle('Hello World');
        // PDF::AddPage();

        // // print a line of text
        // $text = view('certificate.offline_kyc', compact('enrolment', 'resp_docsignature3'));

        // // add view content
        // PDF::writeHTML($text, true, 0, true, 0);

        // // add image for signature
        // PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');

        // // define active area for signature appearance
        // PDF::setSignatureAppearance(180, 60, 15, 15);

        // // save pdf file
        // PDF::Output(public_path('esign.pdf'), 'F');

        // PDF::reset();

        // dd('pdf created');

        // dd($resp_docsignature3);

        $pdf = PDF::loadView('certificate.offline_kyc', compact('enrolment', 'resp_docsignature3'));
            
        return $pdf->stream();
    }

    public function fetchResponse(Request $request)
    {
        // dd($this->xml_);
        $create = $this->client->request('POST', 'https://esign.certrix.com:4445/esign/3.3/checkstatus/futuriq',[
            'multipart' => [
                [
                    'name'     => 'requestXml',
                    'contents' => $this->xml_
                ],
                [
                    'name'     => 'requestIp',
                    'contents' => request()->ip()
                ],
                [
                    'name' => 'requestTime',
                    'contents' => \Carbon\Carbon::now()->timestamp
                ]
            ]                    
        ]);

        dd($create);
    }
}
