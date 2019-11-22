// workbox.skipWaiting()
// workbox.clientsClaim()

// fonts
workbox.routing.registerRoute(
    new RegExp('https://fonts.*'),
    workbox.strategies.cacheFirst({
        cacheName: 'fonts',
        plugins: [
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200]
            })
        ]
    })
)
 
// google stuff
workbox.routing.registerRoute(
    new RegExp('.*(?:googleapis|gstatic).com.*$'),
    workbox.strategies.networkFirst({
        cacheName: 'google'
    })
)
 
// static
workbox.routing.registerRoute(
    new RegExp('.(?:ico)$'),
    workbox.strategies.networkFirst({
        cacheName: 'static'
    }),
)
 
// images
workbox.routing.registerRoute(
    new RegExp('.(?:jpg|jpeg|png|gif|svg)$'),
    workbox.strategies.cacheFirst({
        cacheName: 'images',
        plugins: [
            new workbox.expiration.Plugin({
                maxEntries: 40,
                purgeOnQuotaError: true,
            })
        ]
    })
)