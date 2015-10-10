<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 18/12/14
 * Time: 21:34
 */

/**
 * make path of assets folder
 *
 * @return string path assets
 */
function assets_url()
{
    return base_url()."assets/";
}

/**
 * make path for vendors folder
 *
 * @return string path vendors
 */
function apps_url()
{
    return base_url()."assets/apps/";
}