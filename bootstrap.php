<?php
class StriperBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Striper';
}
$app = new StriperBootstrap();