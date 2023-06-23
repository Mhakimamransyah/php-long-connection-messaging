<?php

namespace Consumer;

use Config\Config;

interface ControllerFactory {
    public static function controller(?Config &$config);
}