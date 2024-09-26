<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Ps_ContactInfoOverride extends Ps_ContactInfo
 {
    public function getWidgetVariables($hookName, array $configuration)
    {
        $variables = parent::getWidgetVariables($hookName, $configuration);
        // Remplacez le numéro de téléphone par "Contactez-nous"
        $variables['contact_infos']['phone'] = '+216 71 258 000';

        return $variables;
    }
 }