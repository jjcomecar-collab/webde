<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminDerecho',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>ADMIN</b> - D° CC.PP.',
    'logo_img' => 'vendor/adminlte/dist/img/logo_derecho.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------w
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-success',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,  // null
    'layout_fixed_navbar' => true,  // null
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    // 'classes_auth_card' => 'card-outline card-primary',
    // 'classes_auth_header' => '',
    // 'classes_auth_body' => '',
    // 'classes_auth_footer' => '',
    // 'classes_auth_icon' => '',
    // 'classes_auth_btn' => 'btn-flat btn-primary',

    'classes_auth_card' => '',
    'classes_auth_header' => 'bg-gradient-info',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-info',
    'classes_auth_btn' => 'btn-flat btn-success',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Asset Bundling
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Asset Bundling option for the admin panel.
    | Currently, the next modes are supported: 'mix', 'vite' and 'vite_js_only'.
    | When using 'vite_js_only', it's expected that your CSS is imported using
    | JavaScript. Typically, in your application's 'resources/js/app.js' file.
    | If you are not using any of these, leave it as 'false'.
    |
    | For detailed instructions you can look the asset bundling section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type' => 'navbar-search',
            'text' => 'search',
            'topnav_right' => false,
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'text' => 'panel',
            'url' => 'dashboard',
            'icon' => 'far fa-fw fa-file',
        ],

        ['header' => '--------------------------------------------'],

        [
            'text' => 'INICIO',
            'icon' => 'fas fa-fw fa-folder',
            'submenu' => [
                [
                    'text' => 'Carrusel',
                    'route' => 'carrusel.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Square',
                    'route' => 'square.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Welcome',
                    'route' => 'welcome.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Runauto',
                    'route' => 'runauto.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Quantitie',
                    'route' => 'quantitie.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Decano',
                    'route' => 'decano.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Auditorio',
                    'route' => 'auditorio.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'RCU',
                    'route' => 'rcu.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Portfolio',
                    'route' => 'portafolio.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Horario',
                    'route' => 'horario.index',
                    'icon' => 'far fa-fw fa-file',
                ],
                [
                    'text' => 'Bachiller',
                    'route' => 'bachiller.index',
                    'icon' => 'far fa-fw fa-file',
                ],
            ],
        ],


        ['header' => '--------------------------------------------'],



        [
            'text' => 'PRESENTACION',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'presentacion']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'presentacion']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'presentacion']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'presentacion']],
                ],
            ],
        ],


        [
            'text' => 'VISION-MISION',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'visionmision']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'visionmision']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'visionmision']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'visionmision']],
                ],
            ],
        ],

        [
            'text' => 'Historia',
            'route' => 'historia.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'Organigrama',
            'route' => 'organigrama.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'Autoridades',
            'route' => 'autoridade.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'Administrativos',
            'route' => 'administrativo.index',
            'icon' => 'far fa-fw fa-file',
        ],


        [
            'text' => 'Docente_Derecho',
            'route' => 'docentederecho.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'Docente_Politica',
            'route' => 'docentepolitica.index',
            'icon' => 'far fa-fw fa-file',
        ],

        ['header' => '--------------------------------------------'],


        [
            'text' => 'CONSEJO FACULTAD',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'consejofacultad']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'consejofacultad']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'consejofacultad']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'consejofacultad']],
                ],
            ],
        ],

        [
            'text' => 'Decano FUN',
            'route' => 'decanofun.index',
            'icon' => 'far fa-fw fa-file',
        ],



        [
            'text' => 'Administrador FUN',
            'route' => 'administradorfun.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'POI',
            'route' => 'poi.index',
            'icon' => 'far fa-fw fa-file',
        ],


        [
            'text' => 'Departamento',
            'route' => 'departamento.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'REPRE-DERECHO',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'reprederecho']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'reprederecho']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'reprederecho']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'reprederecho']],
                ],
            ],
        ],

        [
            'text' => 'Repre Politica',
            'route' => 'reprepolitica.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'Respon Social',
            'route' => 'responsocial.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'TRAMITES COSTOS',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'tramitecosto']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'tramitecosto']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'tramitecosto']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'tramitecosto']],
                ],
            ],
        ],

        [
            'text' => 'COMITES',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'comite']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'comite']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'comite']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'comite']],
                ],
            ],
        ],

        [
            'text' => 'RSU',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'rsu']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'rsu']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'rsu']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'rsu']],
                ],
            ],
        ],

        [
            'text' => 'TUTORIA',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'tutoria']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'tutoria']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'tutoria']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'tutoria']],
                ],
            ],
        ],

        ['header' => '--------------------------------------------'],

        [
            'text' => 'DERECHO',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'derecho']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'derecho']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'derecho']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'derecho']],
                ],

                // 👉 NUEVA SECCIÓN
                [
                    'text' => 'Alumnos Tesistas',
                    'icon' => 'fas fa-user-graduate',
                    'route' => ['admin.alumnotesistas.index', ['modulo' => 'derecho']],
                ],

            ],
        ],

        [
            'text' => 'POLITICA',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'politica']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'politica']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'politica']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'politica']],
                ],
            ],
        ],



        ['header' => '--------------------------------------------'],

        [
            'text' => 'Lina de INV',
            'route' => 'linea.index',
            'icon' => 'far fa-fw fa-file',
        ],

        [
            'text' => 'ESTRUCTURA',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'estructura']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'estructura']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'estructura']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'estructura']],
                ],
            ],
        ],




        ['header' => '--------------------------------------------'],

        [
            'text' => 'Estandares',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'estandares']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'estandares']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'estandares']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'estandares']],
                ],
            ],
        ],


        [
            'text' => 'USE',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'use']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'use']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'use']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'use']],
                ],
            ],
        ],


        ['header' => '--------------------------------------------'],



        [
            'text' => 'CEPEJUP',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'cepejup']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'cepejup']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'cepejup']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'cepejup']],
                ],
            ],
        ],



        [
            'text' => 'Normatividad',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'normatividad']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'normatividad']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'normatividad']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'normatividad']],
                ],
            ],
        ],






        ['header' => '--------------------------------------------'],

        [
            'text' => 'ACREDITACION',
            'icon' => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'About',
                    'route' => ['admin.abouts.index', ['modulo' => 'acreditacion']],
                ],
                [
                    'text' => 'Services',
                    'route' => ['admin.services.index', ['modulo' => 'acreditacion']],
                ],
                [
                    'text' => 'Service Details',
                    'route' => ['admin.service-details.index', ['modulo' => 'acreditacion']],
                ],
                [
                    'text' => 'Features',
                    'route' => ['admin.features.index', ['modulo' => 'acreditacion']],
                ],
            ],
        ],


        ['header' => '--------------------------------------------'],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
