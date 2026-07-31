<?php
/**
 * Vercel serverless function entrypoint.
 * Forwards every request to Laravel's normal public entrypoint.
 */
require __DIR__.'/../public/index.php';
