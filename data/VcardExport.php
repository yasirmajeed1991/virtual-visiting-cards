<?php
use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($contactResult)
    {
        require_once 'vendor/Behat-Transliterator/Transliterator.php';
        require_once 'vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
         $vcardObj->addName($contactResult[0]["first_name"] . " "  . $contactResult[0]["last_name"] );
        $vcardObj->addJobtitle($contactResult[0]["job_title"]);
        $vcardObj->addCompany($contactResult[0]["department"]);
		//$vcardObj->addMedia($contactResult[0]["profile_photo"]);
		$vcardObj->addOrganization($contactResult[0]["organization"]);
        $vcardObj->addPhoneNumber($contactResult[0]["mobile_no"]);
		$vcardObj->addEmail($contactResult[0]["email"]);
		$vcardObj->addwhatsappnumber($contactResult[0]["mobile_no"]);
		$vcardObj->addURL($contactResult[0]["website"]);
        $vcardObj->addLinkedinURL($contactResult[0]["linkedin_profile"]);
		$vcardObj->addInstaURL($contactResult[0]["insta_profile"]);
		$vcardObj->addFacebookURL($contactResult[0]["fb_profile"]);
		$vcardObj->addTwitterURL($contactResult[0]["twitter_profile"]);
        return $vcardObj->download();
       
    }
}
