const staticCacheName = 'precache-v3.3.1';
const dynamicCacheName = 'runtimecache-v3.3.1';

const precacheAssets = [
    '/',
    '/frontend/assets/img/bg-img/no-internet.png',
    '/frontend/assets/js/theme-switching.js',
    '/frontend/assets/offline.html'
];

// Install Event
self.addEventListener('install', async (event) => {
    console.log('[Service Worker] Installing...');

    event.waitUntil(
        (async () => {
            const cache = await caches.open(staticCacheName);
            for (const asset of precacheAssets) {
                try {
                    const response = await fetch(asset);
                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    await cache.put(asset, response);
                    console.log(`[Service Worker] Cached: ${asset}`);
                } catch (error) {
                    console.warn(`[Service Worker] Failed to cache: ${asset}`, error);
                }
            }
        })()
    );
});

// Activate Event
self.addEventListener('activate', async (event) => {
    console.log('[Service Worker] Activating...');

    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.filter(key => key !== staticCacheName && key !== dynamicCacheName)
                    .map(key => caches.delete(key))
            );
        })
    );
});

// Fetch Event
self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then(cacheRes => {
            return cacheRes || fetch(event.request).then(async (response) => {
                if (!response || response.status !== 200 || response.type !== 'basic') {
                    return response;
                }

                const cache = await caches.open(dynamicCacheName);
                cache.put(event.request, response.clone());

                return response;
            });
        }).catch(() => caches.match('/frontend/assets/offline.html'))
    );
});
