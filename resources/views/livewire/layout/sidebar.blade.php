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
    @php
      function isActive($route) {
        return request()->routeIs($route) ? 'active' : '';
      }
    @endphp

    <!-- Dashboards -->
    <li class="menu-item {{ isActive('admin.dashboard') }}">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dashboard"></i>
        <div data-i18n="Boxicons">Dashboard</div>
      </a>
    </li>
    <li class="menu-item {{ isActive('admin.parameter.index') || isActive('admin.parameter.index') ? 'active' : '' }}">
      <a href="{{ route('admin.parameter.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-tachometer"></i>
        <div data-i18n="Layouts">Parameter</div>
      </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item {{ isActive('admin.alternatives.index') || isActive('admin.normalization.index') || isActive('admin.rangking.index') ? 'active' : '' }}">
      <a href="{{ route('admin.alternatives.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-math"></i>
        <div data-i18n="Layouts">Perhitungan SAW</div>
      </a>
    </li>

    <li class="menu-item {{ isActive('admin.period.index') ? 'active' : '' }}">
      <a href="{{ route('admin.period.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-calendar"></i>
        <div data-i18n="Boxicons">Periode</div>
      </a>
    </li>

  </ul>
</aside>