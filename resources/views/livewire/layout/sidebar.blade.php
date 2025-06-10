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
      
            <!-- Dashboards -->
            <li class="menu-item ">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Post</div>
              </a>
            
            
            <ul class="menu-sub">
              <li class="menu-item ">
                <a href="" class="menu-link">
                  <div data-i18n="Without menu">Semua Post</div>
                </a>
              </li>
               <li class="menu-item ">
                <a href="" class="menu-link">
                  <div data-i18n="Without menu">Tambah Post</div>
                </a>
              </li>
            </ul>
            </li>
            {{-- <li class="menu-item {{ isActive('admin.criteria.index') || isActive('admin.sub-criteria') ? 'active' : '' }}">
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
            </li> --}}

            <!-- Layouts -->
            {{-- <li class="menu-item {{ isActive('admin.alternatives.index') || isActive('admin.normalization.index') || isActive('admin.rangking.index') ? 'active' : '' }}">
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
            </li> --}}

          </ul>
        </aside>