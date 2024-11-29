        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">
            
            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="{{route('home')}}" class="header-logo">
                    <img style="width: 80%;" src="{{asset('/')}}{{ Auth::user()->company->logo ?? 'assets/images/default/default-logo.png'}}" alt="{{ Auth::user()->company->name ?? 'Şirket Yok'}}" class="desktop-dark">
                    <img style="width: 40px; height: 40px;" src="{{asset('/')}}{{ Auth::user()->company->profile_image ?? 'assets/images/default/default-profile.png'}}" alt="{{ Auth::user()->company->name ?? 'Şirket Yok'}}" class="toggle-dark">
                </a>
            </div>
            <!-- End::main-sidebar-header -->
            
            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">
                
                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                    </div>
                    @role('Süper Admin')
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">{{ trans_dynamic('sidebar_main_menu') }}</span></li>
                        <!-- End::slide__category -->
                        <li class="slide">
                            <a href="{{route('home.superadmin')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-chart' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_home') }}</span>
                            </a>
                        </li>
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-user'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_users') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_users') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('users')}}" class="side-menu__item">{{ trans_dynamic('sidebar_users') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('companies')}}" class="side-menu__item">{{ trans_dynamic('sidebar_companys') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('roles')}}" class="side-menu__item">{{ trans_dynamic('sidebar_roles') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-cog'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_settings') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_settings') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('languages')}}" class="side-menu__item">{{ trans_dynamic('sidebar_languages') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('users')}}" class="side-menu__item">{{ trans_dynamic('sidebar_software_settings') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">{{ trans_dynamic('sidebar_customers') }}</span></li>
                        <!-- End::slide__category -->
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_employees') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_employees') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('persons')}}" class="side-menu__item">{{ trans_dynamic('sidebar_employees') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('persons.new')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_employees') }}</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_persons') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_persons') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.customer')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_customers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.carrier')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_carriers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.contact.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_person') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-package' ></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_shipments') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('shipments')}}" class="side-menu__item">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('shipments.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_shipment') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="icons.html" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-support' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_support') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    </ul>
                    @endrole
                    
                    @role('Firmenleiter')
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">{{ trans_dynamic('sidebar_main_menu') }}</span></li>
                        <!-- End::slide__category -->
                        <li class="slide">
                            <a href="{{route('home.company')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-chart' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_home') }}</span>
                            </a>
                        </li>
                        <!-- Start::slide -->
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_employees') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_employees') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('persons')}}" class="side-menu__item">{{ trans_dynamic('sidebar_employees') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('persons.new')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_employees') }}</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_persons') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_persons') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.customer')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_customers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.carrier')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_carriers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.contact.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_person') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-package' ></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_shipments') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('shipments')}}" class="side-menu__item">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('shipments.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_shipment') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{route('company.invoices')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-archive' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_invoices') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{route('payments')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-arrow-to-left' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_payments') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{route('timocom')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-arrow-to-left' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_timocom') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('company.profile.edit', ['id' => Auth::user()->company->id, 'reference_token' => Auth::user()->company->reference_token]) }}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-cog' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_settings') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="icons.html" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-support' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_support') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    </ul>
                    @endrole
                    
                    @role('Mitarbeiter')
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">{{ trans_dynamic('sidebar_main_menu') }}</span></li>
                        <!-- End::slide__category -->
                        <li class="slide">
                            <a href="{{route('home.employee')}}" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-chart' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_home') }}</span>
                            </a>
                        </li>
                        <!-- Start::slide -->
                        
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_persons') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_persons') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.customer')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_customers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.carrier')}}" class="side-menu__item">{{ trans_dynamic('sidebar_persons_carriers') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contacts.contact.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_person') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-package' ></i>
                                </span>
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_shipments') }}</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('my.shipments')}}" class="side-menu__item">{{ trans_dynamic('sidebar_shipments') }}</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('my.shipments.add')}}" class="side-menu__item">{{ trans_dynamic('sidebar_add_shipment') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="icons.html" class="side-menu__item">
                                <span class=" side-menu__icon">
                                    <i class='bx bx-support' ></i>
                                </span> 
                                <span class="side-menu__label">{{ trans_dynamic('sidebar_support') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    </ul>
                    @endrole
                    
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
                </nav>
                <!-- End::nav -->
                
            </div>
            <!-- End::main-sidebar -->
            
        </aside>
        <!-- End::app-sidebar -->