
<div class="navigation">
    <ul>
        <li>
            <a href="">
                <span class="icon">
                    <img src="/assets/img/tt2 bp.png" class="">
                </span>
                <span class="title">
                    <img src="/assets/img/tt1.png" class="">
                </span>
            </a>
        </li>
        <li>
            <a href="/dashboard">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title"> Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'Employee')
        <li>
            <a href="/project">
                <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                <span class="title"> Project</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->role == 'Project Manager')
        <li>
            <a href="{{ route('admin.prgoresProject') }}">
                <span class="icon"><ion-icon name="map-outline"></ion-icon></span> 
                <span class="title"> Project & Order</span>
            </a>
        </li>
        <li>
            <a href="/admin/projectmanager/approvalclient">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                <span class="title"> Client Approval</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->role == 'Marketing')
        <li>
            <a href="/client">
                <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                <span class="title"> Client Order</span>
            </a>
        </li>
        @endif

        <li>
            <a href="/logout">
                <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                <span class="title">Sign-Out</span>
            </a>
        </li>
    </ul>
</div>
