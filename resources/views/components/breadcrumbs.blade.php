@props(['items' => []])

@if(!empty($items))
<nav class="breadcrumb-container" aria-label="Breadcrumb">
    <div class="wrap">
        <ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ url('/') }}" class="breadcrumb-link" itemprop="item">
                    <svg class="breadcrumb-home-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span itemprop="name">Beranda</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>

            @foreach($items as $index => $item)
                <li class="breadcrumb-separator" aria-hidden="true">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </li>

                <li class="breadcrumb-item {{ $loop->last ? 'is-current' : '' }}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    @if(!empty($item['url']) && !$loop->last)
                        <a href="{{ $item['url'] }}" class="breadcrumb-link" itemprop="item">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </a>
                    @else
                        <span class="breadcrumb-current" aria-current="page" itemprop="name">{{ $item['label'] }}</span>
                    @endif
                    <meta itemprop="position" content="{{ $index + 2 }}" />
                </li>
            @endforeach
        </ol>
    </div>
</nav>

<style>
.breadcrumb-container {
    width: 100%;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    padding: 10px 0;
    font-size: 13px;
}
.breadcrumb-list {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.breadcrumb-item {
    display: flex;
    align-items: center;
}
.breadcrumb-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}
.breadcrumb-link:hover {
    color: #2563eb;
}
.breadcrumb-home-icon {
    flex-shrink: 0;
}
.breadcrumb-separator {
    display: inline-flex;
    align-items: center;
    color: #94a3b8;
}
.breadcrumb-current {
    color: #0f172a;
    font-weight: 600;
}

[data-theme="dark"] .breadcrumb-container {
    background: #0e1424 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
}
[data-theme="dark"] .breadcrumb-link {
    color: #94a3b8 !important;
}
[data-theme="dark"] .breadcrumb-link:hover {
    color: #60a5fa !important;
}
[data-theme="dark"] .breadcrumb-separator {
    color: #64748b !important;
}
[data-theme="dark"] .breadcrumb-current {
    color: #f8fafc !important;
}
</style>
@endif
