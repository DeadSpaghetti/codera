<?php
if (!isset($_SESSION))
{
    session_start();
}
include_once "../helper/functions.php";
if ($_SESSION['loggedIn'] != "admin")
{
    header('Location: ../login.php');
    exit;
}
$url = "https://github.com/DeadSpaghetti/codera/archive/1.0.0.zip";
$copyLocation = "../../../";
$downloadLocation = "../../../codera-master.zip";
downloadZip($url, $downloadLocation);
extractZip($downloadLocation, $copyLocation);
deleteOldVersion();
copyNewFiles($copyLocation . "codera-master/");
$downloadLocation = "../../../";
cleanupTempFiles($downloadLocation);
header("Location: ../index.php");


function downloadZip($url, $downloadLocation)
{
    $file = file_get_contents($url);
    file_put_contents($downloadLocation, $file);
}

function extractZip($downloadLocation, $copyLocation)
{
    shell_exec("unzip -o $downloadLocation -d $copyLocation");
}

/**
 * Delete a file, or a folder and its contents (stack algorithm)
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.0
 * @link        http://aidanlister.com/repos/v/function.rmdirr.php
 * @param       string $dirname Directory to delete
 * @return      bool     Returns TRUE on success, FALSE on failure
 */
function rmdirr($dirname)
{
    // Sanity check
    if (!file_exists($dirname))
    {
        return false;
    }

    // Simple delete for a file
    if (is_file($dirname) || is_link($dirname))
    {
        return unlink($dirname);
    }

    // Create and iterate stack
    $stack = array($dirname);
    while ($entry = array_pop($stack))
    {
        // Watch for symlinks
        if (is_link($entry))
        {
            unlink($entry);
            continue;
        }

        // Attempt to remove the directory
        if (@rmdir($entry))
        {
            continue;
        }

        // Otherwise add it to the stack
        $stack[] = $entry;
        $dh = opendir($entry);
        while (false !== $child = readdir($dh))
        {
            // Ignore pointers
            if ($child === '.' || $child === '..')
            {
                continue;
            }

            // Unlink files and add directories to stack
            $child = $entry . DIRECTORY_SEPARATOR . $child;
            if (is_dir($child) && !is_link($child))
            {
                $stack[] = $child;
            } else
            {
                unlink($child);
            }
        }
        closedir($dh);
    }

    return true;
}

function deleteOldVersion()
{
    $css = "../../css";
    rmdirr($css);

    $js = "../../js";
    rmdirr($js);

    $php = "../../php";
    rmdirr($php);

    $versionTxtFile = "../../config/version.txt";
    rmdirr($versionTxtFile);
}

/**
 * Copy a file, or recursively copy a folder and its contents
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.1
 * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
 * @param       string $source Source path
 * @param       string $dest Destination path
 * @param       int $permissions New folder creation permissions
 * @return      bool     Returns true on success, false on failure
 */
function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source))
    {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source))
    {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest))
    {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read())
    {
        // Skip pointers
        if ($entry == '.' || $entry == '..')
        {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}

function copyNewFiles($copyLocation)
{
    $coderaFolder = "../../";
    $jsSource = $copyLocation . "js/";
    $cssSource = $copyLocation . "css/";
    $phpSource = $copyLocation . "php/";
    $configFile = $copyLocation . "config/version.txt";

    xcopy($cssSource, $coderaFolder . "css");
    xcopy($jsSource, $coderaFolder . "js");
    xcopy($phpSource, $coderaFolder . "php");
    xcopy($configFile, $coderaFolder . "config/version.txt");
}

function cleanupTempFiles($downloadLocation)
{
    rmdirr($downloadLocation . "codera-master.zip");
    rmdirr($downloadLocation . "codera-master");
}