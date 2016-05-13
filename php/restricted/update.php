<?php
if (!isset($_SESSION))
{
    session_start();
}
include_once "../helper/functions.php";
if (!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}
$url = "http://max-spaghettic0der.rhcloud.com/codera-master.zip";
$downloadLocation = downloadZip($url);
$copyLocation = "../../../";
extractZip($downloadLocation, $copyLocation);
deleteOldVersion();


function downloadZip($url)
{
    $file = file_get_contents($url);
    $downloadLocation = "../../../codera-master.zip";
    file_put_contents($downloadLocation, $file);
    return $downloadLocation;
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
        print_r($stack);
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
}
