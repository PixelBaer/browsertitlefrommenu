<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

class PlgSystemBrowserTitleFromMenu extends CMSPlugin
{
    public function onBeforeRender()
    {
        $app = Factory::getApplication();

        // Check if we are in the frontend
        if ($app->isClient('site')) {
            $menu = $app->getMenu()->getActive();

            if ($menu) {
                // Get the menu item params
                $params = $menu->getParams();
                $customPageTitle = $params->get('page_title', '');

                // Get the document object
                $doc = $app->getDocument();

                // Set the browser title if a custom page title is not set
                if (!empty($customPageTitle)) {
                    // do nothing ¯\_(ツ)_/¯
                } else {
                    $doc->setTitle($menu->title);
                }
            }
        }
    }
}
