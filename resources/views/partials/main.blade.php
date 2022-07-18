@include('partials.header')
@stack('styles')
</head>

    <body data-sidebar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('partials.topbar')

            <!-- ========== Left Sidebar Start ========== -->
            @include('partials.sidebarleft')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('container')
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Danatama <span class="d-none d-sm-inline-block"> - Damar Navikom Pratama.</span>
                            </div>
                        </div>
                    </div>
                </footer>


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        @include('partials.footer')

        @stack('js')

        <script src="assets/js/app.js"></script>

    </body>
</html>
