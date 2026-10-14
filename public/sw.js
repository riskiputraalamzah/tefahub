const STATIC_CACHE = 'tefa-hub-static-v7';
const PAGE_CACHE = 'tefa-hub-pages-v7';
const OFFLINE_URL = '/offline.html';

const precachedUrls = [
    OFFLINE_URL,
    '/manifest.webmanifest',
    '/assets/logo.webp',
];

const publicPagePaths = new Set(['/', '/bkk', '/pkl', '/ppdb']);

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(STATIC_CACHE)
            .then((cache) => cache.addAll(precachedUrls))
            .then(() => self.skipWaiting()),
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => Promise.all(
            cacheNames
                .filter((cacheName) => cacheName.startsWith('tefa-hub-') && ![STATIC_CACHE, PAGE_CACHE].includes(cacheName))
                .map((cacheName) => caches.delete(cacheName)),
        )).then(() => self.clients.claim()),
    );
});

self.addEventListener('fetch', (event) => {
    const { request } = event;

    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    if (url.origin !== self.location.origin) {
        return;
    }

    // Navigation requests: Network first with page cache & offline fallback
    if (request.mode === 'navigate') {
        event.respondWith(networkFirstPage(request, url));
        return;
    }

    // CSS and JS assets: ALWAYS Network First to ensure latest styles & scripts without stale cache
    if (isCodeAsset(url)) {
        event.respondWith(networkFirstAsset(request));
        return;
    }

    // Other static assets (images, fonts): Cache first with network fallback
    if (isStaticAsset(url)) {
        event.respondWith(cacheFirstAsset(request));
    }
});

async function networkFirstPage(request, url) {
    try {
        const response = await fetch(request);

        if (response.ok && publicPagePaths.has(url.pathname)) {
            const cache = await caches.open(PAGE_CACHE);
            await cache.put(request, response.clone());
        }

        return response;
    } catch {
        const cachedResponse = await caches.match(request);
        return cachedResponse ?? caches.match(OFFLINE_URL);
    }
}

async function networkFirstAsset(request) {
    try {
        const response = await fetch(request);
        if (response.ok) {
            const cache = await caches.open(STATIC_CACHE);
            cache.put(request, response.clone());
        }
        return response;
    } catch {
        const cachedResponse = await caches.match(request);
        if (cachedResponse) {
            return cachedResponse;
        }
        throw new Error('Network error and no cached asset available');
    }
}

async function cacheFirstAsset(request) {
    const cachedResponse = await caches.match(request);
    if (cachedResponse) {
        return cachedResponse;
    }

    const response = await fetch(request);
    if (response.ok) {
        const cache = await caches.open(STATIC_CACHE);
        await cache.put(request, response.clone());
    }

    return response;
}

function isCodeAsset(url) {
    return url.pathname.endsWith('.css') || url.pathname.endsWith('.js') || url.pathname.includes('/css/') || url.pathname.includes('/js/');
}

function isStaticAsset(url) {
    return url.pathname.startsWith('/assets/') || url.pathname.startsWith('/build/');
}
