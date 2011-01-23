<?
$args = $_SERVER['argv'];
if (0 == count($args) || ‘–help’ == $args[1] || ‘-help’ == $args[1]) {
exit("\nUsage::\n\tphp kmlPointReverser.php [path_to_KML_file] [> [file_to_save]]"
. "\n\n\t[path_to_KML_file]::\n\t\toptional – if no filename is provided then the "
. "default of ‘kmlpoints.rtf’ will be used.\n\t[> [file_to_save]]::\n\t\t"
. "optional – pipe the output to a file (unix).\n\n");
}
if (1 == count($args)) {
$filename = "./kmlpoints.rtf";
} else {
$filename = $args[1];
}
$fd = fopen ($filename, "r") or exit("\nCould not open the file: " . $filename
. ".\nAre you sure you entered the right path to the KML file?\n\n");
$contents = fread ($fd,filesize ($filename));
fclose ($fd);
$delimiter = " ";
$splitcontents = explode($delimiter, $contents);
$splitcontents = array_reverse($splitcontents);
$counter = "";
foreach ( $splitcontents as $splitcontent )
{
$counter = $counter+1;
print($splitcontent . " ");
}
