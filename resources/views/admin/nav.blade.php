@php
    $current_location=class_basename(Route::currentRouteAction());
    //dump($current_location);
    //dump($menu_list);
@endphp

<div class="col-sm-3 col-md-2 sidebar  left-bar">
    <div class="panel-group" id="accordion-menu">
        <!-- ======================Admin Management start========================== -->

    <!-- Map start -->
    <div class="panel panel-default">
        <div class="panel-heading">
        @php $overview=''; @endphp
        @if($current_location=='HomeController@index')
            @php $overview='color:red'; @endphp
        @endif
            <h4 class="panel-title">
            {{link_to_route('dashboard','Dashboard',[],array('style'=>$overview))}}
            </h4>
        </div>
    </div>
   <!-- Map end -->

    @if(checkMenuActive(['SiteSettingsController@edit'],$menu_list))
           <!-- Site Settings Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#site_settings_management',mystudy_case('site_settings_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="site_settings_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('SiteSettingsController','StaticLangsController@index')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('SiteSettingsController@edit',$menu_list))
                            <li id="SiteSettingsController_edit">{{ link_to_route('site_settings.edit','Edit Site Settings','1') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Site Settings Management end -->
    @endif

 @if(checkMenuActive(['RolesController@create','RolesController@index','RegisterController@showRegistrationForm','RegisterController@showUserLists'],$menu_list))
           <!-- User Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#user_management',mystudy_case('user_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="user_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('RolesController@create','RolesController@index','UsersController','RegisterController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('RolesController@create',$menu_list))
                            <li id="RolesController_create">{{ link_to_route('roles.create','Role Create') }}</li>
                        @endif

                        @if(checkMenuActive('RolesController@index',$menu_list))
                            <li id="RolesController_index">{{ link_to_route('roles.index','Role lists') }}</li>
                        @endif

                        @if(checkMenuActive('RegisterController@showRegistrationForm',$menu_list))
                            <li id="RegisterController_showRegistrationForm">{{ link_to('/register','User Create') }}</li>
                        @endif

                        @if(checkMenuActive('RegisterController@showUserLists',$menu_list))
                            <li id="RegisterController_showUserLists">{{ link_to_route('users.index','User lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- User Management end -->
    @endif
   @if(true)
           <!-- Products Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#products_management',mystudy_case('products_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="products_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('ProductsController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('ProductsController@create',$menu_list))
                            <li id="ProductsController_create">{{ link_to_route('product.create','Product Create') }}</li>
                        @endif

                        @if(checkMenuActive('ProductsController@index',$menu_list))
                            <li id="ProductsController_index">{{ link_to_route('product.index','Product lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Products Management end -->
    @endif

    @if(checkMenuActive(['CategoriesController@create','CategoriesController@index'],$menu_list))
           <!-- Category Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#categories_management',mystudy_case('categories_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="categories_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('CategoriesController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('CategoriesController@create',$menu_list))
                            <li id="CategoriesController_create">{{ link_to_route('categories.create','Category Create') }}</li>
                        @endif

                        @if(checkMenuActive('CategoriesController@index',$menu_list))
                            <li id="CategoriesController_index">{{ link_to_route('categories.index','Category lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Category Management end -->

    @endif

     @if(checkMenuActive(['PagesController@create','PagesController@index'],$menu_list))
           <!-- Page Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#pages_management',mystudy_case('page_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="pages_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('PagesController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('PagesController@create',$menu_list))
                            <li id="PagesController_create">{{ link_to_route('pages.create','Page Create') }}</li>
                        @endif

                        @if(checkMenuActive('PagesController@index',$menu_list))
                            <li id="PagesController_index">{{ link_to_route('pages.index','Page lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Page Management end -->
    @endif

     @if(checkMenuActive(['MenusController@create','MenusController@index'],$menu_list))
           <!-- Page Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#menu_management',mystudy_case('menu_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="menu_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('MunusController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('MenusController@create',$menu_list))
                            <li id="MenuController_create">{{ link_to_route('menus.create','Menu Create') }}</li>
                        @endif

                        @if(checkMenuActive('MenusController@index',$menu_list))
                            <li id="MenusController_index">{{ link_to_route('menus.index','Menu lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Page Management end -->
    @endif


         <!-- =============Admin Management end================ -->
     </div>
 </div>


