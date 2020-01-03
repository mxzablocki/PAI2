var NotifcationsTest = {
                VerifyBrowserSupport: function() {
                    return ("Notification" in window);
                },
                ShowNotification: function(){
					var options = {
						body: "Treść powiadomienia ",
						image: "https://cdn2.iconfinder.com/data/icons/seo-web-optomization-ultimate-set/512/seo_reports-512.png",
						icon: "https://cdn2.iconfinder.com/data/icons/seo-web-optomization-ultimate-set/512/seo_reports-512.png",
						dir : "ltr",
						sound : 'bell.mp3',
						silent: false
					};
                    var notification = new Notification("Witaj świecie!", options);
					
				
					//on display of notification do some action like play sound
					notification.onshow=function(){
						var audio = new Audio('http://organizer.tomkompserwis.pl/audio/sound.mp3');
						audio.play();
					};
                },
                RequestForPermissionAndShow: function(){
                    // Mamy prawo wyświetlać powiadomienia
                    if (Notification.permission === "granted") {
                        NotifcationsTest.ShowNotification();
                    }
                    // Brak wsparcia w Chrome dla właściwości permission
                    else if (Notification.permission !== "denied") {
                        Notification.requestPermission(function (permission) {
                            // Dodajemy właściwość permission do obiektu Notification
                            if(!("permission" in Notification)) {
                                Notification.permission = permission;
                            }
                            if (permission === "granted") {
                                NotifcationsTest.ShowNotification();
                            }
                        });
                    }
                }
            }
			
			
            window.onload = function(){
                document.getElementById("shownotify").onclick = function(){
                    if(!NotifcationsTest.VerifyBrowserSupport()){
                        alert("Brak wsparcia dla Notifications API");               
                    }
                    NotifcationsTest.RequestForPermissionAndShow();
                };
            };
             