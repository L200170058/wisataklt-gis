@extends('layouts.frontend')

@section('content')
<div id="contact" class="contact-area">
	<div class="contact-inner area-padding">
		<div class="container ">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div class="form contact-form">
                    <div id="map" style="width: 100%; height: 550px;"></div>
				  </div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form contact-form">
						<img src="{{asset('foto') }}/{{ $wisata->foto }}" width="100%" height="400px">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-12">
    <table class=" ">
        <tr>
            <td width="170px">Nama Wisata</td>
            <td width="50px">:</td>
            <td>{{ $wisata->nama_wisata }}</td>
        </tr>
        <tr>
            <td>Jenis </td>
            <td>:</td>
            <td>{{ $wisata->jenis }}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{ $wisata->kecamatan }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $wisata->alamat }}</td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>:</td>
            <td>{{ $wisata->deskripsi }}<a href="https://id.wikipedia.org/wiki/{{ $wisata->nama_wisata }}" target="_blank"> selengkapnya lihat  </a></td>
        </tr>
    </table>
</div>


<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
    });


var map = L.map('map', {
    	center: [{{ $wisata->posisi }}],
   		zoom: 9,
   	 	layers: [peta1],
});
var baseMaps = {
        "Grayscale": peta1,
        "Satelit": peta2,
        "Streets": peta3,
        "Dark": peta4,
    };

    L.control.layers(baseMaps).addTo(map);
    var iconwisata = L.icon({
    iconUrl: '{{ asset('icon')}}/{{ $wisata->icon }}',
    iconSize:     [38, 38],
	});

		L.marker([<?= $wisata->posisi ?>],{icon: iconwisata})
		.addTo(map);
</script>
@endsection