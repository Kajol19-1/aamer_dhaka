 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('back.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Raise Issue
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('roadissue.create')}}">Road</a>
                                    <a class="nav-link" href="{{route('garbageissue.create')}}">Garbage</a>
                                    <a class="nav-link" href="{{route('streetlightissue.create')}}">Street Light</a>
                                    <a class="nav-link" href="{{route('publictoiletissue.create')}}">Public Toilet</a>
                                    <a class="nav-link" href="{{route('mosquitoissue.create')}}">Mosquito</a>
                                    <a class="nav-link" href="{{route('illegalstructureissue.create')}}">Illegal Stucture</a>
                                </nav>
                            </div>
                            
                    @php
                            use App\Models\User;
                    @endphp

                    @if (Auth::user()->role === User::ADMIN)
                        <!-- admin‑only content -->

                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Show All Issue
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Show All Issue
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('roadissue.list')}}">Road List</a>
                                            <a class="nav-link" href="{{route('garbageissue.list')}}">Garbage List</a>
                                            <a class="nav-link" href="{{route('streetlightissue.list')}}">Street Light List</a>
                                           <a class="nav-link" href="{{ route('publictoiletissue.list') }}">Public Toilet List</a>
                                           <a class="nav-link" href="{{ route('mosquitoissue.list') }}">Mosquito List</a>
                                           <a class="nav-link" href="{{ route('illegalstructureissue.list') }}">Illegalstructure List</a>
                                        </nav>
                                    </div>
                                    
                                </nav>
                            </div>

                            @endif
                           

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Show Issue Status
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        <div class="collapse" id="collapseStatus" aria-labelledby="headingStatus" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('usershowroadlist.showlist')}}">Road Status</a>
                                <a class="nav-link" href="{{route('usershowgarbagelist.showlist')}}">Garbage Status</a>
                                <a class="nav-link" href="{{route('usershowstreetlightlist.showlist')}}">Street Light Status</a>
                                <a class="nav-link" href="{{route('usershowpublictoiletlist.showlist')}}">Public Toilet Status</a>
                                <a class="nav-link" href="{{route('usershowmosquitolist.showlist')}}">Mosquito Status</a>
                                <a class="nav-link" href="{{route('usershowillegalstructurelist.showlist')}}">Illegal Structure Status</a>
                            </nav>
                        </div>
                            <div class="#"></div>
                            <a class="#" href="#">
                                <div class="#"><i class="#"></i></div>
                               
                            </a>
                            <a class="#" href="#">
                                <div class="#"><i class="#"></i></div>
                                
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>