<?php
/**
 * Block Name: Contact form
 * Description: Contact form block managed with ACF.
 * Category: common
 * Icon: email
 * Keywords: contact-form contact form acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = $slug . '-' . $block['id'];
?>
