<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'layout-dashboard',
                'title' => 'Dashboard',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
               
            ],
            
            'Documents' => [
                'icon' => 'user',
                'title' => 'Documents',
                'sub_menu' => [
                    'Template' => [
                        'icon' => 'user',
                        'route_name' => 'template',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Template'
                    ],
                    'Letter' => [
                        'icon' => 'user',
                        'route_name' => 'document',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Letter'
                    ],
                    
                
                  
                ]
            ],
            'Accounts' => [
                'icon' => 'user',
                'title' => 'Accounts',
                'sub_menu' => [
                    'User' => [
                        'icon' => 'user',
                        'route_name' => 'account',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'User'
                    ],
                     
                
                  
                ]
            ],
         
         
         
            
            'devider',
            'components' => [
                'icon' => 'settings',
                'title' => 'Settings',
                'sub_menu' => [
                    
                    'Supplier' => [
                        'icon' => 'user',
                        'route_name' => 'supplier',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Supplier'
                    ],
                    'Personnel' => [
                        'icon' => 'user',
                        'route_name' => 'personnel',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Personnel'
                    ],
                    'Position' => [
                        'icon' => 'user',
                        'route_name' => 'position',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Position'
                    ],
                  
                ]
            ],
            
                  
           
                
            
        ];
    }
   

}
