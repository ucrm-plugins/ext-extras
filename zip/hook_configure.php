<?php /** @noinspection DuplicatedCode */
declare(strict_types=1);

require_once __DIR__."/vendor/autoload.php";

global $_MANIFEST, $_CONFIG;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger(PLUGIN_NAME);
$logger->pushHandler(new StreamHandler(PLUGIN_DIR."/data/plugin.log"));

//$logger->info("Configuration changed!");



// /usr/src/ucrm/web/dist/app.min.js
/*!
 * numbro.js language configuration
 * language : Norwegian Nynorsk (nn)
 * author : Tim McIntosh (StayinFront NZ)
 */
/*
 * CHANGE:
 * window.numbro.language&&window.numbro.language("nn",t)
 * window.numbro.culture&&window.numbro.culture("nn",t)
 */


/*! jQuery Migrate v3.4.0 | (c) OpenJS Foundation and other contributors | jquery.org/license */





if($_CONFIG["widePluginPanel"])
{
    $logger->info("widePluginPanel = Enabled");
}
else
{
    $logger->info("widePluginPanel = Disabled");
}




exit;

const TWIG_HTML_FILE = "/usr/src/ucrm/app/Resources/views/base.html.twig";
const TWIG_CACHE_DIR = "/usr/src/ucrm/app/cache/prod/twig";

$changed = false;
$html = file_get_contents(TWIG_HTML_FILE);
$href = "/crm/_plugins/ext-darkmode/public/css/darkmode.css?ver=".PLUGIN_VERSION;
$link = "<link rel=\"stylesheet\" href=\"$href\">";
$tab = str_repeat(" ", 8);

switch(preg_match("|$href|", $html))
{
    case 0:
        // Not Found!
        $spot = preg_quote("{% block stylesheets %}");
        $html = preg_replace("|^(\s*$spot)|m", "$tab$link\n\$1", $html);
        $changed = true;
        $logger->info("Dark Mode enabled");
        break;
    case 1:
        // Found!
        $logger->info("Stylesheet darkmode.css is already included, did something go wrong?");
        break;
    case false:
        // Error!
        break;
}

if($changed)
{
    file_put_contents(TWIG_HTML_FILE, $html);
    exec("rm -rf ".TWIG_CACHE_DIR);
    $logger->info("Cleared twig template cache");
}

