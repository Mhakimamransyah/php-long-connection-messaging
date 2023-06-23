<?php

namespace Api;
use Config\Config;

interface ControllerFactory {
    public static function controller(?Config &$config) : array;
}