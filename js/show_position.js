let map, marker, geocoder, autocomplete;

    function initMap() {
      const startPos = { lat: -7.9797, lng: 112.6304 };

      map = new google.maps.Map(document.getElementById("map"), {
        center: startPos,
        zoom: 15,
        mapId: "DEMO_MAP_ID"
      });

      // Gunakan Marker lama yang stabil untuk menghindari warning
      marker = new google.maps.Marker({
        position: startPos,
        map: map,
        draggable: true,
      });

      geocoder = new google.maps.Geocoder();

      // Setup autocomplete dengan fallback
      const autocompleteElement = document.getElementById("autocomplete");
      if (autocompleteElement) {
        try {
          // Coba gunakan API lama yang masih stabil
          autocomplete = new google.maps.places.Autocomplete(autocompleteElement);
        } catch (error) {
          console.warn('Autocomplete initialization failed:', error);
          autocomplete = null;
        }
      }

      // Setup autocomplete listener dengan error handling
      if (autocomplete && autocomplete.addListener) {
        autocomplete.addListener("place_changed", function () {
          try {
            const place = autocomplete.getPlace();
            if (!place.geometry) return;

            map.setCenter(place.geometry.location);
            marker.setPosition(place.geometry.location);
            updateForm(place.geometry.location);
          } catch (error) {
            console.warn('Place changed error:', error);
          }
        });
      }

      // Event listener untuk marker drag
      marker.addListener("dragend", function () {
        const position = marker.getPosition();
        updateForm(position);
      });

      const lokasiButton = document.getElementById("btnLokasiSaya");
      if (lokasiButton) {
        lokasiButton.addEventListener("click", () => {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                map.setCenter(pos);
                marker.setPosition(pos);
                updateForm(pos);
              },
              (error) => {
                alert("Gagal mendapatkan lokasi: " + error.message);
              }
            );
          } else {
            alert("Geolocation tidak didukung oleh browser ini.");
          }
        });
      }

      // Set posisi awal
      updateForm(startPos);
    }

    function updateForm(position) {
      const lat = typeof position.lat === "function" ? position.lat() : position.lat;
      const lng = typeof position.lng === "function" ? position.lng() : position.lng;

      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;

      const location = new google.maps.LatLng(lat, lng);

      geocoder.geocode({ location: location }, (results, status) => {
        if (status === "OK" && results[0]) {
          const components = results[0].address_components;
          let kelurahan = "", kecamatan = "", kabupaten = "", provinsi = "";

          components.forEach((component) => {
            const types = component.types;
            if (types.includes("administrative_area_level_4")) {
              kelurahan = component.long_name;
            } else if (types.includes("administrative_area_level_3")) {
              kecamatan = component.long_name;
            } else if (types.includes("administrative_area_level_2")) {
              kabupaten = component.long_name;
            } else if (types.includes("administrative_area_level_1")) {
              provinsi = component.long_name;
            }
          });

          document.getElementById("kelurahan").value = kelurahan;
          document.getElementById("kecamatan").value = kecamatan;
          document.getElementById("kabupaten").value = kabupaten;
          document.getElementById("provinsi").value = provinsi;
        }
      });
    }

    // Wajib: buat initMap global agar bisa dipanggil oleh Google Maps API
    window.initMap = initMap;