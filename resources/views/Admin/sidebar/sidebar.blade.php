<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('admin')}}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('categories')}}" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('events')}}" class=" waves-effect">
                        <i class="ti-flag"></i>
                        <span>events</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('Users')}}" class=" waves-effect">
                        <i class="ti-user"></i>
                        <span>utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('feedbacks')}}" class=" waves-effect">
                        <i class="ti-comments"></i>
                        <span>Commentaires</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('contacts')}}" class=" waves-effect">
                        <i class="ti-email"></i>

                        <span>contacts</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('eventsByDemandeur')}}" class="waves-effect">
                        <i class="ti-alert"></i>
                        <span>Liste d'événements En Attente</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logoutt')}}" class=" waves-effect">
                        <i class="ti-power-off"></i>
                        <span>se deconnecter</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>