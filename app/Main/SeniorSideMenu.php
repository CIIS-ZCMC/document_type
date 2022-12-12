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
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
               
            ],
            
            'Applicants' => [
                'icon' => 'inbox',
                'title' => 'Applicants',
                'sub_menu' => [
                    'Citizen' => [
                        'icon' => '',
                        'title' => 'Citizen',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'citizenevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'citizenapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'citizenverification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                    'Senior' => [
                        'icon' => '',
                        'title' => 'Senior',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'seniorevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'seniorapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'verifysenior',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                  

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'Citizen' => [
                                'icon' => '',
                                'route_name' => 'declinecitizen',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Citizen'
                            ],
                             'Senior Citizen' => [
                                'icon' => '',
                                'route_name' => 'declinesenior',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Senior Citizen'
                            ],
                       
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                    'Citizen' => [
                        'icon' => '',
                        'title' => 'Citizen',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardcitizen',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Card'
                            ],
                            
                          
                        ]
                    ],
                    'Senior' => [
                        'icon' => '',
                        'title' => 'Senior',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsenior',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Card'
                            ],
                         
                          
                        ]
                    ],
                   
                  
                ]
            ],

            'Benefits' => [
                'icon' => 'inbox',
                'title' => 'Benefits',
                'sub_menu' => [
                    'Citizen' => [
                        'icon' => '',
                        'title' => 'Citizen',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'citizenbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'citizenbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'citizenbenefitverification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                    'Senior' => [
                        'icon' => '',
                        'title' => 'Senior',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'seniorbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'seniorbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'seniorbenefitverification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'Citizen' => [
                                'icon' => '',
                                'route_name' => 'declinecitizenbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Citizen'
                            ],
                             'Senior Citizen' => [
                                'icon' => '',
                                'route_name' => 'declineseniorbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Senior Citizen'
                            ],
                          
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
            
            
         
            'devider',

            'components' => [
                'icon' => 'inbox',
                'title' => 'Settings',
                'sub_menu' => [
                    'Field Office' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Field Office'
                    ],
                  
                ]
            ],
            
                  
           
                
            
        ];
    }
}
