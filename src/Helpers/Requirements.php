<?php

namespace AbbyJanke\BackpackInstaller\Helpers;

class Requirements
{

    /**
     * Check server requirements
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {
        $results = [];

        foreach($requirements as $type => $requirement)
        {
            switch ($type) {

                // check php requirements
                case 'php':
                    foreach($requirements[$type] as $requirement)
                    {
                        $results[$type][$requirement] = true;

                        if(!extension_loaded($requirement))
                        {
                            $results[$type][$requirement] = false;

                            $results['errors'] = true;
                        }
                    }
                    break;

                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $requirement) {
                        // double check if apache is installed
                        if(function_exists('apache_get_modules'))
                        {
                            $results[$type][$requirement] = true;

                            if(!in_array($requirement,apache_get_modules()))
                            {
                                $results[$type][$requirement] = false;

                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    /**
     * Check PHP version requirement.
     *
     * @return array
     */
    public function checkPHPversion(string $minPhpVersion = null)
    {
        $minVersionPhp = $minPhpVersion;
        $currentPhpVersion = $this->getPhpVersionInfo();
        $supported = false;

        if ($minPhpVersion == null) {
            $minVersionPhp = $this->getMinPhpVersion();
        }

        if (version_compare($currentPhpVersion['version'], $minVersionPhp) >= 0) {
            $supported = true;
        }

        $phpStatus = [
            'current' => $currentPhpVersion['version'],
            'minimum' => $minVersionPhp,
            'supported' => $supported
        ];

        return $phpStatus;
    }

    /**
     * Get current Php version information
     *
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];

        return [
            'version' => $currentVersion
        ];
    }

    /**
     * Get minimum PHP version ID.
     *
     * @return string _minPhpVersion
     */
    protected function getMinPhpVersion()
    {
        return config('backpack.installer.phpVersion');
    }

}
