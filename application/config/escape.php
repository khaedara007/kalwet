<?php
defined('BASEPATH') or exit('No direct script access allowed');


// List of keys or dot-paths to skip escaping. Useful for WYSIWYG fields or
// API payloads that intentionally contain HTML or markup.
// Examples: 'description', 'content', 'meta.description', 'items.*'
$config['exceptions'] = array(
    'content',
    'description',
    'raw_html',
    // wildcard example: don't escape any array keys under 'items'
    'items.*',
);
