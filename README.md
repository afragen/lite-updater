# Alternate Updater

* Contributors: afragen
* Tags: plugin, theme, updater, git-updater
* Requires at least: 6.6
* Requires PHP: 8.0
* Donate link: <https://thefragens.com/git-updater-donate>
* License: MIT

A simple plugin to enable automatic updates to your git hosted WordPress plugins or themes from a Git Updater based update server.

## Description

This plugin was designed to be added to your git hosted plugin or theme to enable updates directly from git hosts. 

You must have a publicly reachable site that will be used for dynamically retrieving the update API data.

* [Git Updater](https://git-updater.com) is required on a site where all of the release versions of your plugins and themes are installed.
* All of your plugins/themes **must** be integrated with Git Updater.
* You must be using Git Updater v12.8.0 or better. 

Git Updater is capable of returning a [REST endpoint](https://git-updater.com/knowledge-base/remote-management-restful-endpoints/#articleTOC_3/) containing the `plugins_api()` or `themes_api()` data for your plugin/theme. You will pass this endpoint during the integration.

The REST endpoint format is as follows.

* plugins - `https://my-site.com/wp-json/git-updater/v1/update-api/?slug=my-plugin`
* themes - `https://my-site.com/wp-json/git-updater/v1/update-api/?slug=my-theme`

## Installation

Install the plugin.

Add the following to your plugin or theme. Where `<update server URI>` is the domain to the update server, eg `https://git-updater.com`.

```php
add_filter( 'au_update_server', function () {
    return '<update server URI>';
});
add_action( 'plugins_loaded', function () {
    ( new \Fragen\Alternate_Updater\Updater( __FILE__ ) )->run();
});
```

FWIW, I test by decreasing the version number locally to see an update.
