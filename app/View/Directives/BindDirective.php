<?php

namespace App\View\Directives;

use Illuminate\Support\Facades\Blade;

class BindDirective
{
    public static function register()
    {
        // Directive ouvrante
        Blade::directive('bind', function ($expression) {
            return "<?php \$__bindData = {$expression}; ?>";
        });

        // Directive fermante
        Blade::directive('endbind', function () {
            return "<?php unset(\$__bindData); ?>";
        });

        // Directive pour remplir les champs
        Blade::directive('field', function ($expression) {dd($expression);
            return "<?php echo e(old({$expression}, \$__bindData->{$expression} ?? '')); ?>";
        });
    }
}
