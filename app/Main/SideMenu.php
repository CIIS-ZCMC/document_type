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
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'soloparentapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentverification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdverification',
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
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwd',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
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
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Card'
                            ],
                           
                          
                        ]
                    ],
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardpwd',
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
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitverification',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Verify'
                            ],
                          
                        ]
                    ],
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitverification',
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
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparentbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwdbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
            'accounts' => [
                'icon' => 'home',
                
                'route_name' => 'account',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Accounts'
               
            ],
            
          
            // 'pages' => [
            //     'icon' => 'layout',
            //     'title' => 'Item',
            //     'sub_menu' => [
            //         'wizards' => [
            //             'icon' => '',
            //             'route_name' => 'tabulator',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Profiling'
                       
                        
            //         ],
            //     ]
            // ],
            
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
                    'School' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'School'
                    ],
                    'Card Requirements' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Card Requirements'
                    ],
                    'Identification Card' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Identification Card'
                    ],
                    'Civil Status' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Civil Status'
                    ],
                    'Vulnerable Sector' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Vulnerable Sector'
                    ],
                    'Office' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Office'
                    ],
                    'Source of Income' => [
                        'icon' => '',
                        'route_name' => 'fieldoffice',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Source of Income'
                    ],
                ]
            ],
            
                  
           
                
            
        ];
    }


    public static function soloparentmenu()
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
                
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'soloparentapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentverification',
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
                         
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsoloparent',
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
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitverification',
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
                        
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparentbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
            'accounts' => [
                'icon' => 'home',
                
                'route_name' => 'account',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Accounts'
               
            ],
            
          
            // 'pages' => [
            //     'icon' => 'layout',
            //     'title' => 'Item',
            //     'sub_menu' => [
            //         'wizards' => [
            //             'icon' => '',
            //             'route_name' => 'tabulator',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Profiling'
                       
                        
            //         ],
            //     ]
            // ],
            
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
    public static function soloparentapprovermenu()
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
                
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'soloparentapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                          
                          
                        ]
                    ],
                   

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                         
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsoloparent',
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
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                          
                          
                        ]
                    ],
                 

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                        
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparentbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
        
    
            
                  
           
                
            
        ];
    }

    public static function soloparentevaluatormenu()
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
                
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                          
                          
                        ]
                    ],
                   

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                         
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsoloparent',
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
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                            
                         
                        ]
                    ],
                 

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                        
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparentbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
         
            
          
       
            
        ];
    }

    public static function soloparentverifiermenu()
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
                
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                         
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentverification',
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
                         
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparent',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardsoloparent',
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
                 
                    'Solo Parent' => [
                        'icon' => '',
                        'title' => 'Solo Parent',
                        'sub_menu' => [
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'soloparentbenefitverification',
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
                        
                            'Solo Parent' => [
                                'icon' => '',
                                'route_name' => 'declinesoloparentbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Solo Parent'
                            ],
                         
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
        
           
                
            
        ];
    }

    


    public static function pwdmenu()
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdverification',
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
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwd',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardpwd',
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitverification',
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
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwdbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
            'accounts' => [
                'icon' => 'home',
                
                'route_name' => 'account',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Accounts'
               
            ],
            
          
            // 'pages' => [
            //     'icon' => 'layout',
            //     'title' => 'Item',
            //     'sub_menu' => [
            //         'wizards' => [
            //             'icon' => '',
            //             'route_name' => 'tabulator',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Profiling'
                       
                        
            //         ],
            //     ]
            // ],
            
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

    public static function pwdapprovermenu()
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                         
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                          
                        ]
                    ],

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwd',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardpwd',
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                          
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                           
                          
                        ]
                    ],

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwdbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
         
            
                  
           
                
            
        ];
    }

    public static function pwdevaluatormenu()
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                         
                          
                        ]
                    ],

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwd',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardpwd',
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Evaluation' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitevaluation',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Evaluation'
                            ],
                          
                          
                        ]
                    ],

                    'Declined' => [
                        'icon' => '',
                        'title' => 'Declined',
                        'sub_menu' => [
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwdbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
 
                  
           
                
            
        ];
    }

    public static function pwdverifiermenu()
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                          
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdverification',
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
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwd',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],

            'Members' => [
                'icon' => 'inbox',
                'title' => 'Members',
                'sub_menu' => [
                
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                            'Card' => [
                                'icon' => '',
                                'route_name' => 'cardpwd',
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
                    'PWD' => [
                        'icon' => '',
                        'title' => 'PWD',
                        'sub_menu' => [
                         
                            'Verify' => [
                                'icon' => '',
                                'route_name' => 'pwdbenefitverification',
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
                            'PWD' => [
                                'icon' => '',
                                'route_name' => 'declinepwdbenefit',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'PWD'
                            ],
                          
                        ]
                    ],
                 

                   
                ]
            ],
            
            
            
      
            
                  
           
                
            
        ];
    }


    public static function seniormenu()
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

    public static function seniorapprovermenu()
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
                           
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'citizenapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                          
                          
                        ]
                    ],
                    'Senior' => [
                        'icon' => '',
                        'title' => 'Senior',
                        'sub_menu' => [
                          
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'seniorapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
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
                          
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'citizenbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
                            ],
                          
                          
                        ]
                    ],
                    'Senior' => [
                        'icon' => '',
                        'title' => 'Senior',
                        'sub_menu' => [
                          
                             'Approval' => [
                                'icon' => '',
                                'route_name' => 'seniorbenefitapproval',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Approval'
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
            
            
            
            
            
         
         
                  
           
                
            
        ];
    }

    public static function seniorevaluatormenu()
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
            
            
            
            
            
         
          
           
                
            
        ];
    }

    public static function seniorverifiermenu()
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
            
            
            
            
           
                  
           
                
            
        ];
    }



}
