<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../admin/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

     <title>UPTD SPF SDN Kotalulon 3 Bondowoso</title>
    
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    @include('layouts.partials.style')
    @stack('styles')
  </head>

  <body>
       @livewireStyles
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <livewire:layout.sidebar />
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <livewire:layout.navigation />

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
               <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ $title ?? '' }}</h4>

                {{ $slot }}
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <livewire:layout.footer/>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->




    @include('layouts.partials.script') 
    @livewireScripts
    @stack('scripts')
  </body>
</html>
