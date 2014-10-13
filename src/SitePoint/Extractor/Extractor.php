<?php

namespace SitePoint\Extractor;

use Distill\Distill;

/**
 * Class to extract archived files
 */
class Extractor
{
    /**
     * Minimum size strategy
     */
    const MINIMUM_SIZE = "\Distill\Strategy\MinimumSize";

    /**
     * Uncompression speed strategy
     */
    const UNCOMPRESSION_SPEED = "\Distill\Strategy\UncompressionSpeed";

    /**
     * Random strategy
     */
    const RANDOM = "\Distill\Strategy\Random";

    /**
     * @var Distill
     */
    private $distiller;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->distiller = new Distill();
    }

    /**
     * Extract files into directory
     *
     * @param string $fromFile
     * @param string $toDirectory
     */
    public function extract($fromFile, $toDirectory)
    {
        $this->distiller->extract($fromFile, $toDirectory);
    }

    /**
     * Choose one of the files within the array and extract it to the given directory
     *
     * @param array  $fromFiles
     * @param string $toDirectory
     * @param string $preferredStrategy
     */
    public function chooseAndExtract(array $fromFiles, $toDirectory, $preferredStrategy = self::MINIMUM_SIZE)
    {
        $preferredFile = $this->distiller
            ->getChooser()
            ->setStrategy(new $preferredStrategy())
            ->setFiles($fromFiles)
            ->getPreferredFile();

        self::extract($preferredFile, $toDirectory);
    }
}
