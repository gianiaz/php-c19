#!/usr/bin/env php
<?php
ini_set('display_errors', 0);

require 'vendor/autoload.php';
use Herald\GreenPass\Utils\CertificateValidator;
use Herald\GreenPass\Utils\FileUtils;
use Herald\GreenPass\Validation\Covid19\ValidationScanMode;

FileUtils::overrideCacheFilePath("/tmp");

$gp_string = $argv[1] ?? 'INVALID';
try {
    $gp_reader = new CertificateValidator($gp_string, ValidationScanMode::CLASSIC_DGP);
    $gp_info = $gp_reader->getCertificateSimple();

    echo "\n";
    echo "\n";
    echo 'Data test: '.$gp_info->timeStamp->format('d-m-Y H:i:s');
    echo "\n";
    echo 'Stato: '.$gp_info->certificateStatus;
    echo "\n";
    echo "\n";

    if($gp_info->certificateStatus === 'VALID') {
        echo 'Nome: '. $gp_info->person->standardisedGivenName;
        echo "\n";
        echo 'Cognome: '. $gp_info->person->standardizedFamilyName;
        echo "\n";
        echo 'Data nascita: '.$gp_info->dateOfBirth->format('d-m-Y');
        echo "\n";
        echo "\n";
    }

} catch (\Throwable $exception) {
    echo $exception->getMessage();
}

