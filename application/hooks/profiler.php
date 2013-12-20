<?php
//HOOKS FOR CI PROJECT

//ENABLE PROFILER FOR TEST ENVIROMENT. COMMENT OUT FOR LIVE
function profiler_enable() {
    
    if (defined('ENVIRONMENT'))
    {
        switch (ENVIRONMENT)
        {
            case 'development':
            $CI_instance =& get_instance(); //Get ref to instance
            $CI_instance->output->enable_profiler(TRUE); //Enable Profiler Output
            break;
        }
    }
}
