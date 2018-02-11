<?php
namespace Grav\Theme;

class il4e extends Haywire
{
   public function onTwigSiteVariables()
    {
        // Asset cache busting handler
        $manifest = __DIR__ . '/dist/mix-manifest.json';

        if (file_exists($manifest)) {
            $assets = json_decode(file_get_contents($manifest), true);
            $this->grav['assets']->addJs('theme://dist/' . $assets['/js/app.js'], ['group' => 'bottom']);
            $this->grav['assets']->addCss('theme://dist/' . $assets['/css/app.css'],10);
        }
        $fa_bits = [];
        $faCurrentVersion = '5.0.6';
				$fa_bits[] = "https://use.fontawesome.com/releases/v{$faCurrentVersion}/js/all.js";

				$assets = $this->grav['assets'];
				$assets->registerCollection('fontawesome', $fa_bits);
				$assets->add('fontawesome', 100);
    }
}
?>