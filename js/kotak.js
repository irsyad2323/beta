document.addEventListener('DOMContentLoaded', function() {
        const tanggalHariIni = new URLSearchParams(window.location.search).get('tanggal') || new Date().toISOString().split('T')[0];
        const now = new Date().toLocaleString('en-US', { timeZone: 'Asia/Jakarta' });
        const dt = new Date(now);
        dt.setHours(dt.getHours() - 2);

        const kota = 'mlg'; // Adjust as needed

        fetch(`controller/api_wo.php?tanggal=${tanggalHariIni}&kota=${kota}`)
            .then(response => response.json())
            .then(statusWoPekerjaan => {
                const timeslots = {
                    '1': ['06:00:00', '07:59:59'],
                    '2': ['08:00:00', '09:59:59'],
                    '3': ['10:00:00', '12:59:59'],
                    '4': ['13:00:00', '14:59:59'],
                    '5': ['15:00:00', '17:59:59'],
                    '6': ['18:00:00', '19:59:59']
                };

                const letters = ['A', 'B', 'C', 'D', 'E', 'F'];

                for (let barisNo in timeslots) {
                    const [start, end] = timeslots[barisNo];
                    const startDatetime = new Date(`${tanggalHariIni}T${start}+07:00`);
                    const endDatetime = new Date(`${tanggalHariIni}T${end}+07:00`);
                    const isCurrentSlot = new Date(now) >= startDatetime && new Date(now) <= endDatetime;

                    const barisStatus = statusWoPekerjaan[barisNo];
                    const kotakContainer = document.createElement('div');
                    kotakContainer.classList.add('kotak-container');

                    for (let i = 1; i <= 10; i++) {
                        const boxLabel = `${letters[barisNo - 1]}${i}`;
                        let boxColor = 'abu';

                        if (i <= barisStatus['merah']) {
                            boxColor = 'merah';
                        } else if (i <= barisStatus['merah'] + barisStatus['biru']) {
                            boxColor = 'biru';
                        } else if (i <= barisStatus['merah'] + barisStatus['biru'] + barisStatus['kuning']) {
                            boxColor = 'kuning';
                        }

                        const clickAction = isCurrentSlot && boxColor === 'kuning' ? '' : `tes='${barisStatus['hari']}' start2='${barisStatus['start']}' end='${barisStatus['end']}'`;
                        const className = `btn btn-info btn-sm mr-2 kotak ${boxColor} ${isCurrentSlot && boxColor === 'kuning' ? (dt > startDatetime ? 'inactive' : 'addts') : ''}`;

                        const kotakDiv = document.createElement('div');
                        kotakDiv.className = className;
                        kotakDiv.setAttribute('tes', barisStatus['hari']);
                        kotakDiv.setAttribute('start2', barisStatus['start']);
                        kotakDiv.setAttribute('end', barisStatus['end']);
                        kotakDiv.innerHTML = `<i class='fas fa-user'></i>${boxLabel}`;

                        kotakContainer.appendChild(kotakDiv);
                    }

                    document.querySelector('.baris').appendChild(kotakContainer);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    });