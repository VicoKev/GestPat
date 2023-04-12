<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title">Menu</li>

    <li>
        <a href="{{ route('dashboard') }}" class="waves-effect">
            <i class="mdi mdi-home-analytics"></i><span>Dashboard</span></a>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                class="mdi mdi-human-male-female"></i><span>Patients</span></a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('add') }}">Ajouter</a></li>
            <li><a href="{{ route('list') }}">Liste</a></li>
        </ul>
    </li>
</ul>
