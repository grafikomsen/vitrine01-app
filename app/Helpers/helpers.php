<?php

use App\Models\Settings;

function getSettings(){
    return Settings::first();
}
