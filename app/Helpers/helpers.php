<?php

use App\Models\Backend\SiteSettings;

if (!function_exists('get_latest_site_settings')) {
    /**
     * Retrieve the most recent SiteSettings record.
     *
     * @return \App\Models\SiteSettings|null
     */
    function get_latest_site_settings()
    {
        return SiteSettings::orderBy('id', 'desc')->first();
    }
}