const monthContainer = document.getElementById('select-month');
const yearContainer = document.getElementById('select-year');
const dayContainer = document.getElementById('select-day');

const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];

function insertMonthsUi() {
  months.forEach(
    (month, index) =>
      (monthContainer.innerHTML += `<option value=${
        index + 1
      }>${month}</option>`)
  );

  monthContainer.addEventListener('change', () =>
    selectMonth(event.target.value)
  );
}

function insertYearsUi() {
  const minSignupYear = new Date().getFullYear() - 13;

  for (let i = 1900; i <= minSignupYear; i++) {
    yearContainer.innerHTML += `<option value=${i}>${i}</option>`;
  }

  yearContainer.addEventListener('change', () =>
    selectYear(event.target.value)
  );
}

function insertDaysUi() {
  // Only show the days if the month and year has been selected so you know the correct number of days
  if (
    monthContainer.getAttribute('data-selected-month') &&
    yearContainer.getAttribute('data-selected-year')
  ) {
    const selectedMonth = monthContainer.getAttribute('data-selected-month');
    const selectedYear = yearContainer.getAttribute('data-selected-year');
    const daysInMonth = getDaysInMonth(selectedMonth, selectedYear);
    for (let i = 0; i < daysInMonth; i++) {
      dayContainer.innerHTML += `<option value=${i + 1}>${i + 1}</option>`;
    }
  }
}

function selectMonth(month) {
  monthContainer.setAttribute('data-selected-month', month);
  insertDaysUi();
}
function selectYear(year) {
  yearContainer.setAttribute('data-selected-year', year);
  insertDaysUi();
}

// Get the days in the current selected month based on month and year
function getDaysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}

function initUi() {
  insertMonthsUi();
  insertYearsUi();
}

// Initial setup
window.addEventListener('load', (event) => {
  initUi();
});
