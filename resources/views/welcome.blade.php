<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style> 
</head>
<body class="antialiased">        
    <div class="content-wrapper">
            <div id="map"></div>
            <div class="form_style">      
                {{-- <div>                      
                    <input type="number" id="latitude" name="latitude">         
                </div> --}}
                <div>
                    <input type="text" id="latitude-longitude" name="latitude-longitude" placeholder="latitude,longitude">         
                </div>
                <button class="btn btn-primary" id="send" onclick="send()">Send</button>      
            </div>
            <h2>Примеры координат Украины</h2>
            <p>Киев	50.45,30.52</p>
            <p>Харьков 49.98,36.25</p>
            <p>Симферополь 44.96,34.11</p>
            <p>Запорожье 47.82,35.19</p>
            <p>Житомир	50.26,28.68</p>
            <p>Полтава	49.59,34.54</p>   
            <p>Винница	49.23,28.48</p>
        {{--<script>           
            let marker = new L.Marker([{{ $latitude }},{{ $longitude }}]);      
                map.removeLayer(marker)
                marker.addTo(map);
                console.log('done');
                console.log({{ $latitude }});
                console.log({{ $longitude }});
        </script>--}}
</div>
<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
<script>        
    var map = L.map('map').setView([50.4501, 30.5234], 4);

    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);        

</script>
<script>


    let socket = new WebSocket("ws://secret-caverns-11171.herokuapp.com:8889");

    socket.onopen = function(event) {
        console.log("Соединение установлено.");
    
    };
   
    function addMarker(entry){
        const ardata = entry.split(',');
        marker = new L.marker(ardata).addTo(map);
        setTimeout((marker) => {
            map.removeLayer(marker);
            const jsonDel = {
            type: "MarkerDel",
            data:  entry
        }
        socket.send(JSON.stringify(jsonDel));  
        }, 10000);
          
    }
  
    socket.onmessage = function(event) {
        console.log(event.data);
        const parsedEventData = JSON.parse(event.data);

        if (parsedEventData.type === 'formSubmit') {
            addMarker(parsedEventData.data)
        } else {
            parsedEventData.forEach(function(coordinate) {
                addMarker(coordinate.latitude_longitude)
            })
        }
                    
    };

    socket.onerror = function(error) {
        console.log("Ошибка " + error.message);
    };
    var markers = [];

    socket.onclose = function(event) {
    if (event.wasClean) {
        console.log('Соединение закрыто чисто');
    } else {
        console.log('Обрыв соединения'); // например, "убит" процесс сервера
    }
        console.log('Код: ' + event.code + ' причина: ' + event.reason);
    };
    
    function send(){
      
        const jsonData = {
            type: "formSubmit",
            data:  document.getElementById('latitude-longitude').value
        }
        socket.send(JSON.stringify(jsonData));
        console.log("Отправленно:" + jsonData);     
    }
</script>
<style>
#map{
    height: 400px;
    width: 600px;
    max-width: 100%;
    max-height: 100%;
}
.content-wrapper{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.form_style{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    margin-top: 30px;
}
.form_style input {
    border: none;
    outline: none;
    border-bottom: 1px solid #DCDCDC;
    background: #ffffff;
    color: #424242;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    padding: 3px 8px;
    width: 100%;
    margin-bottom: 30px;
}
.form_style button{
    border: none;
    outline: none;
    text-decoration: none;
    color: #ffffff;
    text-transform: uppercase;
    background: #1D9947;
    border-radius: 30px;
    width: 190px;
    height: 40px;
    text-align: center;
    cursor: pointer;
    font-family: 'Avenir', sans-serif;

}
</style>       
    </body>
</html>
