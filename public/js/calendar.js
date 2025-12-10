// Training Calendar JavaScript

// Get training data from inline script
const trainings = typeof trainingsData !== 'undefined' ? trainingsData : [];

let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

const monthNames = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

document.addEventListener('DOMContentLoaded', function() {
    renderCalendar();
    
    // Today Button
    const todayBtn = document.getElementById('todayBtn');
    if (todayBtn) {
        todayBtn.addEventListener('click', function() {
            currentDate = new Date();
            currentMonth = currentDate.getMonth();
            currentYear = currentDate.getFullYear();
            renderCalendar();
        });
    }
    
    // Previous Month
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
    });
    
    // Next Month
    document.getElementById('nextMonth').addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar();
    });
    
    // Date Selector
    const dateSelector = document.getElementById('dateSelector');
    const dateSelectorWrapper = document.querySelector('.calendar-date-selector');
    
    if (dateSelector && dateSelectorWrapper) {
        // Click on wrapper triggers the input
        dateSelectorWrapper.addEventListener('click', function(e) {
            e.preventDefault();
            dateSelector.showPicker ? dateSelector.showPicker() : dateSelector.click();
        });
        
        // Handle date change
        dateSelector.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            currentMonth = selectedDate.getMonth();
            currentYear = selectedDate.getFullYear();
            renderCalendar();
        });
    }
});

function renderCalendar() {
    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const prevLastDay = new Date(currentYear, currentMonth, 0);
    
    // Adjust for Monday start (0 = Sunday, 1 = Monday)
    let firstDayIndex = firstDay.getDay();
    firstDayIndex = firstDayIndex === 0 ? 6 : firstDayIndex - 1;
    
    const lastDayDate = lastDay.getDate();
    const prevLastDayDate = prevLastDay.getDate();
    
    let lastDayIndex = lastDay.getDay();
    lastDayIndex = lastDayIndex === 0 ? 6 : lastDayIndex - 1;
    const nextDays = 6 - lastDayIndex;
    
    // Update month/year display
    document.getElementById('currentMonth').textContent = `${monthNames[currentMonth]} ${currentYear}`;
    
    let calendarHTML = '';
    
    // Previous month days
    for (let i = firstDayIndex; i > 0; i--) {
        const dayNum = prevLastDayDate - i + 1;
        calendarHTML += `<div class="calendar-day other-month">
            <div class="calendar-day-number">${dayNum}</div>
        </div>`;
    }
    
    // Current month days
    for (let day = 1; day <= lastDayDate; day++) {
        const date = new Date(currentYear, currentMonth, day);
        const isToday = date.toDateString() === new Date().toDateString();
        const todayClass = isToday ? 'today' : '';
        
        const dayTrainings = getTrainingsForDate(date);
        
        let trainingsHTML = '';
        if (dayTrainings.length > 0) {
            if (dayTrainings.length <= 2) {
                dayTrainings.forEach(training => {
                    const isMultiDay = isMultiDayTraining(training);
                    trainingsHTML += `<div class="calendar-training-item ${isMultiDay ? 'multi-day' : ''}" 
                        onclick="showTrainingDetail(${training.id})">
                        ${training.title}
                    </div>`;
                });
            } else {
                trainingsHTML += `<div class="calendar-training-count" onclick="showDayTrainings('${date.toISOString()}')">
                    ${dayTrainings.length} Pelatihan
                </div>`;
            }
        }
        
        calendarHTML += `<div class="calendar-day ${todayClass}">
            <div class="calendar-day-number">${day}</div>
            ${trainingsHTML}
        </div>`;
    }
    
    // Next month days
    for (let i = 1; i <= nextDays; i++) {
        calendarHTML += `<div class="calendar-day other-month">
            <div class="calendar-day-number">${i}</div>
        </div>`;
    }
    
    document.getElementById('calendarBody').innerHTML = calendarHTML;
}

function getTrainingsForDate(date) {
    return trainings.filter(training => {
        const startDate = new Date(training.start_date);
        const endDate = new Date(training.end_date);
        
        // Reset time to compare dates only
        startDate.setHours(0, 0, 0, 0);
        endDate.setHours(0, 0, 0, 0);
        date.setHours(0, 0, 0, 0);
        
        return date >= startDate && date <= endDate;
    });
}

function isMultiDayTraining(training) {
    const startDate = new Date(training.start_date);
    const endDate = new Date(training.end_date);
    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays > 1;
}

function showTrainingDetail(trainingId) {
    const training = trainings.find(t => t.id === trainingId);
    
    if (!training) return;
    
    const startDate = new Date(training.start_date).toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    const endDate = new Date(training.end_date).toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    const cityName = training.city ? training.city.name : 'Online';
    const trainingType = training.training_type ? training.training_type.name : '-';
    
    document.getElementById('trainingModalTitle').textContent = training.title;
    
    const modalBody = `
        <div class="training-detail-item">
            <h5><i class="fa fa-calendar"></i> Tanggal Pelaksanaan</h5>
            <p><strong>Mulai:</strong> ${startDate}</p>
            <p><strong>Selesai:</strong> ${endDate}</p>
        </div>
        
        <div class="training-detail-item">
            <h5><i class="fa fa-map-marker-alt"></i> Lokasi</h5>
            <p>${cityName}</p>
        </div>
        
        <div class="training-detail-item">
            <h5><i class="fa fa-graduation-cap"></i> Jenis Pelatihan</h5>
            <p>${trainingType}</p>
        </div>
        
        ${training.description ? `
        <div class="training-detail-item">
            <h5><i class="fa fa-info-circle"></i> Deskripsi</h5>
            <p>${training.description}</p>
        </div>
        ` : ''}
    `;
    
    document.getElementById('trainingModalBody').innerHTML = modalBody;
    $('#trainingModal').modal('show');
}

function showDayTrainings(dateString) {
    const date = new Date(dateString);
    const dayTrainings = getTrainingsForDate(date);
    
    const dateFormatted = date.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    document.getElementById('trainingModalTitle').textContent = `Pelatihan - ${dateFormatted}`;
    
    let modalBody = '<div class="list-group">';
    
    dayTrainings.forEach(training => {
        const cityName = training.city ? training.city.name : 'Online';
        modalBody += `
            <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); showTrainingDetail(${training.id})">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">${training.title}</h5>
                    <span class="badge badge-primary badge-pill">${cityName}</span>
                </div>
                <p class="mb-1 text-muted">${training.description || ''}</p>
            </a>
        `;
    });
    
    modalBody += '</div>';
    
    document.getElementById('trainingModalBody').innerHTML = modalBody;
    $('#trainingModal').modal('show');
}
