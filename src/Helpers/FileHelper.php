<?php

namespace JTMcC\AtomicDeployments\Helpers;

use JTMcC\AtomicDeployments\Exceptions\InvalidPathException;

use Illuminate\Support\Facades\File;

class FileHelper
{
    /**
     * @param string ...$paths
     *
     * @return bool
     *
     * @throws InvalidPathException
     */
    public static function confirmPathsExist(string ...$paths): bool
    {
        foreach ($paths as $path) {
            if (!File::exists($path)) {
                throw new InvalidPathException("{$path} does not exist");
            }
        }

        return true;
    }

    /**
     * @param $path
     * @param int $mode
     * @param false $recursive
     */
    public static function createDirectory($path, $mode = 0755, $recursive = true): void
    {
        File::ensureDirectoryExists($path, $mode, $recursive);
    }
}