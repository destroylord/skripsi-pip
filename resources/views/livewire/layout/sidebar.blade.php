<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function logout(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/login', navigate: false);
    }
}; ?>

{{-- <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item active ">
                <a href="{{ route('admin.dashboard') }}"  wire:navigate class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>

            </li>

            <li
                class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Kriteria</span>
                </a>

                 <ul class="submenu ">

                    <li class="submenu-item  ">
                        <a href="{{ route('admin.criteria.index') }}" :active="request()->routeIs('admin.criteria.index')" wire:navigate class="submenu-link">Kriteria</a>
                        
                    </li>
                    <li class="submenu-item  ">
                        <a href="{{ route('admin.sub-criteria') }}" :active="request()->routeIs('admin.sub-criteria')" wire:navigate class="submenu-link">Sub Kriteria</a>
                        
                    </li>
                    
                </ul>
            </li>

            <li
                class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Perhitungan</span>
                </a>

                 <ul class="submenu ">

                    <li class="submenu-item  ">
                        <a href="{{ route('admin.alternatives.index') }}" :active="request()->routeIs('admin.alternatives.index')" class="submenu-link">Alternative</a>
                    </li>
                    <li class="submenu-item  ">
                        <a href="{{ route('admin.normalization.index') }}" :active="request()->routeIs('admin.normalization.index')" class="submenu-link">Normalisasi Matrix</a>
                    </li>
                    <li class="submenu-item  ">
                        <a href="{{ route('admin.rangking.index') }}" :active="request()->routeIs('admin.rangking.index')" class="submenu-link">rangking</a>
                    </li>
                    
                </ul>
            </li>
            

            <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Keluar Aplikasi</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                            Apakah Anda yakin ingin keluar dari aplikasi?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="button" wire:click="logout" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Iya saya yakin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </ul>
</div> --}}

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('img/skotga-logo.png') }}" alt="" width="50">
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">Skotga</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            @php
              function isActive($route) {
                return request()->routeIs($route) ? 'active' : '';
              }
            @endphp

            <!-- Dashboards -->
            <li class="menu-item {{ isActive('admin.dashboard') }}">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Dashboard</div>
              </a>
            </li>
            <li class="menu-item {{ isActive('admin.criteria.index') || isActive('admin.sub-criteria') ? 'active' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Kriteria</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ isActive('admin.criteria.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.criteria.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Kriteria</div>
                  </a>
                </li>
                <li class="menu-item {{ isActive('admin.sub-criteria') ? 'active' : '' }}">
                  <a href="{{ route('admin.sub-criteria') }}" class="menu-link">
                    <div data-i18n="Without navbar">SubKriteria</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item {{ isActive('admin.alternatives.index') || isActive('admin.normalization.index') || isActive('admin.rangking.index') ? 'active' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Perhitungan</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ isActive('admin.alternatives.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.alternatives.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Alternative</div>
                  </a>
                </li>
                <li class="menu-item {{ isActive('admin.normalization.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.normalization.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">Normalisasi Matrix</div>
                  </a>
                </li>
                <li class="menu-item {{ isActive('admin.rangking.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.rangking.index') }}" class="menu-link">
                    <div data-i18n="Container">Rangking</div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </aside>