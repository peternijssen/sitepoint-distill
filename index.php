<?php

require_once __DIR__ . '/vendor/autoload.php';

$files = array(
    'files/sitepoint.zip',
    'files/sitepoint.tar.gz',
    'files/sitepoint.tar'
);

$extractor = new \SitePoint\Extractor\Extractor();
$extractor->extract(current($files), 'files/extracted/simple');
$extractor->chooseAndExtract($files, 'files/extracted/advanced', \SitePoint\Extractor\Extractor::RANDOM);