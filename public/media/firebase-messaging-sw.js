importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-messaging.js');


firebase.initializeApp({
    'messagingSenderId': 'SENDERID'
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    var data = payload || {};
    var shinyData = data.data;
    console.log(shinyData, payload);
    // Customize notification here
    var notificationTitle = 'Background Message Title';
    var notificationOptions = {
        body: 'Background Message body.',
        icon: '/assets/img-favicon.ico'
    };

    return self.registration.showNotification(shinyData.title, {body: shinyData.body,
        icon: shinyData.icon,
        data: shinyData.data});
});
self.addEventListener('notificationclick', function (event) {
    console.log('On notification click: ', event, event.notification);
    // This looks to see if the current is already open and
    // focuses if it is
    console.log('Notification click: data.url ', event.notification.data);
    event.notification.close();
    var url = /localhost:4200|beta.completedautoreports.com/;
    var newurl = "/shops";
    if (event.notification.data.url) {
        newurl = event.notification.data.url;
    }

    function endsWith(str, suffix) {
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }

    event.waitUntil(
            clients.matchAll({
                type: 'window'
            })
            .then(function (windowClients) {
                for (var i = 0; i < windowClients.length; i++) {
                    var client = windowClients[i];
                    if (url.test(client.url) && 'focus' in client) {
                        if (endsWith(client.url, "/" + newurl)) {
                            return client.focus();
                        }
                        return client.navigate("/" + newurl)
                                .then(client => client.focus());
                    }
                }
                if (clients.openWindow) {
                    return clients.openWindow("/app.html#" + newurl);
                }
            })
            );

});
self.addEventListener('push', function (e) {
    console.log('On push click: ', e);
    // var options = {
    //   body: 'This notification was generated from a push!',
    //   icon: 'images/example.png',
    //   vibrate: [100, 50, 100],
    //   data: {
    //     dateOfArrival: Date.now(),
    //     primaryKey: '2',
    //     vhoo:e.data.json()
    //   },
    //   actions: [
    //     {action: 'close', title: 'Shop',
    //       icon: 'images/xmark.png'},
    //   ]
    // };
    // e.waitUntil(
    //   self.registration.showNotification('Hello world!', options)
    // );
});
