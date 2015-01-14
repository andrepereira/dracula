<?php
include("class/deathbycaptcha.php");
include("class/captcha.class.php");
include("class/sanitize.class.php");
include("class/uppost.class.php");
include("class/performance.class.php");
include("class/truncate.class.php");

/*
 * Variables to get with POST:
 * 
 * Coxtarget.com:
 * $Address, $aptSuite, $City, $State, $Zip, $Email
 * 
 * Save.com:
 * submitContentForm, xtraCode, typeOfRequest, fullName, pleaseIncludeYourFullNameAsItWillActAsYourSignature,
 * streetAddress, aptunitNumber, requiredIfYourAddressHasAnApartmentOrUnitNumber, city, state,
 * zipCode, phoneNumberoptional, weWillOnlyCallYouToHelpYouWithYourRequest, emailAddressoptional,
 * youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest, agreement, acceptAgreement,
 * captcha
 * 
 * PennySaverUSA.com:
 * csrfmiddlewaretoken, name, address, apt, city, state, zip, email, is_adult
 * 
 * LexisNexis.com:
 * privacyoptoutform1$txtfname, privacyoptoutform1$txtlname, privacyoptoutform1$txtaddress,
 * privacyoptoutform1$txtcity, privacyoptoutform1$ddlstate, privacyoptoutform1$txtzip,
 * privacyoptoutform1$txtemail, privacyoptoutform1$txtphone, privacyoptoutform1_chklst_0,
 * privacyoptoutform1_chklst_1, privacyoptoutform1_chklst_2, privacyoptoutform1$txtcaptcha,
 * __EVENTTARGET, __EVENTARGUMENT, __VIEWSTATE, __PREVIOUSPAGE, __EVENTVALIDATION
 * 
 * 
 * Nielsen.com
 * tfa_Dontemailmeanymo, tfa_Dontsendmeanymor, tfa_Dontcallmeanymor, tfa_Idontwanttoparti, tfa_Otherpleaseexpla,
 * tfa_FirstName, tfa_LastName, tfa_Email, tfa_Telephone, tfa_Address1, tfa_City, tfa_Country, tfa_ProvinceState,
 * tfa_PostalCode, tfa_Inquiry, tfa_dbFormId, tfa_dbControl, tfa_dbVersionId
 * 
 * 
 * Acxiom.com
 * ToolkitScriptManager1_HiddenField, __EVENTTARGET, __EVENTARGUMENT, __LASTFOCUS, __VIEWSTATE, __EVENTVALIDATION,
 * OptOutChoices_0, OptOutChoices_1, OptOutChoices_2, OptOutChoices_3, Identity_0, Identity_1, Identity_2,
 * ShowAddName, ImageButton1, ImageButton2, ImageButton3
 * 
 * 
 * Wilanddirect.com
 * names, addresses, captcha_sid, captcha_token, captcha_response, form_build_id, form_id
 * 
 * */

$timeCounter = new Performance;
$time1 = $timeCounter->startCountTime();

$clean = new Sanitize;

$address = $clean->cleanData($_POST['Address']);
$streetAddress = $clean->cleanData($_POST['Address']);
$privacyoptoutform1_txtaddress = $clean->cleanData($_POST['Address']);
$tfa_Address1 = $clean->cleanData($_POST['Address']);

$aptSuite = $clean->cleanData($_POST['apt']);
$aptunitNumber = $clean->cleanData($_POST['apt']);

$city = $clean->cleanData($_POST['city']);
$privacyoptoutform1_txtcity = $clean->cleanData($_POST['city']);
$tfa_City = $clean->cleanData($_POST['city']);

$state = $clean->cleanData($_POST['state']);
$privacyoptoutform1_ddlstate = $clean->cleanData($_POST['state']);
$tfa_ProvinceState = $clean->cleanData($_POST['state']);

$zip = $clean->cleanData($_POST['zip']);
$zipCode = $clean->cleanData($_POST['zip']);
$privacyoptoutform1_txtzip = $clean->cleanData($_POST['zip']);
$tfa_PostalCode = $clean->cleanData($_POST['zip']);


$Email = $clean->cleanData($_POST['email']);
$privacyoptoutform1_txtemail = $clean->cleanData($_POST['email']);
$tfa_Email = $clean->cleanData($_POST['email']);

$submitContentForm = $clean->cleanData($_POST['submitContentForm']);
$xtraCode = $clean->cleanData($_POST['xtraCode']);
$typeOfRequest = $clean->cleanData($_POST['typeOfRequest']);

$firstName = $clean->cleanData($_POST['firstName']);
$lastName = $clean->cleanData($_POST['lastName']);
$tfa_FirstName = $clean->cleanData($_POST['firstName']);
$tfa_LastName = $clean->cleanData($_POST['lastName']);


$fullName = "". $firstName . " " . $lastName . "";
$names = $fullName;
$addresses = "". $address . ", " . $aptSuite . ", " . $city . ", " . $state . ", " . $zip . "";

$captcha_sid = $clean->cleanData($_POST['captcha_sid']);
$captcha_token = $clean->cleanData($_POST['captcha_token']);
//$captcha_response = $clean->cleanData($_POST['captcha_response']);

$form_build_id = $clean->cleanData($_POST['form_build_id']);
$form_id = $clean->cleanData($_POST['form_id']);

$privacyoptoutform1_txtfname = $firstName;
$privacyoptoutform1_txtlname = $lastName;


$pleaseIncludeYourFullNameAsItWillActAsYourSignature = $clean->cleanData($_POST['pleaseIncludeYourFullNameAsItWillActAsYourSignature']);


$requiredIfYourAddressHasAnApartmentOrUnitNumber = $clean->cleanData($_POST['requiredIfYourAddressHasAnApartmentOrUnitNumber']);


$phoneNumberoptional = $clean->cleanData($_POST['phoneNumberoptional']);
$privacyoptoutform1_txtphone = $clean->cleanData($_POST['phoneNumberoptional']);
$tfa_Telephone = $clean->cleanData($_POST['phoneNumberoptional']);

$privacyoptoutform1_chklst_0 = $clean->cleanData($_POST['privacyoptoutform1_chklst_0']);
$privacyoptoutform1_chklst_1 = $clean->cleanData($_POST['privacyoptoutform1_chklst_1']);
$privacyoptoutform1_chklst_2 = $clean->cleanData($_POST['privacyoptoutform1_chklst_2']);


$weWillOnlyCallYouToHelpYouWithYourRequest = $clean->cleanData($_POST['weWillOnlyCallYouToHelpYouWithYourRequest']);
$emailAddressoptional = $clean->cleanData($_POST['emailAddressoptional']);
$youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest = $clean->cleanData($_POST['youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest']);
$agreement = $clean->cleanData($_POST['agreement']);
$acceptAgreement = $clean->cleanData($_POST['acceptAgreement']);

$csrfmiddlewaretoken = $clean->cleanData($_POST['csrfmiddlewaretoken']);
$is_adult = $clean->cleanData($_POST['is_adult']);

$__EVENTTARGET = $clean->cleanData($_POST['__EVENTTARGET']);
$__EVENTARGUMENT = $clean->cleanData($_POST['__EVENTARGUMENT']);
$__VIEWSTATE = $clean->cleanData($_POST['__VIEWSTATE']);
$__PREVIOUSPAGE = $clean->cleanData($_POST['__PREVIOUSPAGE']);
$__EVENTVALIDATION = $clean->cleanData($_POST['__EVENTVALIDATION']);


$__VIEWSTATE2 = $clean->cleanData($_POST['__VIEWSTATE2']);


$tfa_Country = $clean->cleanData($_POST['tfa_Country']);

$tfa_Inquiry = $clean->cleanData($_POST['tfa_Inquiry']);

$tfa_dbFormId = $clean->cleanData($_POST['tfa_dbFormId']);

$tfa_dbControl = $clean->cleanData($_POST['tfa_dbControl']);

$tfa_dbVersionId = $clean->cleanData($_POST['tfa_dbVersionId']);


$ToolkitScriptManager1_HiddenField = $clean->cleanData($_POST['ToolkitScriptManager1_HiddenField']);
$__LASTFOCUS = $clean->cleanData($_POST['__LASTFOCUS']);
$OptOutChoices_0 = $clean->cleanData($_POST['OptOutChoices_0']);
$OptOutChoices_1 = $clean->cleanData($_POST['OptOutChoices_1']);
$OptOutChoices_2 = $clean->cleanData($_POST['OptOutChoices_2']);
$OptOutChoices_3 = $clean->cleanData($_POST['OptOutChoices_3']);


$Identity_0 = $clean->cleanData($_POST['Identity_0']);
$Identity_1 = $clean->cleanData($_POST['Identity_1']);
$Identity_02= $clean->cleanData($_POST['Identity_2']);


$ShowAddName = $clean->cleanData($_POST['ShowAddName']);
$ImageButton1 = $clean->cleanData($_POST['ImageButton1']);
$ImageButton2 = $clean->cleanData($_POST['ImageButton2']);
$ImageButton3 = $clean->cleanData($_POST['ImageButton3']);


//Instance of object to get captcha from Save.com and archive it in /tmp directory
//With 12 seconds of timeout at requisition
//I have got the URL in save.com html code
//cURL was used at Captcha class
$capt = new Captcha();
$trunc = new Truncate();

$capt->getCaptcha("tmp/captchax.jpg", "https://www.redplum.com/Captcha.jpg");
$textSavecom = $capt->sendCaptchaDBC("tmp/captchax.jpg", 12);
$captcha = $textSavecom;

$capt->getCaptcha("tmp/captchalexisnexis.gif", "http://www.lexisnexis.com/captcha/CaptchaImagePlayer.aspx");
$streamGIF = $trunc->readFileToString("tmp/captchalexisnexis.gif"); // Read the complex file and put content in a string
$streamGIF = $trunc->truncateString($streamGIF, "<!DOCTYPE"); // Truncate complex file cuting HTML content and isoling GIF content
$trunc->writeStringToFile("tmp/captchalexisnexis.gif", $streamGIF); // Put the GIF file in the disk to subimmit for DBC
$textLexisNexis = $capt->sendCaptchaDBC("tmp/captchalexisnexis.gif", 12);
$privacyoptoutform1_txtcaptcha = $textLexisNexis;

$capt->getCaptcha("tmp/captchawilanddirect.gif", "https://www.wilanddirect.com/image_captcha/8304/1382545975");
$textWilanddirect = $capt->sendCaptchaDBC("tmp/captchawilanddirect.gif", 12);
$captcha_response = $textWilanddirect;

$up = new UpPost;

/*
 ** Coxtarget.com:
 * $Address, $aptSuite, $City, $State, $Zip, $Email
 * */

$datax = array('$Address' => $address, '$aptSuite' => $aptunitNumber, '$Address' => $address, '$City' => $city, '$State' => $state,
 '$Zip' => $zip, '$Email' => $Email);

$up->up("http://coxtarget.com/mailsuppression/s/StoreMailSuppression", $datax);
var_dump($datax);

/*
* Save.com:
 * submitContentForm, xtraCode, typeOfRequest, fullName, pleaseIncludeYourFullNameAsItWillActAsYourSignature,
 * streetAddress, aptunitNumber, requiredIfYourAddressHasAnApartmentOrUnitNumber, city, state,
 * zipCode, phoneNumberoptional, weWillOnlyCallYouToHelpYouWithYourRequest, emailAddressoptional,
 * youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest, agreement, acceptAgreement,
 * captcha
 * 
 * */


$datax = array('submitContentForm' => $submitContentForm, 'xtraCode' => $xtraCode, 'typeOfRequest' => $typeOfRequest,
 'fullName' => $fullName, 'pleaseIncludeYourFullNameAsItWillActAsYourSignature' => $pleaseIncludeYourFullNameAsItWillActAsYourSignature,
  'streetAddress' => $streetAddress, 'aptunitNumber' => $aptunitNumber, 'requiredIfYourAddressHasAnApartmentOrUnitNumber' => $requiredIfYourAddressHasAnApartmentOrUnitNumber, 
  'city' => $city, 'state' => $state, 'zipCode' => $zipCode, 'phoneNumberoptional' => $phoneNumberoptional,
  'weWillOnlyCallYouToHelpYouWithYourRequest' => $weWillOnlyCallYouToHelpYouWithYourRequest, 'emailAddressoptional' => $Email, 
  'youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest' => $youWillNotBeAddedToAnyEmailListsWeOnlyUseThisToHelpYouWithYourRequest, 
  'agreement' => $agreement, 'acceptAgreement' => $acceptAgreement, 'captcha' => $textSavecom);

$up->up("https://www.redplum.com/tools/dotCMS/submitContent", $datax);
echo "<p></p><img src='tmp/captchax.jpg'>";
var_dump($datax);





/*
* PennySaverUSA.com
 * csrfmiddlewaretoken, name, address, apt, city, state, zip, email, is_adult
 * 
 * */


$datax = array('csrfmiddlewaretoken' => $csrfmiddlewaretoken ,'name' => $fullName, 'address' => $streetAddress,
  'apt' => $aptunitNumber, 'city' => $city, 'state' => $state, 'zip' => $zipCode, 'email' => $Email, 'is_adult' => $is_adult);

$up->up("http://www.pennysaverusa.com/mailinglist/", $datax);
var_dump($datax);




/* 
 * LexisNexis.com:
 * privacyoptoutform1$txtfname, privacyoptoutform1$txtlname, privacyoptoutform1$txtaddress,
 * privacyoptoutform1$txtcity, privacyoptoutform1$ddlstate, privacyoptoutform1$txtzip,
 * privacyoptoutform1$txtemail, privacyoptoutform1$txtphone, privacyoptoutform1_chklst_0,
 * privacyoptoutform1_chklst_1, privacyoptoutform1_chklst_2, privacyoptoutform1$txtcaptcha,
 * __EVENTTARGET, __EVENTARGUMENT, __VIEWSTATE, __PREVIOUSPAGE, __EVENTVALIDATION
 * 
 */

$datax = array('privacyoptoutform1$txtfname' => $privacyoptoutform1_txtfname, 'privacyoptoutform1$txtlname' => $privacyoptoutform1_txtlname,
'privacyoptoutform1$txtaddress' => $privacyoptoutform1_txtaddress, 'privacyoptoutform1$txtcity' => $privacyoptoutform1_txtcity, 
'privacyoptoutform1$ddlstate' => $privacyoptoutform1_ddlstate, 'privacyoptoutform1$txtzip' => $privacyoptoutform1_txtzip,
'privacyoptoutform1$txtemail' => $privacyoptoutform1_txtemail, 'privacyoptoutform1$txtphone' => $privacyoptoutform1_txtphone,
'privacyoptoutform1_chklst_0' => $privacyoptoutform1_chklst_0, 'privacyoptoutform1_chklst_1' => $privacyoptoutform1_chklst_1,
'privacyoptoutform1_chklst_2' => $privacyoptoutform1_chklst_2, 'privacyoptoutform1$txtcaptcha' => $privacyoptoutform1_txtcaptcha,
'__EVENTTARGET' => $__EVENTTARGET, '__EVENTARGUMENT' => $__EVENTARGUMENT, '__VIEWSTATE' => $__VIEWSTATE,
'__PREVIOUSPAGE' => $__PREVIOUSPAGE, '__EVENTVALIDATION' => $__EVENTVALIDATION);

$up->up("http://www.lexisnexis.com/privacy/directmarketingopt-out.aspx", $datax);
var_dump($datax);



/* 
 * Nielsen.com
 * tfa_Dontemailmeanymo, tfa_Dontsendmeanymor, tfa_Dontcallmeanymor, tfa_Idontwanttoparti, tfa_Otherpleaseexpla,
 * tfa_FirstName, tfa_LastName, tfa_Email, tfa_Telephone, tfa_Address1, tfa_City, tfa_Country, tfa_ProvinceState,
 * tfa_PostalCode, tfa_Inquiry, tfa_dbFormId, tfa_dbControl, tfa_dbVersionId
 * 
 * */
 
 $datax = array('tfa_Dontemailmeanymo' => $tfa_Dontemailmeanymo, 'tfa_Dontsendmeanymor' =>  $tfa_Dontsendmeanymor,
 'tfa_Dontcallmeanymor' => $tfa_Dontcallmeanymor, 'tfa_Idontwanttoparti' => $tfa_Idontwanttoparti,
 'tfa_Otherpleaseexpla' => $tfa_Otherpleaseexpla, 'tfa_FirstName' => $tfa_FirstName, 'tfa_LastName' => $tfa_LastName,
 'tfa_Email' => $tfa_Email, 'tfa_Telephone' => $tfa_Telephone, 'tfa_Address1' => $tfa_Address1, 'tfa_City' => $tfa_City,
 'tfa_Country' => $tfa_Country, 'tfa_ProvinceState' => $tfa_ProvinceState, 'tfa_PostalCode' => $tfa_PostalCode,
 'tfa_Inquiry' => $tfa_Inquiry, 'tfa_dbFormId' => $tfa_dbFormId, 'tfa_dbControl' => $tfa_dbControl,
 'tfa_dbVersionId' => $tfa_dbVersionId);
 
 
$up->up("http://www.tfaforms.com/responses/processor", $datax);
var_dump($datax);
 
 
 
 
/* 
 * Acxiom.com - https://isapps.acxiom.com/optout/optout.aspx
 * ToolkitScriptManager1_HiddenField, __EVENTTARGET, __EVENTARGUMENT, __LASTFOCUS, __VIEWSTATE2, __EVENTVALIDATION2,
 * OptOutChoices_0, OptOutChoices_1, OptOutChoices_2, OptOutChoices_3, Identity_0, Identity_1, Identity_2,
 * ShowAddName, ImageButton1, ImageButton2, ImageButton3
 * 
 * */
 
$datax = array('ToolkitScriptManager1_HiddenField' => $ToolkitScriptManager1_HiddenField, '__EVENTTARGET' => $__EVENTTARGET,
'__EVENTARGUMENT' => $__EVENTARGUMENT, '__LASTFOCUS' => $__LASTFOCUS, '__VIEWSTATE' => $__VIEWSTATE2, '__EVENTVALIDATION' => $__EVENTVALIDATION2,
'OptOutChoices_0' => $OptOutChoices_0, 'OptOutChoices_1' => $OptOutChoices_1, 'OptOutChoices_2' => $OptOutChoices_2,
'OptOutChoices_3' => $OptOutChoices_3, 'Identity_0' => $Identity_0, 'Identity_1' => $Identity_1, 'Identity_2' => $Identity_2,
'ShowAddName' => $ShowAddName, 'ImageButton1' => $ImageButton1, 'ImageButton2' => $ImageButton2,
'ImageButton3' => $ImageButton3);


$up->up("https://isapps.acxiom.com/optout/optout.aspx", $datax);
var_dump($datax);





/*
 * Datalogix.com
 * Put a cookie in the web browser of client and block the ads by 24 months
 * The cookie is loaded in a iframe
 * */
echo '<iframe id="reloptoutdata" frameborder="0" src="https://f.nexac.com/e/flagdata.xgi?na_fn="></iframe>';
 
 
 
 /* 
 * Wilanddirect.com
 * names, addresses, captcha_sid, captcha_token, captcha_response, form_build_id, form_id
 * 
 * */
 
$datax = array('names' => $names, 'addresses' => $addresses, 'captcha_sid' => $captcha_sid, 'captcha_token' => $captcha_token,
'captcha_response' => $captcha_response, 'form_build_id' => $form_build_id, 'form_id' => $form_id);
 
$up->up("https://www.wilanddirect.com/opt-out-policy", $datax);
var_dump($datax);
 
 
$time2 = $timeCounter->endCountTime();
echo "<p>Total Time: ".($time2 - $time1);

?>
