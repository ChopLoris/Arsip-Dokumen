<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="/" class="waves-effect">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/tulis-dokumentasi" class=" waves-effect">
                        <i class="fas fa-pen"></i>
                        <span>Tulis Document</span>
                    </a>
                </li>

                <li class="menu-title">Datalist</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span> Arsip Documents </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/surat"><span class="badge rounded-pill bg-primary float-end">{{ $countall[0] }}</span><span>Surat</span></a></li>
                        <li><a href="/RAB"><span class="badge rounded-pill bg-primary float-end">{{ $countall[1] }}</span>RAB</a></li>
                        <li><a href="/BoM"><span class="badge rounded-pill bg-primary float-end">{{ $countall[2] }}</span>Bill Of Material</a></li>
                        <li><a href="/SPK"><span class="badge rounded-pill bg-primary float-end">{{ $countall[3] }}</span>SPK</a></li>
                        <li><a href="/Documents"><span class="badge rounded-pill bg-primary float-end">{{ $countall[4] }}</span>Dokumentasi</a></li>
                    </ul>
                </li>
                @if(auth()->user()->is_admin == 1)
                <li class="menu-title">Account Settings</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span> Account Manager </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/account-list">List Account</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
