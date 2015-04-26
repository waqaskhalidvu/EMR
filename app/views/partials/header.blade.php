 
    @if(Auth::user()->role == 'Administrator')
 <!--========================================================
                             Admin HEADER
    =========================================================-->
    <header id="header">
        <div id="stuck_container">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="brand put-left">
                            <h1>
                                <a href="/admin_home">
                                    <img src="/images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_admin_home')><a href="/admin_home">Home</a></li>
                                <li @yield('current_services')><a style="cursor: pointer">Management</a>
                                    <ul>
                                        <li> <a href="employees">Manage Employees</a></li>
                                        <li><a href="dutydays">Doctor Schedules</a></li>
                                    </ul>
                                </li>
                                <li @yield('current_about')><a style="cursor: pointer">Patients</a>
                                    <ul>
                                        <li><a href="appointments">Appointments</a></li>
                                        <li><a href="patients">Patients</a></li>
                                        <li><a href="search_pmr">Medical Records</a></li>
                                        <li><a href="app_vitals">Vital Signs</a></li>
                                        <li><a href="app_prescription">Add Prescriptions</a></li>
                                        <li><a href="app_pres_print">Print Prescription</a></li>
                                        <li><a href="app_proc">Add Procedures</a></li>
                                        <li><a href="app_tests">Test Reports</a></li>
                                        <li><a href="app_test_print">Print Reports</a></li>
                                    </ul>
                                </li>
                                <li @yield('current_contacts')><a style="cursor: pointer">Billing</a>
                                    <ul>
                                        <li><a href="app_check_fee">Add Checkup Fee</a></li>
                                        <li><a href="app_checkup_fee_print">Checkup Fee Invoice</a></li>
                                        <li><a href="app_test_fee">Add Test Fee</a></li>
                                        <li><a href="app_test_fee_print">Test Fee Invoice</a></li>
                                    </ul>
                                </li>
								<li><a href="/logout">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
@elseif(Auth::user()->role == "Accountant")

    <!--========================================================
                             Accountant HEADER
    =========================================================-->
    <header id="header">
        <div id="stuck_container">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="brand put-left">
                            <h1>
                                <a href="accountant_home">
                                    <img src="/images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_acc_home')><a href="/accountant_home">Home</a></li>
                                <li @yield('current_services')><a style="cursor: pointer">Billing</a>
                                    <ul>
                                        <li><a href="app_check_fee">Add Checkup Fee</a></li>
                                        <li><a href="app_test_fee">Add Test Fee</a></li>
                                    </ul>
                                </li>
                                <li @yield('current_about')><a style="cursor: pointer">Invoicing</a>
                                    <ul>
                                        <li><a href="app_checkup_fee_print">Checkup Fee Invoice</a></li>
                                        <li><a href="app_test_fee_print">Test Fee Invoice</a></li>
                                    </ul>
                                </li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

@elseif(Auth::user()->role=='Doctor')
     <!--========================================================
                             Doctor HEADER
    =========================================================-->
    <header id="header">
        <div id="stuck_container">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="brand put-left">
                            <h1>
                                <a href="doctor_home">
                                    <img src="/images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_doc_home')><a href="/doctor_home">Home</a></li>
                                <li @yield('current_services')><a href="search_pmr">Medical Records</a></li>
                                <li @yield('current_about')><a href="app_vitals">Vital Signs</a></li>
                                <li @yield('current_contacts')><a href="appointments">Appointments</a></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
@elseif(Auth::user()->role=='Lab Manager')
     <!--========================================================
                             Lab Manager HEADER
    =========================================================-->
    <header id="header">
        <div id="stuck_container">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="brand put-left">
                            <h1>
                                <a href="labmanager_home">
                                    <img src="/images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_lab_home')><a href="/labmanager_home">Home</a></li>
                                <li @yield('current_services')><a href="app_tests?flag=results">Test Results</a></li>
                                <li @yield('current_about')><a href="app_test_print">Test Reports</a></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @elseif(Auth::user()->role=='Receptionist')
     <!--========================================================
                             Receptionist HEADER
    =========================================================-->
    <header id="header">
        <div id="stuck_container">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="brand put-left">
                            <h1>
                                <a href="receptionist_home">
                                    <img src="/images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_rec_home')><a href="/receptionist_home">Home</a></li>
                                <li @yield('current_services')><a style="cursor: pointer">Management</a>
                                    <ul>
                                        <li><a href="dutydays">Doctor Schedules</a></li>
                                    </ul>
                                </li>
                                <li @yield('current_about')><a style="cursor: pointer">Patients</a>
                                    <ul>
                                        <li><a href="appointments">Appointments</a></li>
                                        <li><a href="patients">Patients</a></li>
                                        <li><a href="search_pmr">Medical Records</a></li>
                                        <li><a href="app_vitals">Vital Signs</a></li>
                                        <li><a href="app_prescription">Add Prescriptions</a></li>
                                        <li><a href="app_pres_print">Print Prescription</a></li>
                                        <li><a href="app_proc">Add Procedures</a></li>
                                        <li><a href="app_tests">Test Reports</a></li>
                                        <li><a href="app_test_print">Print Reports</a></li>
                                    </ul>
                                </li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endif