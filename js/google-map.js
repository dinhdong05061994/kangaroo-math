
    
        function initialize() {
            var myLatlng = new google.maps.LatLng(21.002749, 105.821787);
            var mapOptions = {
                zoom: 16,
                center: myLatlng
            };
 
            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
 
            var contentString = "<table><tr><th>Tạp chí toán tuổi thơ</th></tr><tr><td>Địa chỉ: 361 Trường Chinh, Thanh Xuân, Hà Nội</td></tr></table>";
 
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
 
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Công ty đầu tư xây dựng Trung Trung Bộ'
            });
            infowindow.open(map, marker);
        }
 
        google.maps.event.addDomListener(window, 'load', initialize);
 
 
   


