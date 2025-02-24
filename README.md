# Lite Updater

* Contributors: afragen
* Tags: plugin, theme, updater, git updater
* Requires at least: 6.6
* Requires PHP: 7.4
* Donate link: <https://thefragens.com/git-updater-donate>
* License: MIT

A simple plugin to enable automatic updates to your git hosted WordPress plugins or themes from a Git Updater based Update API server.

## Description

This plugin was designed to be added to your git hosted plugin or theme to enable updates directly from git hosts. This plugin will determine which plugins/themes have data in the `Update URI` header and might be integrated with Git Updater Lite. It will then process any relevant packages via Git Updater Lite.

You must have a publicly reachable site that will be used for dynamically retrieving the update API data.

* [Git Updater](https://git-updater.com) is required on a site serving as the Update API Server.
* All of your plugins/themes **must** be added to Git Updater's Additions tab.
* You must be using Git Updater v12.9.0 or better. 

Git Updater is capable of returning a [REST endpoint](https://git-updater.com/knowledge-base/remote-management-restful-endpoints/#articleTOC_3/) containing the `plugins_api()` or `themes_api()` data for your plugin/theme.

The REST endpoint format is as follows.

* plugins - `https://my-site.com/wp-json/git-updater/v1/update-api/?slug=my-plugin`
* themes - `https://my-site.com/wp-json/git-updater/v1/update-api/?slug=my-theme`

## Installation

Install and activate the plugin.

FWIW, I test by decreasing the version number locally to see an update.
